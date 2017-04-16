<?php
namespace App\Controllers;
use App\Models\ApiKey;

class ApiKeyController {
    public function add(){
        session_start();
        if(isset($_SESSION['auth_user']) == false){
            redirect("$root/user/home");
        }
        $auth = isset($_SESSION['auth_user']);

        view('apikeys/new', compact('auth') );
    }

    public function create(){
        session_start();
        $auth = isset($_SESSION['auth_user']);
        if(empty($_POST['name'])){
            redirect('./new');
        }
        $key = new ApiKey($_POST['name'], $_SESSION['auth_user']->email);
        if ($key->save()){
            redirect("$root/user/home", compact('auth') );
        }
    }
}