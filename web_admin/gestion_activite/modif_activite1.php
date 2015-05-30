<?php
require_once('../../inc/header.inc.php');
//$ref=$_GET['ref'];

$db=new DB_connection();
$db1=new DB_connection();
$req="update activite set nom_activite='".$db1->DB_escape($_POST['nom']) ."', description_activite='".$db1->DB_escape($_POST['desc']) ."', date_premier_cours='".$_POST['date1'] ."',type_activite=".'"'.$_POST['type'] .'"'." ,nbre_fixe_heure='".$_POST['nbh'] ."', capacite_max='".$_POST['cap'] ."' where ref_activite='".$_POST['ref'] ."'";
$db->DB_query($req);
header("Refresh:0;url=index.php");


?>