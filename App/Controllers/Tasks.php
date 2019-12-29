<?php

namespace App\Controllers;

use App\View;

class Tasks
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }

    public function action($action)
    {
        $methodName = 'action' . $action;
        $this->beforeAction();
        return $this->$methodName();
    }

    protected function beforeAction()
    {
    }

    protected function actionIndex()
    {
        session_start();
        $page = $_GET['page'];
        $namesort = $_POST['namesort'];

        $this->view->tasks = \App\Models\Tasks::findAllPagination($page, $namesort);
        $this->view->pages = \App\Models\Tasks::countRecords();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }


    protected function actionInsertOne()
    {
        session_start();
        $task = new \App\Models\Tasks();

        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $texttask = $_POST['texttask'];

        $task->insert($username,$useremail,$texttask);
        header("Location:index.php?send=true");

    }







}