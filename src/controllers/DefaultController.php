<?php

require_once 'AppController.php';

class DefaultController extends AppController{

    public function index(){
        $this->render('login');
    }


    public function  accountDetails(){
        $this->render('account_details');
    }

    public function recipes(){
        $this->render('recipes');
    }

}