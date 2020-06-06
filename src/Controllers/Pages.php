<?php
namespace App\Controllers;

use Core\Controller;

class Pages extends Controller
{
    public function index()
    {
        $this->view->render('Pages/index.php');
    }
}
?>