<?php 

namespace ibge;

class Connection{

    public static function getdb(){

        $conn = new \PDO(
            "mysql:host=localhost:3306;dbname=ibge;charset=utf8",
            "root",
            ""
        );
        return $conn;
    }
}

?>