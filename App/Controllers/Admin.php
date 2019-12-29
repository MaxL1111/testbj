<?php


namespace App\Controllers;


class Admin extends News
{

    protected function actionLogin()
    {
        $this->view->display(__DIR__ . '/../templates/login.php');

    }

    public function actionEditor()
    {
        $id_editor = $_POST['id_editor'];
        $this->view->task = \App\Models\News::findById($id_editor);
        $this->view->display(__DIR__ . '/../templates/editor.php');
    }

    public function actionEditOne()
    {

        $task = new \App\Models\News();

        $status = $_POST['status'];
        $status1 = $_POST['status1'];
        $status2 = $_POST['status2'];
        $texttask = $_POST['texttask'];
        $texttask1 = $_POST['texttask1'];


        $task->id = $_POST['id'];
        $task->texttask = $_POST['texttask'];
        $task->updateOne($status,$status1,$status2, $texttask, $texttask1);
        header("Location:/?ctrl=Admin&action=AdmIndex");
    }


    protected function actionAdmIndex()
    {

        $this->view->tasks = \App\Models\News::findAll();
        $this->view->display(__DIR__ . '/../templates/admin.php');

    }

    protected function actionLogout()
    {
        $this->view->display(__DIR__ . '/../templates/logout.php');
    }

    protected function actionLoginIn()
    {
        $adminnamepost = $_POST['adminname'];
        $adminpasspost = $_POST['adminpass'];
        $action = \App\Models\Admin::findByNamePass($adminnamepost, $adminpasspost);

        $this->action($action);

    }

    protected function actionDelete()
    {
        $id = $_POST['id_delete'];
        \App\Models\News::delete($id);
        $this->actionAdmIndex();
    }

}