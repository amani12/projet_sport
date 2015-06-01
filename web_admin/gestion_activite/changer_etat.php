<?php
require_once('../../inc/header.inc.php');
$ref=$_GET['ref'];
$etat=$_GET['etat'];
$db=new DB_connection();

$req="update activite set etat='";
if($etat==0)
{
$req.="1' where ref_activite='".$ref ."'";
}
else
{
$req.="0' where ref_activite='".$ref ."'";
}
$db->DB_query($req);

header("Refresh:0;url=index.php");
?>