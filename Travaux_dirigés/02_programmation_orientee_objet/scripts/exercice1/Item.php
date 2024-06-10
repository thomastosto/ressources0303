<?php
class Item {
        
    private string $title;
    private string $description;
    private float $price;
    
    public function __construct(string $title, string $description, float $price) {
        $this->title = $title;
        $this->description = $description;
        $this->price = $price;
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
 
    public function __toString() : string {
        return "{$this->title} ({$this->price} euros)";
    }
    
    public static function fromString(string $line) : ?Item {
        $t = explode(';', $line);
        if(count($t) == 3)
            return new Item($t[0], $t[1], $t[2]);
        else
            return null;
    }
    
}