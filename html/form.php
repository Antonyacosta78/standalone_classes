<?php
/* HTML for testing purpose for CLASS Form.class.php
 * AUTHOR: Antony Acosta
 * LAST EDIT: 2018-10-22
 */
include_once PHPFOLDER."Form.class.php";

if($_POST){
    $fields = array("nome","idade","cidade","email");
    $filters = array("nome"=>FILTER_SANITIZE_STRING, "idade"=>FILTER_SANITIZE_NUMBER_INT, "cidade"=>FILTER_SANITIZE_STRING, "email"=>FILTER_SANITIZE_EMAIL);
    $form = new Form($fields,$filters);
    $form->filterSingleFile("file1", ["image/gif","image/jpeg","image/png"]);
    $form->saveUploadedFiles("img/");
}
?>

<form method="post" enctype="multipart/form-data">
    Name:   <input name="nome"      type="text"><br>
    City: <input name="cidade"    type="text"><br>
    Email:  <input name="email"     type="text"><br>
    Age:  <input name="idade"     type="text"><br>
    Image: <input type="file" name="file1">
    <input type="submit">
  
    
    
</form>