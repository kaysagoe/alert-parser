<?php
namespace App\Models;
use \PDO;
class QueryBuilder {
    public static function all(PDO $pdo){
        $queryForAll = $pdo->prepare("select * from alerts");
        $queryForAll->execute();
        $tempArray = $queryForAll->fetchAll();
        $allResults = [];
        foreach ($tempArray as $alert) {
            array_push($allResults, new Alert($alert["id"], $alert["bankid"], $alert["lastname"],$alert["firstname"],$alert["type"], $alert["accountnumber"], (float) $alert["amount"], $alert["time"], $alert["date"], $alert["location"], $alert["description"], $alert["remarks"], $alert["documentnumber"], $alert["accountbalance"], $alert["currentbalance"]));
        }
        return $allResults;
    }
}
