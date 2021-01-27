<?php


class Item
{
    private $name;
    private $quantity;
    private $category;
    private $expDate;

    public function __construct($name, $quantity, $category, $expDate)
    {
        $this->name = $name;
        $this->quantity = $quantity;
        $this->category = $category;
        $this->expDate = $expDate;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }

    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function setCategory(string $category)
    {
        $this->category = $category;
    }

    public function getExpDate(): string
    {
        return $this->expDate;
    }

    public function setExpDate(string $expDate)
    {
        $this->expDate = $expDate;
    }

}