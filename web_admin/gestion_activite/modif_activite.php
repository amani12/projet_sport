<?php
require_once('../../inc/header.inc.php');
$ref=$_GET['ref'];
$db= new DB_connection();
$req="select * from activite where ref_activite='".$ref ."'";
$db->DB_query($req);
$ligne=$db->DB_object();
?>
<?php echo'
<form action="modif_activite1.php" method="post">
	Reference: <input type="text" name="ref"  value="'.$ref .'">
	Name: <input type="text" name="nom" value="'.$ligne->nom_activite .'"><br>
	Description:<br> <textarea name="desc" rows="3" cols="50" >'.$ligne->description_activite .'</textarea><br>
	Date de premier cours: <input type="text" name="date1" value="'. $ligne->date_premier_cours .'"><br>
	Nombre d heure: <input type="number" name="nbh" value="'. $ligne->nbre_fixe_heure .'"><br>
	Capacite max: <input type="number" name="cap" value="'.$ligne->capacite_max .'"><br>
	Activite: <select name="type">
				<option value="Unite_Libre">UE libre</option>
				<option value="Journee_sports">Journee Sportif</option>
			 </select><br>
	
	 <input type="submit" name="submit">
</form>';
?>