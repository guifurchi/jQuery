<?php

namespace gis;

require_once 'Connection.php';

class Users
{
    function __construct()
    {
       echo $this->users = $this->usersQuery();
    }

    function usersQuery()
    {
        $conn = Connection::getdb();
        $query = $conn->query("SELECT * FROM gis.users order by id ASC");
        $stmt = $query->fetchAll(\PDO::FETCH_ASSOC);

        return json_encode($stmt);
    }
}

$users = new Users;
