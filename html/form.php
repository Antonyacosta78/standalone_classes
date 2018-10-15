<?php

include_once CONFIG::PHPFOLDER."Form.class.php";

if($_POST){
    $fields = array("nome","idade","cidade","email");
    $filters = array("nome"=>FILTER_SANITIZE_STRING, "idade"=>FILTER_SANITIZE_NUMBER_INT, "cidade"=>FILTER_SANITIZE_STRING, "email"=>FILTER_SANITIZE_EMAIL);
    $form = new Form($fields,$filters);   
}
?>
<pre>
<?php if($_POST){ var_dump($form->getFilteredData()); print_r($form->checkEmptyFields()); }?>
</pre>

<form method="post">
    Nome:   <input name="nome"      type="text"><br>
    cidade: <input name="cidade"    type="text"><br>
    email:  <input name="email"     type="text"><br>
    idade:  <input name="idade"     type="text"><br>
    <input type="submit">
  
    
    
</form>