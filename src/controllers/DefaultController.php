<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index(){
        $this->render('login');
    }


    public function  accountDetails(){
        if($this->isUserLoggedIn()){
            $this->render('account_details');
        }
        else{
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
    }

    public function recipes(){

        if($this->isUserLoggedIn()){
            $this->render('recipes');
        }
        else{
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
    }

    public function registeredSuccessfully(){
        $this->render('registered_successfully');
    }
}