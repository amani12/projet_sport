<?php
require_once('../../inc/header.inc.php');
?>
<?php
	$db=new DB_connection();
	$req="select * from activite";
	$db->DB_query($req);
?>
<?php if(!isset($_GET['re']))
{
echo '
<form action="ajouter_actualite.php?re=1" method="post">
	Name: <input type="text" name="titre" required><br>
	Description:<br> <textarea name="desc" rows="3" cols="50"></textarea><br>
	
	Activite:';
	
	while($ligne=$db->DB_object())
	{
		echo '<input type="checkbox" name="activite[]" value="'.$ligne->ref_activite .'">'.$ligne->ref_activite ;
	}
	
	echo '<input type="submit" name="okkkk"><br>';
	 echo '</form>';
}
else {
$db1=new DB_connection();
$req="insert into actualite (titre,description_act)Values('".$db1->DB_escape($_POST['titre'])."','".$db1->DB_escape($_POST['desc']) ."')";
$db1->DB_query($req);
$id=$db1->DB_id();
foreach($_POST['activite'] as $valeur)
{
   $req="insert into concerner (id_actualite,ref_activite)Values('".$id."','".$valeur ."')";
   $db1->DB_query($req);
}
}
?>



