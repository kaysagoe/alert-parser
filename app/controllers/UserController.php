<?php
namespace App\Controllers;
use App\Models\User;
use App\Models\ApiKey;

class UserController {
    public function home(){
        session_start();

        if (isset($_SESSION['auth_user'])){
            $keys = ApiKey::AllFrom($_SESSION["auth_user"]->email);
            view('users/home', compact('keys'));
        } else {

            view('users/login');
        }

    }
    
    public function login(){
        session_start();
        if(empty($_POST['email']) || empty($_POST['password'])){
            redirect("./home");
        }
        $user = new User($_POST['email'], $_POST['password']);
        if ($user->authenticate()){
            $_SESSION['auth_user'] = $user;
        } 
        redirect('./home');
    }

    public function signup(){
        view('users/new');

    }

    public function process_signup(){
        if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cpassword'])){
            redirect('./new');
        }
        if($_POST['password'] != $_POST['cpassword']){
            redirect('./new');
        }
        $new_user = new User($_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['firstname'], $_POST['lastname']);
        $new_user->save();
        redirect("./home");

    }
}