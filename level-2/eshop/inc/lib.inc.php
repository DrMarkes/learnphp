<?php

if (!function_exists(addItemToCatalog)) {
/**
 * Add Book to Table Catalog
 * @param string $title   book title
 * @param string $author  book author
 * @param int $pubyear year of publication
 * @param int $price   book price
 * @return bool if OK true, else false
 */
    function addItemToCatalog($title, $author, $pubyear, $price)
    {
        global $link;
        $sql = "INSERT INTO catalog(title, author, pubyear, price)
				VALUES(?, ?, ?, ?)";

        if (!$stmt = mysqli_prepare($link, $sql)) {
            return false;
        }

        mysqli_stmt_bind_param($stmt, 'ssii', $title, $author, $pubyear, $price);
        mysqli_execute($stmt);
        mysqli_stmt_close($stmt);
        return true;
    }
}

if (!function_exists(clearString)) {
    /**
     * Clear Request
     * @param  string $string Request string
     * @return string         clear string
     */
    function clearString($string)
    {
    	global $link;
        return mysqli_real_escape_string($link, trim(strip_tags($string)));
    }
}

if (!function_exists(clearInt)) {
	/**
	 * Clear Int data
	 * @param  integer $int data
	 * @return integer      clear data
	 */
	function clearInt($int)
	{
		return abs((int) $int);
	}
}

if(!function_exists(selectAllItems)) {
	
	/**
	 * Get all Books from catalog
	 * @return array Books array or false
	 */
	function selectAllItems()
	{
		global $link;
		$sql = "SELECT id, title, author, pubyear, price
				FROM catalog";

		if (!$result = mysqli_query($link, $sql)) {
			return false;
		}
		$items = mysqli_fetch_all($result, MYSQLI_ASSOC);
		mysqli_free_result($result);
		return $items;
	}
}

if (!function_exists(saveBasket)) {
	/**
	 * save basket to cookie
	 * @return true
	 */
	function saveBasket()
	{
		global $basket;
		$basket = base64_encode(serialize($basket));
		setcookie('basket', $basket, 0x7fffffff);
		return true;
	}
}

if (!function_exists(addToBasket)) {
	/**
	 * Add to basket
	 * @param  int $id Item id
	 * @return true     
	 */
	function addToBasket($id)
	{
		global $basket;
		$id = clearInt($id);
		$basket[$id] += 1;
		saveBasket();

		return true;
	}
}

if (!function_exists(basketInit)) {
	/**
	 * Initialize basket
	 * @return true
	 */
	function basketInit()
	{
		global $basket, $count;
		if (!isset($_COOKIE['basket'])) {
			$basket = ['orderId' => uniqid()];
			saveBasket();
		} else {
			$basket = unserialize(base64_decode($_COOKIE['basket']));
			$basketToCount = array_slice($basket, 1);
			foreach ($basketToCount as $value) {
				$count += $value;
			}
		}

		return true;
	}
}

if (!function_exists(myBasket)) {
	/**
	 * get user basket
	 * @return array  
	 */
	function myBasket()
	{
		global $link, $basket;
		$goods = array_keys($basket);
		array_shift($goods);
		if (!goods) {
			return false;	
		} else {
			$ids = implode(',', $goods);
			$sql = "SELECT id, title, author, pubyear, price
				FROM catalog WHERE id IN ($ids)";
			if (!$result = mysqli_query($link, $sql)) {
				return false;
			}
		}
		$items = result2Array($result);
		mysqli_free_result($result);
		return $items;
	}
}

if (!function_exists(result2Array)) {
	/**
	 * return array basket with quantity
	 * @param  mysqli_result object $data 
	 * @return array  
	 */
	function result2Array($data) {
		global $basket;
		$arr = [];
		while ($row = mysqli_fetch_assoc($data)) {
			$row['quantity'] = $basket[$row['id']];
			$arr[] = $row;
		}
		return $arr;
	}
}

if (!function_exists(deleteItemFromBasket)) {
	/**
	 * delete Item From Basket
	 * @param  int $id 
	 * @return true
	 */
	function deleteItemFromBasket($id)
	{
		global $link, $basket;
		$id = clearInt($id);
		if ($basket[$id] > 1) {
			$basket[$id]--;
		} else {
			unset($basket[$id]);
		}
		saveBasket();
		return true;
	}
}

if (!function_exists(saveOrder)) {
	/**
	 * save order to database, clear basket, cookie
	 * @param  int $datetime timestamp
	 * @return true           
	 */
	function saveOrder($datetime)
	{
		global $link, $basket;
		$goods = myBasket();
		$stmt = mysqli_stmt_init($link);
		$sql = "INSERT INTO orders(
				title, author, pubyear, price, quantity, orderId, datetime)
				VALUES(?, ?, ?, ?, ?, ?, ?)";
		if(!mysqli_stmt_prepare($stmt, $sql)) {
			return false;
		}
		foreach ($goods as $item) {
			mysqli_stmt_bind_param($stmt, 'ssiiisi', 
						mysqli_real_escape_string($link, $item['title']),
						mysqli_real_escape_string($link, $item['author']),
						mysqli_real_escape_string($link, $item['pubyear']),
						mysqli_real_escape_string($link, $item['price']),
						$item['quantity'],
						$basket['orderId'],
						$datetime
				);
			mysqli_stmt_execute($stmt);

		}
		mysqli_stmt_close($stmt);
		$basket = [];
		setcookie("basket", "", time() - 3600);
		return true;
	}
}

if (!function_exists(getOrders)) {
	/**
	 * get all orders
	 * @return array 
	 */
	function getOrders()
	{
		global $link;
		$allOrders = [];
		if(!is_file(ORDERS_LOG)) {
			return false;
		}
		$orders = file(ORDERS_LOG);

		foreach ($orders as $order) {
			list($name, $email, $phone, $address, $orderid, $date) = explode('|', $order);
			$orderInfo['name'] = $name;
			$orderInfo['email'] = $email;
			$orderInfo['phone'] = $phone;
			$orderInfo['address'] = $address;
			$orderInfo['orderid'] = $orderid;
			$orderInfo['date'] = $date;

			$sql = "SELECT title, author, pubyear, price, quantity, orderId
					FROM orders WHERE orderid = '$orderid' AND datetime = $date";
			if (!$result = mysqli_query($link, $sql)) {
				return false;
			}
			$orderInfo['goods'] = mysqli_fetch_all($result, MYSQLI_ASSOC);
			mysqli_free_result($result);

			$allOrders[] = $orderInfo;
		}

		return $allOrders;
	}
}