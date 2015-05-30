<?php
require_once('../../inc/header.inc.php');
$ref=$_GET['ref'];

$db=new DB_connection();
$req="delete from concerner where ref_activite='".$ref ."'";
$db->DB_query($req);
$req="delete  from horaire where ref_activite='".$ref ."'";
$db->DB_query($req);
$req="delete  from pratiquer where ref_activite='".$ref ."'";
$db->DB_query($req);
$req="delete  from reserve where ref_activite='".$ref ."'";
$db->DB_query($req);
$req="delete  from s_inscrire where ref_activite='".$ref ."'";
$db->DB_query($req);
$req="delete from activite where ref_activite='".$ref ."'";
$db->DB_query($req);
header("Refresh:0;url=index.php");
?>
