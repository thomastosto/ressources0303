<?php
class Item {

    private int $id;        
    private string $title;
    private string $description;
    private float $price;
    private int $supplier;
    
    public function __construct(int $id, string $title, string $description, float $price, int $supplier) {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
        $this->supplier = $supplier;
    }
     
    public function getId() : int {
        return $this->id;
    }
    
    public function setId(int $id) : void {
        $this->id = $id;
    }
    
    public function getTitle() : string {
        return $this->title;
    }

    public function getDescription() : string {
        return $this->description;
    }

    public function getPrice() : float {
        return $this->price;
    }

    public function getSupplier() : int {
        return $this->supplier;
    }

    public function __toString() : string {
        return "{$this->title} ({$this->price} euros)";
    }

}