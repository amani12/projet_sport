<?php 
require_once('../../inc/header.inc.php');
require_once('../../inc/tete.inc.php');
isset($_POST['ref'])
{
	$db = new DB_connection();
	$req="select * from activite where ref_activite='".$_POST['ref']."'";
	$db->DB_query($req);
	$ligne=$db->DB_query($req);
	
?>