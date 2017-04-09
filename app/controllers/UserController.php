<?php
namespace App\Controllers;
use App\Models\User;

class UserController {
    public function home(){
        session_start();

        if (isset($_SESSION['auth_user'])){

            view('home');
        } else {

            view('login');
        }

    }
    
    public function login(){
        if(empty($_POST['email']) || empty($_POST['password'])){
            redirect("./user/home");
        }
        $user = new User($_POST['email'], $_POST['password']);
        if ($user->authenticate()){
            $_SESSION['auth_user'] = $user;
        } 
        redirect('./user/home');
    }

    public function signup(){
        view('new');

    }

    public function process_signup(){
        if(empty($_POST['firstname']) || empty($_POST['lastname']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['cpassword'])){
            redirect('./user/new');
        }
        if($_POST['password'] != $_POST['cpassword']){
            redirect('./user/new');
        }
        $new_user = new User($_POST['email'], password_hash($_POST['password'], PASSWORD_DEFAULT), $_POST['firstname'], $_POST['lastname']);
        $new_user->save();
        redirect("./user/home");

    }
}