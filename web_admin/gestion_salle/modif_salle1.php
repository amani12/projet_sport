<?php
require_once('../../inc/header.inc.php');
$ref=$_GET['ref'];

$db=new DB_connection();
$db1=new DB_connection();
$req="update salle set nom_salle='".$db1->DB_escape($_POST['nom']) ."' where ref_salle='".$ref ."'";
$db->DB_query($req);


?>