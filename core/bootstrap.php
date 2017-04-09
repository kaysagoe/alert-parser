<?php
require "./vendor/autoload.php";
use App\Core\App;
use App\Core\Connection;
if(getenv("DATABASE_URL")){
    $db = parse_url(getenv("DATABASE_URL"));
    $db["type"] = "pgsql";
    $db["path"] = ltrim($db["path"], "/");
    App::bind("database", $db);
} else {
    App::bind("config", require "./config.php");
    App::bind("database", App::get("config")["database"]);
}
App::bind("connection", Connection::make(App::get("database")));

function view($name, $data = []){
    extract($data);
    return require "./app/views/$name.view.php";
}

function redirect($url){
    header("Location: $url");
    die();
}