<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Inventory.php';
class InventoryRepository extends Repository
{
    public function getInventory(string $email): ?User{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.users WHERE email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
            //TODO add exception
        }

        return new User($user['email'],$user['password'], $user['name'], $user['surname']);


    }
}