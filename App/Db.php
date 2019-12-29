<?php


namespace App;

use PDOException;

class Db
{

    use Singleton;

    protected $dbh;

    protected function __construct()
    {
        try {
            $dsn = 'mysql:host=localhost;dbname=beejee';
            $this->dbh = new \PDO($dsn, 'root', '');
        }catch (PDOException $exception){
            throw new \App\Exceptions\Db('Что-то не так с базой данных');
        }
    }

    public function execute($sql, $params = [])
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        return $res;
    }


    public function query($sql, $params, $class)
    {
        $sth = $this->dbh->prepare($sql);
        $res = $sth->execute($params);
        if (false !== $res) {
            return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
        }
        return [];
    }

}