<?php

namespace gis;

require_once 'Connection.php';

class Consultas
{
    function __construct()
    {
       echo $this->consultas = $this->consultasQuery();
    }

    function consultasQuery()
    {
        $conn = new Connection();
        $conn = $conn->getdb();
        $query = $conn->query("SELECT * FROM gis.consultas order by nome ASC");
        $stmt = $query->fetchAll(\PDO::FETCH_ASSOC);

        return json_encode($stmt);
    }
}

$consultas = new Consultas;
