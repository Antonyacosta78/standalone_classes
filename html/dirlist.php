<?php
/* PHP File for listing contents of a directories
 * AUTHOR: Antony Acosta
 * LAST EDIT: 2018-10-23
 */
//define which dir
$dir = ($_GET['dir']) ? filter_input(INPUT_GET, "dir", FILTER_SANITIZE_STRING) : __DIR__;
//anything  inside the dir starting with this prefix will not be shown
const PRIVATE_PREFIX = ".";

$contents = array_filter(scandir($dir),function($e){
    return strpos($e,PRIVATE_PREFIX) !== 0;
});

$dirpath = explode("/",$dir);

$title = $dirpath[count($dirpath)-1];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="HTML landing page for listing contents of a directories">
        <meta name="author" content="Antony Acosta">
        <title><?php echo $title; ?></title>
    </head>
    <body>
        <?php foreach ($contents as $row): ?>
            <a href="<?php echo $dir."/".$row; ?>"><?php echo $row; ?></a>
         <?php endforeach; ?>
    </body>
    
</html>


