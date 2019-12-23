<?php

namespace App\Controllers;

use App\Exceptions\Core;
use App\Exceptions\Db;
use App\MultiException;
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

        $page = $_GET['page'];
        $namesort = $_POST['namesort'];

        $this->view->tasks = \App\Models\News::findAllPagination($page,$namesort);
        $this->view->pages = \App\Models\News::countRecords();
        $this->view->display(__DIR__ . '/../templates/index.php');

    }



    protected function actionOne()
    {
        $id = (int)$_GET['id'];
        $this->view->article = \App\Models\News::findById($id);
        $this->view->display(__DIR__ . '/../templates/one.php');
    }

    protected function actionInsertOne()
    {
        session_start();
        $task = new \App\Models\News();
        $task->name = trim($_POST['username']);
        $task->email = trim($_POST['useremail']);
        $task->texttask = trim($_POST['texttask']);
        $task->status = "&nbsp";

        $_SESSION['username'] = $_POST['username'];
        $_SESSION['useremail'] = $_POST['useremail'];

        $task->insert();

        header("Location:index.php?send=true");


    }


    protected function actionCreate()
    {
        try {
            $article = new \App\Models\News();
            $article->fill([]);
            $article->save();
        } catch (MultiException $e) {
            $this->view->errors = $e;
        }
        $this->view->display(__DIR__ . '/../templates/create.php');
    }

    protected function actionSort()
    {
        $namesort = $_POST['namesort'];

        $this->view->tasks = \App\Models\News::sortNews($namesort);
        $this->view->display(__DIR__ . '/../templates/index.php');


    }



}