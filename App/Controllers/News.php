<?php

namespace App\Controllers;

use App\View;

class News
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

        $this->view->tasks = \App\Models\News::findAllPagination($page, $namesort);
        $this->view->pages = \App\Models\News::countRecords();
        $this->view->display(__DIR__ . '/../templates/index.php');
    }


    protected function actionInsertOne()
    {
        session_start();
        $task = new \App\Models\News();

        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        $texttask = $_POST['texttask'];

        $task->insert($username,$useremail,$texttask);
        header("Location:index.php?send=true");

    }







}