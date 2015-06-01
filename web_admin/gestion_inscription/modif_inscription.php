<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');

echo '<td><form method="post" action="modif_inscription1.php?num='.$_GET['num'].'">';
$db=new DB_connection();

$req="select * from s_inscrire where numero_personne='".$_GET['num']."' and etat_inscription=1";
$db->DB_query($req);
$pr=$tr=null;
$note=$notee=null;
while($res=$db->DB_object())
{
$db1=new DB_connection();
$req1="select nom_activite from activite where ref_activite='".$res->ref_activite."' ";
$db1->DB_query($req1);
$res1=$db1->DB_object();


if($res->principale==1)
{
		$pr='<option value="'.$res->ref_activite .'">'.$res1->nom_activite;
		$note=$res->notee_ou_pas;
}
else
{
		$tr='<option value="'.$res->ref_activite .'">'.$res1->nom_activite;
		$notee=$res->notee_ou_pas;
		
}

}
echo'
Activite principale: <select name="principale">';
if($pr!=null)
{
echo $pr;
}
$db2=new DB_connection();
$req2="select ref_activite,nom_activite from activite where ref_activite not in (select ref_activite from s_inscrire where numero_personne='".$_GET['num'] ."' and etat_inscription=1)";

$db2->DB_query($req2);

while($res2=$db2->DB_object())
{
	echo '<option value="'.$res2->ref_activite .'">'.$res2->nom_activite;
}
echo '</select> <input type="checkbox" name="no"';
if($note==1) {echo 'checked';}
echo' value="n">Notee';

echo'
<br>
Activite de transfert: <select name="transfert">';
if($tr!=null)
{
echo $tr;
}
$db2=new DB_connection();
$req2="select ref_activite,nom_activite from activite where ref_activite not in (select ref_activite from s_inscrire where numero_personne='".$_GET['num'] ."' and etat_inscription=1)";

$db2->DB_query($req2);
echo '<option value="">';
while($res2=$db2->DB_object())
{
	echo '<option value="'.$res2->ref_activite .'">'.$res2->nom_activite;
}

echo '</select> <input type="checkbox" name="no1"';
if($notee==1) {echo 'checked';}
echo' value="n">Notee <input type="submit" name"submit"></form></td>
			</tr>
	   </table>';

?>
