<?php
require_once('../../inc/header.inc.php');
$id=$_GET['id'];

$db=new DB_connection();
$req="delete from concerner where id_actualite='".$id ."'";
$db->DB_query($req);

$req="delete from actualite where id_actualite='".$id ."'";
$db->DB_query($req);
header("Refresh:0;url=index.php");
?>
