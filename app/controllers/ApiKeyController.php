<?php
namespace App\Controllers;
use App\Models\ApiKey;

class ApiKeyController {
    public function add(){
        session_start();
        if(isset($_SESSION['auth_user']) == false){
            redirect($_SERVER['DOCUMENT_ROOT']);
        }

        view('apikeys/new');
    }

    public function create(){
        session_start();
        if(empty($_POST['name'])){
            redirect('./new');
        }
        $key = new ApiKey($_POST['name'], $_SESSION['auth_user']->email);
        if ($key->save()){
            redirect($_SERVER['DOCUMENT_ROOT'].'user/home');
        }
    }
}