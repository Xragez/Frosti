<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    public function login()
    {
        $userRepository = new UserRepository();

        if(!$this->isPost()){
            return $this->login();
        }

        $email = $_POST["email"];
        $password = $_POST["password"];

        $user = $userRepository->getUser($email);
        //TODO ADD try catch in case of exception from getUser
        if(!$user || $user->getEmail() !== $email || $user->getPassword() !== $password){
            return $this->render('login', ['messages' => ['Wrong email or password.']]);
        }

        return $this->render('inventory');
    }
}