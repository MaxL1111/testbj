<?php


namespace App\Models;


use App\Model;

class User extends Model
{
    public static function userAutorization($username, $useremail)
    {
        session_start();
        $_SESSION['username'] = trim($username);
        $_SESSION['useremail'] = trim($useremail);
    }

}