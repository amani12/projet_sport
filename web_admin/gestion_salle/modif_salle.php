<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
?>
<?php
	$ref=$_GET['ref'];
	$db=new DB_connection();
	$req="select * from salle where ref_salle='".$ref ."'";
	$db->DB_query($req);
	$ligne=$db->DB_object();
?>
<?php
echo '<td><table>
<form action="modif_salle1.php?ref='.$ligne->ref_salle .'" method="post">
	<tr><td>
	Nom:</td><td> <input type="text" name="nom" value="'. $ligne->nom_salle .'"required></td></tr><tr>';
	
	echo '<td><input type="submit" name="okkkk"></td><td></td></tr>';
	echo '</form></table></td></tr></table>';


?>



