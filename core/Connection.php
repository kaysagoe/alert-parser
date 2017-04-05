<?php
namespace App\Core;
use \PDO;
class Connection {
    public static function make($config){
        try {
            return new PDO(
                $config["type"].":dbname=".$config["path"].";port=".$config["port"].";host=".$config["host"], 
                $config["user"], 
                $config["pass"],
                $config["options"]
                );
        } catch (Exception $e){
            die($e->getMessage());
        }
    }
}