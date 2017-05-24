<?php

spl_autoload_register(/**
 * @param $class
 */
    function ($class) {
        include "$class.class.php";
    });

/**
 * Class NewsDB
 */
class NewsDB implements INewsDB
{

    const DB_NAME = 'news.db';
    const RSS_NAME = 'rss.xml';
    const RSS_TITLE = 'Последние новости';
    const RSS_LINK = 'http://learnphp.dev/level-3/news/news.php';

    private $_db;

    private $sqlCreateMsgs = "CREATE TABLE msgs(
	        id INTEGER PRIMARY KEY AUTOINCREMENT,
	        title TEXT,
	        category INTEGER,
	        description TEXT,
	        source TEXT,
	        datetime INTEGER)";

    private $sqlCreateCategory = "CREATE TABLE category(
	        id INTEGER,
	        name TEXT)";

    private $sqlSeedCategory = "INSERT INTO category(id, name)
            SELECT 1 AS id, 'Политика' AS name
            UNION SELECT 2 AS id, 'Культура' AS name
            UNION SELECT 3 AS id, 'Спорт' AS name ";

    /**
     * NewsDB constructor.
     */
    function __construct()
    {
        if (!file_exists(self::DB_NAME)) {
            $this->_db = new SQLite3(self::DB_NAME);
            $this->_db->exec($this->sqlCreateMsgs);
            $this->_db->exec($this->sqlCreateCategory);
            $this->_db->exec($this->sqlSeedCategory);
        } else {
            $this->_db = new SQLite3(self::DB_NAME);
        }
    }

    function __destruct()
    {
        unset($this->_db);
    }

    /**
     *    Добавление новой записи в новостную ленту
     *
     * @param string $title - заголовок новости
     * @param string $category - категория новости
     * @param string $description - текст новости
     * @param string $source - источник новости
     *
     * @return boolean - результат успех/ошибка
     */
    function saveNews($title, $category, $description, $source)
    {
        $title = $this->clearStr($title);
        $category = $this->clearStr($category);
        $category = abs((int)$category);
        $source = $this->clearStr($source);
        $dt = time();

        $sql = "INSERT INTO msgs( 
                      title, 
                      category, 
                      description,
                      source,
                      datetime) 
                      VALUES(?, ?, ?, ?, ?)";
        $stmt = $this->_db->prepare($sql);
        $stmt->bindParam('1', $title);
        $stmt->bindParam('2', $category);
        $stmt->bindParam('3', $description);
        $stmt->bindParam('4', $source);
        $stmt->bindParam('5', $dt);

        if (!$stmt->execute()) {
            return false;
        }

        $this->createRss();

        return true;
    }

    /**
     *    Выборка всех записей из новостной ленты
     *
     * @return array - результат выборки в виде массива
     *
     */
    function getNews()
    {

        $sql = "SELECT msgs.id AS id, title, category.name AS category, description, source, datetime
                FROM msgs, category 
                WHERE category.id = msgs.category
                ORDER BY id DESC";

        $result = $this->_db->query($sql);

        return $this->dbToArray($result);
    }

    /**
     *    Удаление записи из новостной ленты
     *
     * @param integer $id - идентификатор удаляемой записи
     *
     * @return boolean - результат успех/ошибка
     */
    function deleteNews($id)
    {
        $id = abs((int) $id);
        if($id) {
            $sql = "DELETE FROM msgs WHERE id = :id";
            $stmt = $this->_db->prepare($sql);
            $stmt->bindParam('id', $id);
            if($stmt->execute()) {
                return true;
            }
        }
        return false;
    }

    /**
     * @param $string
     * @return string
     */
    protected function clearStr($string): string
    {
        return SQLite3::escapeString(trim(strip_tags($string)));
    }

    /**
     * @param SQLite3Result $result
     * @return array
     */
    protected function dbToArray(SQLite3Result $result): array
    {
        $arr = [];

        while ($res = $result->fetchArray(SQLITE3_ASSOC)) {
            $arr[] = $res;
        }

        return $arr;
    }

    public function createRss() {
        $dom = new DOMDocument('1.0', 'utf-8');
        $dom->formatOutput = true;
        $dom->preserveWhiteSpace = false;

        $rss = $dom->createElement('rss');
        $rss->setAttribute('version', '2.0');
        $dom->appendChild($rss);

        $channel = $dom->createElement('channel');
        $rss->appendChild($channel);

        $title = $dom->createElement('title', self::RSS_TITLE);
        $channel->appendChild($title);

        $link = $dom->createElement('link', self::RSS_LINK);
        $channel->appendChild($link);

        $news = $this->getNews();

        foreach ($news as $value) {
            $item = $dom->createElement('item');

            $title = $dom->createElement('title', $value['title']);
            $item->appendChild($title);

            $link = $dom->createElement('link', self::RSS_LINK . "?id=" . $value['id']);
            $item->appendChild($link);

            $description = $dom->createElement('description', $value['description']);
            $item->appendChild($description);

            $date = date(DateTime::RFC2822, $value['datetime']);
            $pubDate = $dom->createElement('pubDate', $date);
            $item->appendChild($pubDate);

            $category = $dom->createElement('category', $value['category']);
            $item->appendChild($category);

            $channel->appendChild($item);
        }

        $dom->save(self::RSS_NAME);
    }
}