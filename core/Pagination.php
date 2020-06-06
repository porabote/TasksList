<?php
namespace Core;

class Pagination
{
    private $connect;
    public $limit;
    public $pageNumber;
    public $orderBy;
    public $pagesCount;

    function __construct($connect)
    {
        $this->connect = $connect;

        $this->pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;
        $this->orderBy = isset($_GET['order']) ? $_GET['order'] : null;
    }

    function setLimit($limit)
    {
        $this->limit = $limit;
    }

    function getData($tableName)
    {
        $count = $this->connect->execute("SELECT COUNT(*) FROM " . $tableName);
        $count = $count[0]['COUNT(*)'];

        $this->pagesCount = intval(($count - 1) / $this->limit) + 1;

        $currentPosition = $this->pageNumber * $this->limit - $this->limit;

        $query = 'SELECT * FROM ' . $tableName;
        if($this->orderBy) {
            $query .= ' ORDER BY ' .$this->orderBy;
        }
        $query .= ' LIMIT ' . $currentPosition . ',' . $this->limit;

        $result = $this->connect->execute($query);

        return $result;

    }

    function getPages()
    {
        $pages = [];
        for($i =1; $i <= $this->pagesCount;$i++) {
            $pages[$i]['number'] = $i;
            $pages[$i]['current'] = ($i == $this->pageNumber) ? true : false;
            $pages[$i]['url'] = '/tasks/index/?page=' . $i;
            if($this->orderBy) $pages[$i]['url'] .= '&order=' . $this->orderBy;
        }
        return $pages;
    }
}
?>