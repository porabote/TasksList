<?php
namespace Core;

class DataBase
{
    public $connect;
    
    function __construct()
    {
        try {
            $this->_connect();
        } catch (\Exception $e) {
            echo 'Ошибка подключения: ',  $e->getMessage(), "\n";
        }

    }

    function _connect()
    {
        $this->connect = new \mysqli(DB_HOST, DB_USERNAME, DB_PASSWD, DB_NAME);
        if ($this->connect->connect_errno) {
            throw new Exception("Не удалось подключиться к MySQL: " . $this->connect->connect_error);
        }
    }

    function execute($query)
    {
        $res = $this->connect->query($query);

        if($res) {
            return $this->fetchResult($res);
        }
        return [];
    }

    function fetchResult($res)
    {
        $records = [];
        $fieldsNames = $res->fetch_fields();
        $res = $res->fetch_all();
        foreach ($res as $resKey => $record) {

            foreach ($record as $rKey => $field) {
                foreach ($fieldsNames as $key => $field) $records[$resKey][$field->name] = $record[$key];
            }

        }

        return $records;
    }

    function __destruct()
    {
        $this->connect->close();
    }
}
?>