<?php
namespace App\Models;

use Core\Model;

class Pages extends Model
{
    public function getList()
    {
        return $this->db->execute("SELECT * FROM tasks;");
    }
}
?>