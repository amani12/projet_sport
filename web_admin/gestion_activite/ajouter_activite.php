<?php
require_once('../../inc/header.inc.php');
?>
<?php
	$db=new DB_connection();
	$req="select * from appartenir where code_statue=1";
	$db->DB_query($req);
	
?>
<?php if(!isset($_GET['re']))
{
echo '
<form action="ajouter_activite.php?re=1" method="post">
	Reference: <input type="text" name="ref" required>
	Name: <input type="text" name="nom"><br>
	Description:<br> <textarea name="desc" rows="3" cols="50"></textarea><br>
	Date de premier cours: <input type="text" name="date1"><br>
	Activite: <select name="type">
				<option value="Unite_Libre">UE libre</option>
				<option value="Journee_sports">Journee Sportif</option>
			 </select><br>
	
	Nombre heure: <input type="number" name="nbh"><br>
	Capacite max: <input type="number" name="cap"><br>
	Responsable: <select name="responsable"><br>';
	while($ligne=$db->DB_object())
	{
		echo '<option value="'.$ligne->numero_personne .'">'. $ligne->numero_personne .'</option>';
	}
	
	echo '<input type="submit" name="okkkk"><br>';
	 echo '</form>';
}
else {
$db1=new DB_connection();
$req="insert into activite (ref_activite,nom_activite,description_activite,date_premier_cours,type_activite,nbre_fixe_heure,capacite_max,etat)Values('".$db1->DB_escape($_POST['ref'])."','".$db1->DB_escape($_POST['nom']) ."','".$db1->DB_escape($_POST['desc']) ."','".$_POST['date1'] ."','".$_POST['type'] ."','".$_POST['nbh'] ."', '".$_POST['cap'] ."','1')";
$db1->DB_query($req);
}
?>



