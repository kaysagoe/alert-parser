<?php

namespace App\Controllers;

use \PDO;
use App\Models\QueryBuilder;
use App\Models\Bank;
use App\Models\Alert;
use App\Core\App;
use \Exception;
use Html2Text;
use App\Models\ApiKey;


class PageController {
    public function home(){
    
        view("index");
    }
    
    public function api(){
        $output = [];
        $key = new ApiKey(null, null, $_GET['key']);
        if(is_string($_GET["text"]) && $key->authenticate()){
            $alertbody = urldecode($_GET["text"]);
        } else {
            header('Content-Type: application/json');
            $output = ["status" => "INVALID_REQUEST", "error_message" => "A parameter is missing"];
            echo json_encode($output);
            throw new Exception("Missing Parameter");
        }
        
        if(is_html($alertbody)){
            $alertbody = html2text($alertbody); 
        }
        
        if (strpos($alertbody, "Guaranty Trust Bank")){
            $bank = Bank::findByName("Guaranty Trust Bank", App::get("connection"));
        } else if(stripos($alertbody, "wemaOnline")){
            $bank = Bank::findByName("Wema Bank", App::get("connection"));
        } else {
            header('Content-Type: application/json');
            $output = ["status" => "INVALID_REQUEST", "error_message" => "The text parameter is not sufficient for request"];
            echo json_encode($output);
            throw new Exception("The text parameter is not sufficient for request");
        }
        $alert2Process = Alert::getFromText($alertbody, $bank, App::get("connection"));
        header('Content-Type: application/json');
        $output = ["status" => "OK", "results" => $alert2Process];
        echo json_encode($output);
        
    }
    
    public function docs(){
        view("docs");
    }
    
    public function demo(){
        $alertexample = urlencode($_POST["alert-example"]);
        $curl = curl_init();
        curl_setopt_array( $curl ,array(CURLOPT_RETURNTRANSFER => 1, CURLOPT_URL => "https://alertparser.herokuapp.com/api?key=5905f06366f30&text=".$alertexample, CURLOPT_FOLLOWLOCATION => true));
        $response = curl_exec($curl);
        curl_close($curl);
        echo $response;
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