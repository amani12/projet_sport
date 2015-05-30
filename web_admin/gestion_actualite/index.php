<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
?>

<?php
$db=new DB_connection();
$req="select * from actualite";
$db->DB_query($req);
?>

<?php
echo '<td>
<table width="400">';
	if($ligne=$db->DB_object())
	{
	
	echo'
	
	<tr><td>titre</td><td>Description</td><td>Modifier</td><td>Supprimer</td></tr>';
	echo '<tr><td>'. $ligne->titre .'</td><td>'. $ligne->description_act .'</td><td><a href="modif_actualite.php?id='.$ligne->id_actualite .'">Modifier</a></td><td><a href="delete_actualite.php?id='.$ligne->id_actualite .'">Suprimer</a></td></tr>';
	while($ligne=$db->DB_object())
	{
		echo '<tr><td>'. $ligne->titre .'</td><td>'. $ligne->description_act .'</td><td><a href="modif_actualite.php?id='.$ligne->id_actualite .'">Modifier</a></td><td><a href="delete_actualite.php?id='.$ligne->id_actualite .'">Suprimer</a></td></tr>';
	}
	
	}
	else
	{
		echo 'aucune actualite';
	}
	echo '</table><table width="400"><tr><td><a href="ajouter_actualite.php" target="_blank"> ajouter une nouvelle actualite </a></td></tr></table>
	</table>
</td>
			</tr>
	   </table>';
	?>
