<?php


namespace App\Models;


use App\Db;
use App\Model;

class Admin extends Model
{
    const TABLE = 'admin';

    public $adminname;
    public $adminpass;

    public static function findByNamePass($adminname, $adminpass)
    {
        $db = Db::instance();
        $result = $db->query(
            'SELECT id FROM ' . static::TABLE . ' WHERE adminname=:adminname and adminpass=:adminpass',
            [':adminname' => $adminname, ':adminpass' => $adminpass],
            static::class
        )[0];
        $id = $result->id;


        session_start();

        if (!empty($id)) {
            $_SESSION['adminerror'] = null;
            $_SESSION['adminname'] = $adminname;
            $action = 'AdmIndex';

            return $action;

        } else {
            $_SESSION['adminname'] = null;
            $_SESSION['adminerror'] = 'Неверное имя админа или пароль!';
            $action = 'Login';

            return $action;
        }
    }



}