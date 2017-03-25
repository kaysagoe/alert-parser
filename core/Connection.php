<?php
namespace App\Core;
use \PDO;
class Connection {
    public static function make($config){
        try {
            return new PDO(
                "mysql:dbname=".$config["dbname"].";port=".$config["port"].";host=".$config["host"], 
                $config["username"], 
                $config["password"],
                $config["options"]
                );
        } catch (Exception $e){
            die($e->getMessage());
        }
    }
}