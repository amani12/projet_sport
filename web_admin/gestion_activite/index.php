<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
?>

<?php
$db=new DB_connection();
$req="select * from activite order by nom_activite ASC";
$db->DB_query($req);
?>
<td>
	
<table width="400">
<?php
	if($ligne=$db->DB_object())
	{
	
	echo'
	
	<tr><td>Ref</td><td>Nom</td><td>etat</td><td>Modifier</td><td>Supprimer</td></tr>';
	echo '<tr><td>'.$ligne->ref_activite .'</td><td>'. $ligne->nom_activite .'</td><td> <a href="changer_etat.php?ref='.$ligne->ref_activite .'&etat='. $ligne->etat .'">'; if($ligne->etat==1){ echo 'actif';} else {echo 'inactif';} echo'</a> </td><td><a href="modif_activite.php?ref='.$ligne->ref_activite .'">Modifier</a></td><td><a href="delete_activite.php?ref='.$ligne->ref_activite .'">Suprimer</a></td>';
	while($ligne=$db->DB_object())
	{
		echo '<tr><td>'.$ligne->ref_activite .'</td><td>'. $ligne->nom_activite .'</td><td><a href="changer_etat.php?ref='.$ligne->ref_activite .'&etat='. $ligne->etat .'">'; if($ligne->etat==1){ echo 'actif';} else {echo 'inactif';} echo'</a></td><td><a href="modif_activite.php?ref="'.$ligne->ref_activite .'">Modifier</a></td><td><a href="delete_activite.php?ref='.$ligne->ref_activite .'">Suprimer</a></td>';
	}
	
	}
	
	else
	{
		echo 'aucune activite';
	}
	echo '</table><table width="400">';
	echo '<tr><td><a href="ajouter_activite.php" target="_blank"> ajouter une nouvelle activite </a></td></tr></table> ';
	?>

</td>
			</tr>
	   </table>
<?php
require_once('../../inc/footeradmin.inc.php');
?>	   