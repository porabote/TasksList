<?php
namespace App\Models;

use Core\Model;

class Tasks extends Model
{
    public function getList()
    {
        if(!$this->Pagination->limit) {
            return $this->db->execute("SELECT * FROM tasks;");
        } else {
            return $this->Pagination->getData("tasks");
        }
    }

    function save($data)
    {
        foreach($data as &$field) {
            $field = $this->db->connect->real_escape_string($field);
        }

        $query = 'INSERT INTO tasks (user_email, user_name, task_body) VALUES (\'' .$data['user_email']. '\' ,\''  .$data['user_name'].  '\' , \'' .$data['task_body']. '\');';
        return $this->db->connect->query($query);

    }
    function update($data)
    {
        foreach($data as &$field) {
            $field = $this->db->connect->real_escape_string($field);
        }

        $query = 'UPDATE tasks 
        SET user_email = \'' .$data['user_email']. '\', user_name = \''  .$data['user_name'].  '\', task_body = \'' .$data['task_body']. '\', completed = \'' .$data['completed']. '\'
        WHERE id = \'' . $data['id'] . '\';';
        return $this->db->connect->query($query);

    }

    function get($id)
    {
        $query = "SELECT * FROM tasks WHERE id = '$id';";
        return $this->db->execute($query);

    }

}
?>