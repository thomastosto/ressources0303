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
    
    public function displayForm() : void {
        echo <<<HTML
<div class="mb-3">
  <label for="title">Title</label>
  <input id="title" name="title" type="text" class="form-control" value="{$this->title}"/>
</div>
<div class="mb-3">
  <label for="title">Description</label>
  <textarea id="description" name="description" class="form-control">{$this->description}</textarea>
</div>
<div class="mb-3">
  <label for="price">Price</label>
  <input id="price" name="price" type="text" class="form-control" value="{$this->price}"/>
</div>
HTML;
    }
    
    public static function fromForm() : Item {
        $title = "";
        $description = "";
        $price = 0.0;

        if(isset($_POST['title'])) $title = $_POST['title'];
        if(isset($_POST['description'])) $description = $_POST['description'];
        if(isset($_POST['price'])) $price = floatval($_POST['price']);
        
        return new Item($title, $description, $price);
    }
    
}