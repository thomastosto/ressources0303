<?php
trait TCommon {
    
    private string $id;
    private string $name;
    
    public function getId() : string {
        return $this->id;
    }
    
    public function getName() : string {
        return $this->name;
    }
    
}