<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Item.php';
class ItemRepository extends Repository
{
    public function getItem(int $id): ?Item{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM items WHERE id_item = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        $stmt->execute();

        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if($item == false){
            return null;
            //TODO add exception
        }

        return new Item($item['name'], $item['quantity'], $item['category'], $item['expitarion_date']);


    }
    public function addItem(Item $item): void{
        $stmt = $this->database->connect()->prepare('
            INSERT INTO items ()
        ');
    }
    public function getItemCategoryId(Item $item){
        //TODO
    }
    public function getItemNameId(Item $item){
        //TODO
    }
}