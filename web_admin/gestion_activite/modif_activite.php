<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
$ref=$_GET['ref'];
$db= new DB_connection();
$req="select * from activite where ref_activite='".$ref ."'";
$db->DB_query($req);
$ligne=$db->DB_object();
?>
<?php echo'
<td>
<table width="200">
<form action="modif_activite1.php" method="post">
<tr><td>
	Reference:</td><td> <input type="text" name="ref"  value="'.$ref .'"readonly></td></tr>
	<tr><td>
	Name:</td><td> <input type="text" name="nom" value="'.$ligne->nom_activite .'"></td></tr>
	<tr><td >
	
	Description:</td><td></td></tr>
<tr><td colspan="2">	
	<textarea name="desc" rows="3" cols="50" >'.$ligne->description_activite .'</textarea></td></tr>
	<tr><td>
	Date de premier cours:</td><td> <input type="text" name="date1" value="'. $ligne->date_premier_cours .'"></td></tr>
	<tr><td>
	Nombre d heure:</td><td> <input type="number" name="nbh" value="'. $ligne->nbre_fixe_heure .'"></td></tr>
	<tr><td>
	Capacite max:</td><td> <input type="number" name="cap" value="'.$ligne->capacite_max .'">
	Activite: <select name="type">
				<option value="Unite_Libre">UE libre</option>
				<option value="Journee_sports">Journee Sportif</option>
			 </select></td></tr>
	<tr><td colspan="2">
	 <input type="submit" name="submit"></td></tr>
</form></table>
	 </td>
			</tr>
	   </table>';
?>