<?php
namespace Core;

use Core\DataBase;
use Core\Pagination;

class Model
{
    public function __construct()
    {
        $this->db = new DataBase();
        $this->Pagination = new Pagination($this->db);
    }

    public function getList()
    {
        echo 'TODO here query By Default';
    }
}
?>