<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Item.php';
class ItemRepository extends Repository
{
    public function getItem(int $id): ?Item{
        $stmt = $this->database->connect()->prepare('
            SELECT quantity, expiration_date, id_item, public.item_names.name, public.item_categories.name
            FROM items
            LEFT JOIN item_names ON public.item_names.id_item_name = public.items.id_item_name
            LEFT JOIN item_categories ON item_names.id_item_category = item_categories.id_item_category
            WHERE id_item = :id
        ');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $item = $stmt->fetch(PDO::FETCH_ASSOC);

        if($item == false){
            return null;
            //TODO add exception
        }

        return new Item($item['name'], $item['quantity'], $item['category'], $item['expiration_date']);


    }
    public function addItem(Item $item): void{
        $stmt = $this->database->connect()->prepare('
            INSERT INTO items (name, quantity, id_category, expiration_date)
            VALUES (?, ?, ?, ?)
        ');
        $stmt->execute([
            $item->getName(),
            $item->getQuantity(),
            $this->getCategoryId($item),
            $item->getExpDate()
        ]);
    }

    public function getItems(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT quantity, expiration_date as expDate, public.items.name as name, public.item_categories.name as category
            FROM items
            LEFT JOIN item_categories ON id_category = item_categories.id_item_category
            LEFT JOIN users_items on items.id_item = users_items.id_item
            WHERE users_items.id_user = :id
        ');
        $userId = $_SESSION['userId'];
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($items as $item){
            $date = new DateTime($item['expdate']);
            $result[] = new Item(
                $item['name'],
                $item['quantity'],
                $item['category'],
                $date
            );
        }
        return $result;
    }
    public function getCategories(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT item_categories.name FROM item_categories
        ');
        $stmt->execute();
        $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories as $category){
            $result[] = $category['name'];
        }
        return $result;
    }
    public function getCategoryId(Item $item): int{
        $stmt = $this->database->connect()->prepare('
            SELECT item_categories.id_item_category FROM item_categories
                WHERE item_categories.name = :name
        ');
        $name = $item->getName();
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt;
    }
}