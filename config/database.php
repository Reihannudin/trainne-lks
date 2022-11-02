<?php

namespace Config{

    class database{

//         make connection to db
        static function getConnection() : \PDO
        {
            $host = "localhost";
            $port = 3306;
            $database = "crud-php";
            $username = "root";
            $password = "";

            return new \PDO("mysql:host=$host:$port;dbname=$database", $username, $password);

        }
    }
}
