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
        $this->Auth->check();

        $record = $this->model->get($_GET['id'])[0];

        if(!$_POST) {
            $this->view->setData(['record' => $record]);
            $this->view->render('Tasks/edit.php');
        } else {

            $_POST['modified_admin'] = 0;
            if(($record['task_body'] != $_POST['task_body']) || $record['modified_admin']) $_POST['modified_admin'] = 1;//&& $record['completed']

            $isSaved = $this->model->update($_POST);

            if($isSaved) echo 'Данные успешно сохранены';
            else echo 'Ошибка сохранения';
        }

    }


}
?>