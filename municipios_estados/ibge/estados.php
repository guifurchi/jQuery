<?php

namespace ibge;

require_once 'Connection.php';

class Estados
{
    function __construct()
    {
       echo $this->estado = $this->estadosQuery();
    }

    function estadosQuery()
    {
        $conn = Connection::getdb();
        $query = $conn->query("SELECT * FROM ibge.estados order by uf ASC");
        $stmt = $query->fetchAll(\PDO::FETCH_ASSOC);

        return json_encode($stmt);
    }
}

$estado = new Estados;
