<?php
include_once 'config.php';
$file = CONFIG::HTMLFOLDER.$_GET['page'];

if(file_exists("$file.php")){
    include_once "$file.php";
}elseif(file_exist("$file.html")){
    include_once "$file.html";
}