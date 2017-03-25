<?php
namespace App\Models;
use \PDO;
class GenericTag {
    public $id, $bankid, $name, $alias;

    public function __Construct($id, $bankid, $name, $alias){
        $this->id = $id;
        $this->bankid = $bankid;
        $this->name = $name;
        $this->alias = $alias;
    }

    public static function findAllByBankId( $bankid, PDO $pdo){
        $tagQuery = $pdo->prepare("select * from generictags where bankid = ?");
        $tagQuery->execute(array($bankid));
        $returnArray = [];
        foreach($tagQuery->fetchAll(PDO::FETCH_CLASS) as $genericTag){
            array_push($returnArray, new static($genericTag->id, $genericTag->bankid, $genericTag->name, $genericTag->alias));
        }
        return $returnArray;
    }
}