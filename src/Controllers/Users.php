<?php
namespace App\Controllers;

use Core\Controller;

class Users extends Controller
{
    public function login()
    {
        if(!$_POST) {
            $this->view->render('Users/login.php');
        } else {
            $res = $this->Auth->login($_POST);
            if(!$res)  echo 'Неверные логин или пароль';
        }
    }

    function logout()
    {
        session_destroy();
        header("Location:/tasks/index/");
    }

}
?>