<?php
/* PHP Config file parser
 * AUTHOR: Antony Acosta
 * LAST EDIT 2018-10-24
 */
$ini = parse_ini_file("config.ini");

define("PHPFOLDER",     $ini["php"]);
define("HTMLFOLDER",    $ini['html']);
define("JSFOLDER",      $ini['js']);
define("CSSFOLDER",     $ini['css']);