<?php
//require_once('../../../inc/header.inc.php');
require_once('../../../inc/teteadmin.inc.php');
$db=new DB_connection();
$req="select * from activite where numero_personne='".$_SESSION['numero']."' and etat=1";
$db->DB_query($req);
?>