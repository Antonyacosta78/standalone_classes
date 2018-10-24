<?php
/* Page loader for standalone_classes repository
 * AUTHOR: Antony Acosta
 * LAST EDIT 2018-10-22
 */

include_once 'config.php';
$file = HTMLFOLDER.filer_input(INPUT_POST, 'page', FILTER_SANITIZE_STRING);

if(file_exists("$file.php")){
    include_once "$file.php";
}elseif(file_exists("$file.html")){
    include_once "$file.html";
}