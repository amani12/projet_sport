<?php
require_once('../../inc/header.inc.php');
/*if(isset($_GET['num']))
{
$db=new DB_connection();
$req="select * from appartenir where numero_personne='".($_GET['num'])."'";
$db->DB_query($req);
$res=$db->DB_object();
$to =$res->email_uha ;
}
if(isset($_GET['mes']))
{
$db=new DB_connection();
$req="SELECT * FROM mesagerie where code_messagerie='".($_GET['mes'])."'";
$db->DB_query($req);
$res=$db->DB_object();
$subject = $res->raison;
 
// Message
$msg = $res->contenue;
}
 
// Headers
$headers = 'From: Adrien Pellegrini <amani.younes2@gmail.fr>'."\r\n";
$headers .= "\r\n";
 
// Function mail()
mail($to, $subject, $msg, $headers);*/
?>