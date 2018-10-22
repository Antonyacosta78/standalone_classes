<?php
/* PHP Class for filtering and retriving information from forms
 * AUTHOR: Antony Acosta
 * LAST EDIT: 2018-10-22
 */


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
    
    public function filterSingleFile($fieldname, array $validformats, $maxsize = 1048576){
        $file = $_FILES[$fieldname];
        $isValidFormat   = in_array($file['type'], $validformats);
        $isValidSize     = ($file['size'] <= $maxsize) ? true : false; 
        if($isValidFormat && $isValidSize){
               $file['name'] = filter_var($file['name'], FILTER_SANITIZE_STRING);
               $this->data["files"][] = $file;
               return true;
        }
        return false;
    }
    
    //files needs to be filtered first
    public function saveUploadedFiles($dir){
        try{
            if(!isset($this->data['files'])){
                throw new Exception("There are no files, have you filtered them?");
            }
            foreach($this->data['files'] as $file){
                $done = move_uploaded_file($file['tmp_name'], $dir.$file['name']);
                return $done;
            }
        }catch(Exception $e){
            echo "Error: ".$e->getMessage();
        }
        
    }
}