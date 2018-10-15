<?php

class Form{
    
    private $data = array();
    private $fields;
    private $filters;
    private $method;
    
    public function __construct(array $fields, array $filters, $method = INPUT_POST){
        $this->fields   = $fields;
        $this->filters  = $filters;
        $this->method   = $method;
    }
    
    public function getFilteredData(){
        foreach($this->fields as $field){
            $this->data[$field] = filter_input($this->method, $field, $this->filters[$field]);
            if($this->data[$field] === ""){
                $this->data[$field] = null;
            }
        }
        return $this->data;
    }
    
    public function checkEmptyFields(){
        return (in_array(null,$this->data)) ? true : false;
    }
}