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
        if($this->isUserLoggedIn()){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/inventory");
        }
        if(!$this->isPost()){
            return $this->render('login');
        }

        $email = $_POST["email"];
        $password = $_POST["password"];
        $user = $this->userRepository->getUser($email);
        //TODO ADD try catch in case of exception from getUser
        if(!$user || $user->getEmail() !== $email || !password_verify($password, $user->getPassword())){
            return $this->render('login', ['messages' => ['Wrong email or password.']]);
        }
        $_SESSION['username'] = $user->getUsername();
        $_SESSION['userId'] = $user->getUserId();
        $_SESSION['name'] = $user->getName();
        $_SESSION['surname'] = $user->getSurname();
        $_SESSION['email'] = $user->getEmail();

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/inventory");
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
        $password = password_hash($password, PASSWORD_DEFAULT);
        $user = New User($email, $password, $name, $surname);
        $user->setUsername($username);
        $user->setRoleId(2);

        $this->userRepository->addUser($user);
        return $this->render('registered_successfully');
    }
    public function logout(){
        return $this->render('logout');

    }
}