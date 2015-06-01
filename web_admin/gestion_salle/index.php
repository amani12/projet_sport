<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
?>

<?php
$db=new DB_connection();
$req="select * from salle";
$db->DB_query($req);
?>
<td>
<table>
<?php
	if($ligne=$db->DB_object())
	{
	
	echo'
	<table width="500">
	<tr><td>Ref</td><td>Nom</td><td>Maintenance</td><td>Modifier</td></tr>';
	echo '<tr><td>'. $ligne->ref_salle .'</td><td>'. $ligne->nom_salle .'</td><td><a href="changer_etat_salle.php?ref='.$ligne->ref_salle .'&m='.$ligne->maintenance .'">';
	if($ligne->maintenance==0){
	echo 'disponible';}
	else
	{
	echo 'en maintenance';
	}
	echo'</a></td><td><a href="modif_salle.php?ref='.$ligne->ref_salle .'">Modifier</a></td></tr>';
	while($ligne=$db->DB_object())
	{
		echo '<tr><td>'. $ligne->ref_salle .'</td><td>'. $ligne->nom_salle .'</td><td><a href="changer_etat_salle.php?ref='.$ligne->ref_salle .'&m='.$ligne->maintenance .'">';
	if($ligne->maintenance==0){
	echo 'disponible';}
	else
	{
	echo 'en maintenance';
	}
	echo'</a></td><td><a href="modif_salle.php?ref='.$ligne->ref_salle .'">Modifier</a></td></tr>';
	}
	
	}
	
	else
	{
		echo 'aucune salle';
		}
	
	echo '</table><table width="500">';
	echo '<tr><td><a href="ajouter_salle.php" target="_blank"> ajouter une nouvelle salle </a></td></tr> </table>';
	?>
</table><td><tr><table>