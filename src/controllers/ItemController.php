<?php

require_once 'AppController.php';
require_once __DIR__.'/../repository/ItemRepository.php';

class ItemController extends AppController {

    private $itemRepository;

    public function __construct(){
        parent::__Construct();
        $this->itemRepository = new ItemRepository();
    }

    public function inventory(){
        if(!$this->isUserLoggedIn()){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        $items = $this->itemRepository->getItems();
        $categories = $this->itemRepository->getCategories();
        $this->render('inventory', ['items' => $items, 'categories' => $categories]);
    }

    public function addItem(){
        if(!$this->isUserLoggedIn()){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        if(!$this->isPost()){
            return $this->render('inventory');
        }
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $category = $_POST['category'];
        $expDate = $_POST['expDate'];
        $item = new Item($name, $quantity, $category, $expDate);
        $this->itemRepository->addItem($item);
        $this->inventory();
    }
    public function removeItem(){
        if(!$this->isUserLoggedIn()){
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/login");
        }
        if(!$this->isPost()){
            return $this->render('inventory');
        }
        foreach ($_POST as $key=>$value){
            $this->itemRepository->removeItem((int)$key);
        }
        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/inventory");
    }
}