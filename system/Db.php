<?php
/*
 * класс для подключения базы данных
 */

class Db
{
    /*
     * метод для подключения базы данных, принимает параметр $relative_path = true,
     * который подключает файл db_conf.php' относительно файлов лежащих в корневой директории
     * по умолчанию $relative_path = false, который подключает файл db_conf.php'
     * относительно корневого файла index.php
     */
    public static function getConnection($relative_path = false)
    {
        if($relative_path){
            $connection = include '../config/db_conf.php'; 
        }
        else{
            $connection = include ROOT.'/config/db_conf.php';  
        }

        $host = $connection['host'];
        $db = $connection['dbname'];
        $charset = $connection['charset'];
        $username = $connection['username'];
        $passwd = $connection['password'];
        
        
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        
        $pdo = new PDO($dsn, $username, $passwd);
        return $pdo;
    }
}
            