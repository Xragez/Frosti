<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';

class SecurityController extends AppController
{
    public function login()
    {
        $user = new User('user@gmail.com', 'user', 'Jan', 'Kowalski');

        if(!$this->isPost()){
            return $this->login();
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        if($user->getEmail() !== $email || $user->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Wrong email or password.']]);
        }

        return $this->render('inventory');
    }
}