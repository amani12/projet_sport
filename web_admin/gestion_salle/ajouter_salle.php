<?php
require_once('../../inc/header.inc.php');
?>
<?php if(!isset($_GET['re']))
{
echo '
<form action="ajouter_salle.php?re=1" method="post">
	Reference: <input type="text" name="ref" required><br>
	Nom:<br> <input type="text" name="nom" required>
	Est elle en maintenance? 
	<input type="radio" name="main" value="0">non 
	<input type="radio" name="main" value="1">oui';
	
	echo '<input type="submit" name="okkkk"><br>';
	echo '</form>';
}
else {
$db1=new DB_connection();
$req="insert into salle (ref_salle,nom_salle,maintenance)Values('".$db1->DB_escape($_POST['ref'])."','".$db1->DB_escape($_POST['nom']) ."','".$_POST['main']."')";
$db1->DB_query($req);
}
?>



