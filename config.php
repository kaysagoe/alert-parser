<?php
return [
    "database" => [
        "dbname" => "alert_parser" ,
        "host" => getenv("IP"),
        "port" => 3306,
        "username" => getenv("C9_USER"),
        "password" => "",
        "options" => []
    ]
];