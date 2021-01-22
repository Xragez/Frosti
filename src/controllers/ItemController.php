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
        $items = $this->itemRepository->getItems();
        $categories = $this->itemRepository->getCategories();
        $this->render('inventory', ['items' => $items, 'categories' => $categories]);
    }

    public function addItem(){
        if(!$this->isPost()){
            return $this->render('inventory');
        }
        $name = $_POST['name'];
        $quantity = $_POST['quantity'];
        $category = $_POST['category'];
        $expDate = $_POST['expDate'];
        $item = new Item($name, $quantity, $category, $expDate);
        $this->itemRepository->addItem($item);
        $this->render('inventory', ['messages' => ['Product added']]);
    }

}