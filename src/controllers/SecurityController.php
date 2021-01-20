<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repository/UserRepository.php';

class SecurityController extends AppController
{
    private UserRepository $userRepository;

    public function __construct()
    {
        parent::__construct();
        $this->userRepository = new UserRepository();
    }

    public function login()
    {
        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $this->userRepository->getUser($email);
        //TODO ADD try catch in case of exception from getUser
        if(!$user || $user->getEmail() !== $email || $user->getPassword() !== md5($password)){
            return $this->render('login', ['messages' => ['Wrong email or password.']]);
        }
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $user->getUsername();
        return $this->render('inventory');

    }
    public function register(){
        if(!$this->isPost()){
            return $this->render('register');
        }
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmedPassword = $_POST['confirmedPassword'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $username = $_POST['username'];
        if($password != $confirmedPassword){
            return $this->render('register', ['messages' => ['Passwords are not the same']]);
        }
        $user = New User($email, md5($password), $name, $surname);
        $user->setUsername($username);
        $user->setRoleId(2);

        $this->userRepository->addUser($user);
        return $this->render('registered_successfully');
    }
}