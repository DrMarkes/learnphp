<?php 

$link = mysqli_connect('localhost', 'root', '12345', 'web');

$sql = "SELECT * FROM teachers";
mysqli_query($link, "SET NAMES 'utf8'");
$result = mysqli_query($link, $sql) or 
	die (mysqli_error($link));
mysqli_close($link);

/*while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
	echo "<pre>";
	print_r($row);	
}*/

$row = mysqli_fetch_all($result, MYSQLI_ASSOC);

echo "<pre>";
print_r($row);

