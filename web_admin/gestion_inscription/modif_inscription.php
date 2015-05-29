<?php
require_once('../../inc/header.inc.php');
$db=new DB_connection();
$req="select * from personnes where numero_personne='".$_GET['num']."'";
$db->DB_query($req);
$res=$db->DB_object();
echo '<table>
		<tr><td>'.$res->nom .'</td><td>'.$res->prenom.'</td><td>'.$res->ref_niveau .'</td>';
$req="select * from appartenir where numero_personne='".$_GET['num']."'";
$db->DB_query($req);
$res=$db->DB_object();
echo '<td style=\'width:150px\'>
		<img src="'.$res->photo_identite .'" alt="Smiley face" width="80" height="80">
		</td></tr>
	<tr><td style=\'width:150px\'>
		<img src="'.$res->photo_certificat .'" alt="Smiley face" width="80" height="80">
		</td></tr>';

$req="select * from s_inscrire where numero_personne='".$_GET['num']."' and etat_inscription=1";
$db->DB_query($req);
while($res=$db->DB_object())
{
$db1=new DB_connection();
$req1="select nom_activite from activite where ref_activite='".$res->ref_activite."' ";
$db1->DB_query($req1);
$res1=$db1->DB_object();
echo '<tr><td>'.$res1->nom_activite .'<td><td>';
if($res->principale==1)
{
		echo 'activte principale';
}
else
{
	echo 'activite de transfert';
	}
	echo'</td><td>';
	if($res->notee_ou_pas==1)
	{
		echo 'notee';
		}
		else
		{
		echo 'non notee';
		}
		echo '</td></tr>';
}
?>
