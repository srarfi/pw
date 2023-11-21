<?php
class Product
{
    private $id_product = null;
    private $product_name = null;
    private $price = null;
    private $description = null;
    private $photo = null; 

    public function getProductId()
    {
        return $this->id_product;
    }

    public function setProductName($name)
    {
        $this->product_name = $name;
    }

    public function getProductName()
    {
        return $this->product_name;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setPhoto($photo)
    {
        $this->photo = $photo;
    }

    public function getPhoto()
    {
        return $this->photo;
    }

    public function __construct($id = null, $name, $price, $description, $photo)
    {
        $this->id_product = $id;
        $this->product_name = $name;
        $this->price = $price;
        $this->description = $description;
        $this->photo = $photo; // Initialize the photo property
    }
}
?>
