<?php

/* PHP Class for building links and manage directories
 * AUTHOR: Antony Acosta
 * LAST EDIT: 2018-10-29
 */
class Dirlist {
    
    public $cwd;
    public $url;
    private $contents;
    private $privateprefix;
    private $privatefiles = [];
    
    public function __construct($cwd){
        $this->cwd = $cwd;
        $this->updateContents();
    }
    
    public function setPrivate($data){
        if(is_array($data)){
            $this->privatefiles = array_merge($this->privatefiles, $data);
            return true;
        }elseif(is_string($data)){
            array_push($this->privatefiles, $data);
            return true;
        }
        return false;
    }
    
    public function getUrl(){
        return "{$_SERVER["REQUEST_SCHEME"]}://{$_SERVER["HTTP_HOST"]}".str_replace($_SERVER["DOCUMENT_ROOT"], "", $this->cwd);
    }
    
    public function setPrivatePrefix($prefix){
        $this->privateprefix = $prefix;
    }
    
    public function setcwd($dir){
        $this->cwd = $dir;
        $this->updateContents();
    }
    
    public function updateContents(){
        $this->contents = scandir($this->cwd);
    }
    
    public function getContents(){
        return array_filter($this->contents,function($data){
            return (strpos($data, $this->privateprefix) !== 0 && !in_array($data, $this->privatefiles));
        });
    }
    
    public function getLinks(){
        $names = $this->getContents();
        $links = array_map(function($elem){
                return $this->getUrl()."/".$elem;
            }, $names);
            
        return array_combine($names, $links);
    }
    
    public function getCurrentFolderName(){
        $path = explode("/",$this->cwd);
        return $path[count($path)-1];
    }
    
    public function mkdir($name){
        if(!is_writable($this->cwd)){
            echo "This folder is not writable";
            return false;
        }
        return mkdir($this->cwd."/".$name);
    }
    
    
    
}
