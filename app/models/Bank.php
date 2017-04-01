<?php
namespace App\Models;
use \PDO;
class Bank {
    public $bankid, $name, $sameline;

    public function __Construct($bankid, $name, $sameline){
        $this->bankid = $bankid;
        $this->name = $name;
        $this->sameline = $sameline;
    }

    public static function findByName($name, PDO $pdo){
        // Returns an instance of the Bank Class from the database with name
        $bankQueryWithName = $pdo->prepare("select * from banks where name = ?");
        $bankQueryWithName->execute(array($name));
        $tempClass = $bankQueryWithName->fetch();
        return new static($tempClass["bankid"], $tempClass["name"], $tempClass["sameline"]);
    }
}