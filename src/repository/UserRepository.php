<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';
class UserRepository extends Repository
{
    public function getUser(string $email): ?User{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM users join user_details on email = :email
        ');
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user == false){
            return null;
            //TODO add exception
        }
        $return = new User($user['email'],$user['password'], $user['name'], $user['surname']);
        $return->setUsername($user['username']);
        $return->setUserId($user['id_user']);
        return $return;


    }
    public function addUser(User $user){
        $stmt = $this->database->connect()->prepare('
            INSERT INTO user_details (username, name, surname)
            VALUES(?, ?, ?)
        ');
        $stmt->execute([
            $user->getUsername(),
            $user->getName(),
            $user->getSurname()
        ]);

        $stmt = $this->database->connect()->prepare('
            INSERT INTO users (email, password, created_at, id_user_details)
            VALUES(?, ?, ?, ?)
        ');
        $date = new DateTime();
            $stmt->execute([
                $user->getEmail(),
                $user->getPassword(),
                $date->format('Y-m-d'),
                $this->getUserDetailsId($user)
        ]);
    }
    public function getUserDetailsId(User $user): int{
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.user_details WHERE public.user_details.username = :username
        ');
        $username = $user->getUsername();
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
        return $data['id_user_details'];
    }
}