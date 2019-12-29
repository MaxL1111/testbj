<?php

namespace App\Controllers;


class User extends Tasks
{
    protected function actionAuthorization()
    {
        session_start();

        $username = $_POST['username'];
        $useremail = $_POST['useremail'];
        \App\Models\User::userAutorization($username, $useremail);
        header("Location:/?ctrl=Tasks&action=Index");
    }
}