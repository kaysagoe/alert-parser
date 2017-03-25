<?php
require "./vendor/autoload.php";
use App\Core\App;
use App\Core\Connection;
App::bind("config", require "./config.php");
App::bind("database", App::get("config")["database"]);
App::bind("connection", Connection::make(App::get("database")));

function view($name, $data = []){
    extract($data);
    return require "./app/views/$name.view.php";
}