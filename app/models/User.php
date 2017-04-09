<?php
namespace App\Models;
use PDO;
use App\Core\App;
class User {
    public $email;
    public $password;
    public $firstname;
    public $lastname;
    
    public function __construct($email, $password, $firstname = null, $lastname = null){
        $this->email = $email;
        $this->password = $password;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
    }

    public function authenticate() {
        $authQuery = App::get('connection')->prepare('select * from users where email = ? and password = ?');
        $authQuery->execute(array($this->email, $this->password));
        $result_array = $authQuery->fetch();
        if ($result_array != false){
            if(password_verify($this->password, $result_array['password'])){
                $this->firstname = $result_array['firstname'];
                $this->lastname = $result_array['lastname'];
                $this->password = null;
                return true;
            } else{
                return false;
            }
        } else {
            return false;
        }

    }

    public function save() {
        $saveQuery = App::get('connection')->prepare('insert into users values (?, ?, ?, ?)');
        $saveQuery->execute(array($this->email, $this->password, $this->firstname, $this->lastname));
    }
}