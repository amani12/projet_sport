<?php
require_once('../../inc/header.inc.php');
$ref=$_GET['ref'];
$m=$_GET['m'];
$db=new DB_connection();

$req="update salle set maintenance='";
if($m==0)
{
$req.="1' where ref_salle='".$ref ."'";
}
else
{
$req.="0' where ref_salle='".$ref ."'";
}
$db->DB_query($req);

header("Refresh:0;url=index.php");
?>