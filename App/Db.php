<?php

namespace App;

class Db
{
    protected $dbh;
    public function __construct()
    {
        $config = (include __DIR__ . '/configTemplate.php')['db'];
        $dsn = 'mysql:host=' . $config['host'] . ';dbname=' . $config['dbname'];
        $this->dbh = new \PDO($dsn, $config['user'], $config['password']);
    }

    public function query($query, $class, $data)
    {
        $sth = $this->dbh->prepare($query);
        $sth->execute($data);
        return $sth->fetchAll(\PDO::FETCH_CLASS, $class);
    }

    public function execute($query, array $data)
    {
        $sth = $this->dbh->prepare($query);
        return $sth->execute($data);
    }

    public function checkID($query, array $data)
    {
        $sth = $this->dbh->prepare($query);
        $sth->execute($data);
        return $sth->fetchColumn();
    }

    public function getLastId()
    {
        return $this->dbh->lastInsertId();
    }
}