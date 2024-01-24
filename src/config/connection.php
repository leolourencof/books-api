<?php

class Database
{
    protected PDO $dbh;
    protected $table = "books";

    private $host = "postgresql";
    private $dbname = "mydb";
    private $user = "postgres";
    private $password = "1234";

    public function __construct()
    {
        try {
            $this->dbh = new PDO(
                "pgsql:host=$this->host;port=5432;dbname=$this->dbname;",
                $this->user,
                $this->password
            );
            $this->dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Database could not be connected: {$e->getMessage()}");
        }
    }
}
