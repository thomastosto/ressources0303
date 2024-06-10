<?php
abstract class FormElement {
    use TCommon;
    
    private string $label;
    
    public function __construct(string $id, string $name, string $label) {
        $this->id = $id;
        $this->name = $name;
        $this->label = $label;
    }
    
    public function getLabel() : string {
        return $this->label;
    }
    
    abstract public function display();
    
}