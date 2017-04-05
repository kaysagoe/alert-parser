<?php
namespace App\Core;
use \PDO;
class Connection {
    public static function make($config){
        try {
            return new PDO(
                $config["type"].":dbname=".$config["path"].";host=".$config["host"].";port=".$config["port"], 
                $config["user"], 
                $config["pass"],
                $config["options"]
                );
        } catch (Exception $e){
            die($e->getMessage());
        }
    }
}