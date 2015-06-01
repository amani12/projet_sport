<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');

function prepa_activite($num)
{
		
		$db2=new DB_connection();
		$req2="select ref_activite,principale from s_inscrire where numero_personne='".$num ."' and etat_inscription=1";
		$db2->DB_query($req2);
		$activite[0]=$activite[1]=null;
		while($ligne2=$db2->DB_object())
		{
			
			$db3=new DB_connection();
			$req3="select nom_activite from activite where ref_activite='".$ligne2->ref_activite ."'";
			$db3->DB_query($req3);
			$ligne3=$db3->DB_object();
			if($ligne2->principale==1)
			{
				$activite[0]=$ligne3->nom_activite;
			}
			else
			{
				$activite[1]=$ligne3->nom_activite;
			}
			
}
return $activite;		
}
?>

<?php
$db=new DB_connection();
$req="select distinct numero_personne from s_inscrire where etat_inscription=1 ";
$db->DB_query($req);
?>

<?php
	echo'
	<td>
	<table width="600">
	<tr><td>Nom Prenom</td><td>activite Principale</td><td>activite Transfert</td><td>Modifier</td><td>Notifier</td></tr>';
	
	while($ligne=$db->DB_object())
	{
		$db1=new DB_connection();
		$req1="select nom,prenom,ref_niveau from personnes  where numero_personne='".$ligne->numero_personne ."'";
		$db1->DB_query($req1);
		
		
		$ligne1=$db1->DB_object();
		$activite=prepa_activite($ligne->numero_personne);
		echo '<tr><td><a id="fancy" href="info_personne.php?num='.$ligne->numero_personne .'">'.$ligne1->nom .' '. $ligne1->prenom .'</a></td><td>'. $activite[0] .'</td><td>'. $activite[1] .'</td><td><a href="modif_inscription.php?num='.$ligne->numero_personne .'">Modifier</a></td><td><a href="notifier_inscription.php?num='.$ligne->numero_personne .'">Notifier</a></td>';
	}
	
	
	
	?>
</table>
</td>
			</tr>
	   </table>