<?php
require_once('../../inc/header.inc.php');
if(isset($_POST['doc_tele'])&&!empty($_POST['doc_tele'])){
move_uploaded_file ($_FILES['doc_tele']['tmp_name'], 
       "../../img/uploads/{$_FILES['doc_tele'] ['name']}");	
}
?>