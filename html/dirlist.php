<?php
/* PHP File for listing contents of a directories
 * AUTHOR: Antony Acosta
 * LAST EDIT: 2018-10-29
 */
//define which dir
include PHPFOLDER."Dirlist.class.php";


$handler = new Dirlist(__DIR__);
$handler->setPrivatePrefix(".");
$title = $handler->getCurrentFolderName();

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
        <?php foreach ($handler->getLinks() as $filename=>$link): ?>
            <a href="<?php echo $link; ?>"><?php echo $filename; ?></a><br>
         <?php endforeach; ?>
            
    </body>
    
</html>


