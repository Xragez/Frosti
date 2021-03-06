<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Item.php';
class ItemRepository extends Repository
{
    public function getItem(int $id): ?Item{
        $stmt = $this->database->connect()->prepare('
            SELECT quantity, expiration_date, id_item, public.items.name, public.item_categories.name
            FROM items
            LEFT JOIN item_categories ON items.id_category = item_categories.id_item_category
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
            RETURNING id_item
        ');
        $stmt->execute([
            $item->getName(),
            $item->getQuantity(),
            $this->getCategoryId($item),
            date("Y-m-d", strtotime($item->getExpDate()))
        ]);
        $itemReturn = $stmt->fetch(PDO::FETCH_ASSOC);
        $itemId = $itemReturn['id_item'];
        $stmt = $this->database->connect()->prepare('
            INSERT INTO users_items (id_user, id_item)
            VALUES (?, ?)
        ');
        $userId = $_SESSION['userId'];
        $stmt->execute([
            $userId,
            $itemId
        ]);
    }

    public function getItems(): array{
        $result = [];
        $stmt = $this->database->connect()->prepare('
            SELECT quantity, expiration_date as expDate, public.items.name as name, public.item_categories.name as category, items.id_item as id_item
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
            $date = $item['expdate'];
            $temp = new Item(
                $item['name'],
                $item['quantity'],
                $item['category'],
                $date
            );
            $temp->setId($item['id_item']);
            $result[] = $temp;
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
                WHERE item_categories.name = :category
        ');
        $category = $item->getCategory();
        $stmt->bindParam(':category', $category, PDO::PARAM_STR);
        $stmt->execute();
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        $categoryId = $category['id_item_category'];
        return $categoryId;
    }
    public function removeItem(int $id){
        $conn = $this->database->connect();
        $stmt = $conn->prepare('
            DELETE FROM public.users_items WHERE id_user = :id_user
            AND id_item = :id_item
        ');
        $conn->beginTransaction();
        $id_user = $_SESSION['userId'];
        $id_item = $id;
        $stmt->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $stmt->bindParam(':id_item', $id_item, PDO::PARAM_INT);
        $stmt->execute();
        $stmt = $conn->prepare('
            DELETE FROM public.items WHERE id_item = :id_item
        ');
        $stmt->bindParam(':id_item', $id_item, PDO::PARAM_INT);
        $stmt->execute();
        $conn->commit();
    }
    public function getItemByName(string $searchString){
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT quantity, expiration_date as expDate, public.items.name as name, public.item_categories.name as category, items.id_item as id_item
            FROM items
            LEFT JOIN item_categories ON id_category = item_categories.id_item_category
            LEFT JOIN users_items on items.id_item = users_items.id_item
            WHERE users_items.id_user = :id AND LOWER(public.items.name) LIKE :search
        ');
        $userId = $_SESSION['userId'];
        $stmt->bindParam(':id', $userId, PDO::PARAM_INT);
        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();
        $return = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //$return['expDate'] =
        return $return;
    }
}