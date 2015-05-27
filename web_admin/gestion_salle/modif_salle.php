<?php
require_once('../../inc/header.inc.php');
?>
<?php
	$ref=$_GET['ref'];
	$db=new DB_connection();
	$req="select * from salle where ref_salle='".$ref ."'";
	$db->DB_query($req);
	$ligne=$db->DB_object();
?>
<?php
echo '
<form action="modif_salle1.php" method="post">
	
	Nom:<br> <input type="text" name="nom" value="'. $ligne->nom_salle .'"required>';
	
	echo '<input type="submit" name="okkkk"><br>';
	echo '</form>';


?>



