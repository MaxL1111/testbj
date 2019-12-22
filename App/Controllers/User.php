<?php


namespace App\Controllers;


class User extends News
{
    protected function actionAuthorization()
    {
        session_start();
        $_SESSION['username'] = trim($_POST['username']);
        $_SESSION['useremail'] = trim($_POST['useremail']);

        header("Location:/?ctrl=News&action=Index");

    }

}