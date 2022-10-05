<?php

namespace ibge;

require_once 'Connection.php';

class Municipios
{
    function __construct()
    {
       echo $this->municipios = $this->municipiosQuery();
    }

    function municipiosQuery()
    {
        $conn = Connection::getdb();
        $query = $conn->query("SELECT * FROM ibge.municipios order by uf ASC");
        $stmt = $query->fetchAll(\PDO::FETCH_ASSOC);

        return json_encode($stmt);
    }
}

$municipios = new Municipios;
