<?php
enum TextElementType : string {
    case text = "text";
    case password = "password";
}

class TextElement extends FormElement {
    
    private TextElementType $type;
    public string $default;
    
    public function __construct(string $id, string $name, string $label, TextElementType $type, string $default) {
        parent::__construct($id, $name, $label);
        $this->type = $type;
        $this->default = $default;
    }
    
    public function display() : void {
        echo "<div class=\"mb-3 row\">";
        echo "  <label class=\"col-form-label col-2\" for=\"{$this->getId()}\">{$this->getLabel()}</label>";
        echo "  <div class=\"col-10\">";
        echo "    <input class=\"form-control\" type=\"{$this->type->value}\" value=\"{$this->default}\" id=\"{$this->getId()}\" name=\"{$this->getName()}\">";
        echo "  </div>";
        echo "</div>";
    }
    
}