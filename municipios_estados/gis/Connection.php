<?php 

namespace gis;

class Connection{

    public function getHost(){
        return $this->host;
    }

    public function setHost($json){
        $this->host = $json;    
    }

    public function getdb(){
        //$this->getJson();
        //echo $host = $this->host;

        $conn = new \PDO("mysql:host=localhost:3306;dbname=gis;charset=utf8","root","");
        //$conn = new \PDO($this->getJson());
        $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $conn;

    }

    public function getJson()
    {
        $json = file_get_contents('./gis/config.json');
        $json = json_decode($json, true);
        $host= $json['connection']['host'];
        $dbname= $json['connection']['dbname'];
        $charset= $json['connection']['charset'];
        $user= $json['connection']['user'];
        $password= $json['connection']['password'];

        return  $this->setHost($json['connection']['host']);

        //return "mysql:host='$host';dbname='$dbname';charset='$charset','$user','$password'";

        //return ("mysql:host=localhost:3306;dbname=gis;charset=utf8".","."root".","."");
    }
}

?>