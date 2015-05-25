<?php
require_once('../../inc/header.inc.php');
$id=$_GET['id'];
//echo $id;
$db=new DB_connection();
$db1=new DB_connection();
$req="update actualite set titre='".$db1->DB_escape($_POST['titre']) ."', description_act='".$db1->DB_escape($_POST['desc']) ."' where id_actualite='".$id ."'";
$db->DB_query($req);
$req="delete from concerner where id_actualite='".$id ."'";
$db->DB_query($req);
foreach($_POST['activite'] as $valeur)
{
   $req="insert into concerner (id_actualite,ref_activite)Values('".$id ."','".$valeur ."')";
   $db->DB_query($req);
}

?>