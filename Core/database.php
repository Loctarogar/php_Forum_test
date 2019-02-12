<?php

require __DIR__.'/../myPdoData.php';

class Database
{
    use myPdoData;

    public function getConnection(){
        $dsn = "mysql:host=$this->host;dbname=$this->db;charset=$this->charset";
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES => false,
        ];

        try{
            $pdo = new PDO($dsn, $this->user, $this->password, $options);

            return $pdo;
        }catch(\PDOException $e){
            throw new \PDOException($e->getMessage(), (int)$e->getCode());

        }
    }

}
