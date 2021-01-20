<?php


class User
{
    private $email;
    private $password;
    private $name;
    private $surname;
    private $username;
    private $id_role;

    public function __construct(string $email, string $password, string $name, string $surname)
    {
        $this->email = $email;
        $this->password = $password;
        $this->name = $name;
        $this->surname = $surname;
    }

    public function setRoleId(int $id_role){
        $this->id_role = $id_role;
    }

    public function getRoleId(): int{
        return $this->id_role;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email)
    {
        $this->email = $email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password)
    {
        $this->password = $password;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setSurname(string $surname)
    {
        $this->surname = $surname;
    }

    public function getUsername(): string{
        return $this->username;
    }

    public function setUsername(string $username){
        $this->username = $username;
    }

}