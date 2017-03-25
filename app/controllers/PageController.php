<?php

namespace App\Controllers;

use \PDO;
use App\Models\QueryBuilder;
use App\Models\Bank;
use App\Models\Alert;
use App\Core\App;
use \Exception;
use Html2Text;


class PageController {
    public function home(){
        $result = QueryBuilder::all(App::get("connection"));
    
        view("index", compact("result"));
    }
    
    public function api(){
        
        if(is_string($_GET["text"])){
            $alertbody = urldecode($_GET["text"]);
        
        } else {
            throw new Exception("No text entered as parameter");
        }
        
        if(is_html($alertbody)){
            $alertbody = html2text($alertbody); 
        }
        
        if (strpos($alertbody, "Guaranty Trust Bank")){
            $bank = Bank::findByName("Guaranty Trust Bank", App::get("connection"));
        } else if(stripos($alertbody, "wemaOnline")){
            $bank = Bank::findByName("Wema Bank", $pdo);
        } else {
            exit;
        }
        $alert2Process = Alert::getFromText($alertbody, $bank, App::get("connection"));
        header('Content-Type: application/json');
        echo json_encode($alert2Process);
        
    }
}

////////////////////////////////////// HELPER FUNCTIONS ////////////////////////////////////////////////////////////////////
    function is_html($text){
        return is_int(stripos( $text ,"<body" ));
    }

    function html2text($html){
        $html = substr($html, stripos($html, "<body"), stripos($html, "</body>")+7 - stripos($html, "<body"));
        $ret = @Html2Text\Html2Text::convert($html);
        return is_int(stripos($ret, "=20")) ? str_replace("=20", "", $ret) : $ret;
    }