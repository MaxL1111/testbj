<?php

namespace App\Models;

use App\Db;
use App\Model;
use App\MultiException;

/**
 * Class News
 * @package App\Models
 *
 * @property \App\Models\Author $author
 */
class News
    extends Model
{

    const TABLE = 'tasks';

    public $id;
    public $name;
    public $email;
    public $texttask;
    public $status;
    public $status2;

    /**
     * LAZY LOAD
     *
     * @param $k
     * @return null
     */
    public function __get($k)
    {
        switch ($k) {
            case 'author':
                return Author::findById($this->author_id);
                break;
            default:
                return null;
        }
    }

    public function __isset($k)
    {
        switch ($k) {
            case 'author':
                return !empty($this->author_id);
                break;
            default:
                return false;
        }
    }

    public function fill($data = [])
    {
        $e = new MultiException();
        if (true) {
            $e[] = new \Exception('Заголовок неверный');
        }
        if (true) {
            $e[] = new \Exception('Текст неверный');
        }
        throw $e;
    }

    public function updateOne($status,$status1, $status2,$texttask, $texttask1)
    {
        $res = strnatcmp($texttask1, $texttask);
        if ($res != 0) {
            $this->status2 = 'отредактировано администратором';

        }else{
            $this->status2 = $status2;
        }


        if(empty($status)){
            $this->status = $status1;

           // $res1 = 'status=:status';
        }else{
            $this->status = $status;
        }

        $sql = 'UPDATE ' . static::TABLE . ' SET texttask=:texttask, status=:status, status2=:status2  WHERE id=:id';
        $db = Db::instance();
        $values = [':texttask' => $this->texttask, ':status' => $this->status, ':status2' => $this->status2, ':id' => $this->id];
        $db->execute($sql, $values);

    }

    public static function findAllPagination($page,$namesort)
    {
        if(empty($page)){
            $page = 1;
        }
        $notesOnPage = 3;
        $from = $page * $notesOnPage - $notesOnPage;



        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY ' .$namesort. ' LIMIT ' . $from . ',' . $notesOnPage,
            [],
            static::class
        );
    }



    public static function sortNews($namesort)
    {

        $db = Db::instance();
        return $db->query(
            'SELECT * FROM ' . static::TABLE . ' ORDER BY ' . $namesort,
            [],
            static::class
        );
    }

    public static function countRecords()
    {

        $db = Db::instance();
        return $db->query(
            'SELECT COUNT(*) FROM ' . static::TABLE,
            [],
            static::class
        );
    }

}