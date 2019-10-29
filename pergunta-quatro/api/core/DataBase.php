<?php
namespace Core;
use PDO;
use PDOException;
class DataBase 
{
    public static function getDataBase()
    {
        $env = parse_ini_file('../.env', true);
        $host       = $env['DB_HOST'];
        $db         = $env['DB_DATABASE'];
        $user       = $env['DB_USERNAME'];
        $pass       = $env['DB_PASSWORD'];
        try {              
            $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
            $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $pdo;
        } catch (PDOException $e) {
            print($e->getMessage());
        } 

    }
   
}