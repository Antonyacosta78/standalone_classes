<?php
/* Page loader for standalone_classes repository
 * AUTHOR: Antony Acosta
 * LAST EDIT 2018-10-26
 */

include_once 'config.php';
$file = HTMLFOLDER.filter_input(INPUT_GET, 'page', FILTER_SANITIZE_STRING);

if(file_exists("$file.php")){
    include_once "$file.php";
}elseif(file_exists("$file.html")){
    include_once "$file.html";
}