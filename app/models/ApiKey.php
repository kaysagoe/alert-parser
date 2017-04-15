<?php
namespace App\Models;

class ApiKey {
    public $key;
    public $name;
    public $email;

    public function __Construct($name, $email, $key = null){
        $this->name = $name;
        $this->email = $email;
        $this->key = is_null($key) ? $key : uniqid();
    }

    public static function AllFrom($email){
        $allQuery = App::get('connection')->prepare('select * from apikeys where email = ?');
        $allQuery->execute(array($email));
        $returnArray = [];
        foreach($allQuery->fetchAll(PDO::FETCH_CLASS) as $apikey){
            array_push($returnArray, new static(trim($apikey->name), trim($apikey->email), trim($apikey->key)));
        }
        return $returnArray;
    }

    public function save(){
        $saveQuery = App::get('connection')->prepare('insert into apikeys values (?, ?, ?)');
        return $saveQuery->execute(array($this->key, $this->name, $this->email));
    }

    public function authenticate(){
        $authQuery = App::get('connection')->prepare('select * from apikeys where key = ?');
        $authQuery->execute(array($this->key));
        return $authQuery->fetch();
    }
}