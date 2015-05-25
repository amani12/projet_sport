<?php
require_once('../../inc/header.inc.php');

$db=new DB_connection();
$db1=new DB_connection();
$req="insert into activite (ref_activite,nom_activite,description_activite,date_premier_cours,type_activite,nbre_fixe_heure,capacite_max,etat)('".$db1->DB_escape($_POST['ref'])."','".$db1->DB_escape($_POST['nom']) ."','".$db1->DB_escape($_POST['desc']) ."','".$_POST['date1'] ."','".$_POST['type'] ."','".$_POST['nbh'] ."', '".$_POST['cap'] ."','1')";
$db->DB_query($req);


?>