<?php
namespace App\Controllers;

use Core\Controller;

class Tasks extends Controller
{
    public function index()
    {
        $this->model->Pagination->setLimit(3);
        $tasksList = $this->model->getList();

        $this->view->setData(['tasks' => $tasksList]);
        $this->view->setData(['pages' => $this->model->Pagination->getPages()]);
        $this->view->render('Tasks/index.php');
    }

    public function add()
    {
        if(!$_POST) {
            $this->view->render('Tasks/add.php');
        } else {
            $res = $this->model->save($_POST);
            if($res) echo 'Данные успешно сохранены';
            else echo 'Ошибка сохранения';
        }

    }

    public function edit()
    {
        if(!$_POST) {
            $record = $this->model->get($_GET['id']);
            $this->view->setData(['record' => $record[0]]);
            $this->view->render('Tasks/edit.php');
        } else {
            
            $record = $this->model->update($_POST);
            if($record) echo 'Данные успешно сохранены';
            else echo 'Ошибка сохранения';
        }

    }


}
?>