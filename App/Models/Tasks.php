<?php

namespace App\Models;

use App\Db;
use App\Model;


class Tasks
    extends Model
{

    const TABLE = 'tasks';

    public $id;
    public $name;
    public $email;
    public $texttask;
    public $status;
    public $status2;

    /*
     обновление записи в таблице
     */
    public function updateOne($status, $status1, $status2, $texttask, $texttask1)
    {
        $res = strnatcmp($texttask1, $texttask);
        if ($res != 0) {
            $this->status2 = 'отредактировано администратором';
        } else {
            $this->status2 = $status2;
        }


        if (empty($status)) {
            $this->status = $status1;
        } else {
            $this->status = $status;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET texttask=:texttask, status=:status, status2=:status2  WHERE id=:id';
        $db = Db::instance();
        $values = [':texttask' => $this->texttask, ':status' => $this->status, ':status2' => $this->status2, ':id' => $this->id];
        $db->execute($sql, $values);

    }


    /*
     выборка всех записей из таблицы и вывод их по три на страницу
     */
    public static function findAllPagination($page, $namesort)
    {

        session_start();

        if (empty($page)) {
            $page = 1;
        }

        if (!empty($namesort)) {
            $_SESSION['namesort'] = $namesort;
        }


        if (empty($_SESSION['namesort'])) {
            $_SESSION['namesort'] = 'id';
        }

        $notesOnPage = 3; //количество записей на страницу
        $from = $page * $notesOnPage - $notesOnPage;


        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY ' . $_SESSION['namesort'] . ' LIMIT ' . $from . ',' . $notesOnPage,
            [],
            static::class
        );
    }

    /*
    подсчет общего количства записей в таблице
     */
    public static function countRecords()
    {

        $db = Db::instance();
        return $db->query(
            'SELECT COUNT(*) FROM ' . static::TABLE,
            [],
            static::class
        );
    }


    public function insert($username, $useremail, $texttask)
    {
        session_start();
        $this->name = trim($username);
        $this->email = trim($useremail);
        $this->texttask = trim($texttask);
        $this->status = "&nbsp";
        $this->status2 = "&nbsp";
        $_SESSION['username'] = trim($username);
        $_SESSION['useremail'] = trim($useremail);

        if (!$this->isNew()) {
            return;
        }

        $columns = [];
        $values = [];

        foreach ($this as $k => $v) {
            if ('id' == $k) {
                continue;
            }
            $columns[] = $k;
            $values[':' . $k] = $v;
        }


        $sql = '
INSERT INTO ' . static::TABLE . '
(' . implode(',', $columns) . ')
VALUES
(' . implode(',', array_keys($values)) . ')
        ';
        $db = Db::instance();
        $db->execute($sql, $values);
    }


}