<?php

use gis\Connection;

require_once './gis/Connection.php';

$json = new Connection;
$json->getDB();
$json->getJson();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script type="text/javascript" src="./ibge/ajax.js"></script>
    <script type="text/javascript" src="./gis/ajax.js"></script>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">

            <div id="combo_1">
                <div class="col">
                    <select></select>
                </div>
                <div class="col">
                    <select></select>
                </div>
            </div>

            <div id="combo_2">
                <div class="col">
                    <select></select>
                </div>
                <div class="col">
                    <select></select>
                </div>
        </div>
    </div>
</body>
</html>