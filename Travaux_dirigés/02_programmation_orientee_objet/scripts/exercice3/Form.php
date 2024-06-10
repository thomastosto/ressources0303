<?php
class Form {
    use TCommon;
    
    private string $method;
    private string $action;
    private array $elements = [];
    
    public function __construct(string $id, string $name, string $method = "post", string $action = "#") {
        $this->id = $id;
        $this->name = $name;
        $this->method = $method;
        $this->action = $action;
    }
    
    public function getMethod() : string {
        return $this->method;
    }
    
    public function getTarget() : string {
        return $this->target;
    }
    
    public function addElement(FormElement $element) {
        $this->elements[]= $element;
    }
    
    public function display() {
        echo "<form method=\"{$this->method}\" action=\"{$this->action}\" id=\"{$this->id}\" name=\"{$this->name}\">";
        foreach($this->elements as $element)
            $element->display();
        echo "</form>";
    }
    
}