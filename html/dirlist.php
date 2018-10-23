<?php
/* PHP File for listing contents of a directories
 * AUTHOR: Antony Acosta
 * LAST EDIT: 2018-10-23
 */
//define which dir
$dir = ".";
//anything  inside the dir starting with this prefix will not be shown
const PRIVATE_PREFIX = ".";

$contents = array_filter(scandir($dir),function($e){
    return strpos($e,PRIVATE_PREFIX) !== 0;
});

echo __DIR__;
echo "<br>";
echo getcwd();
?>

<pre><?php var_dump($contents); ?></pre>

