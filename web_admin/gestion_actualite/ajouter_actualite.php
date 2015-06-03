<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
?>
<?php
	$db=new DB_connection();
	$req="select * from activite";
	$db->DB_query($req);
?>
<?php if(!isset($_GET['re']))
{
echo '
<td>
<table width="200">
<form action="ajouter_actualite.php?re=1" method="post">
<tr><td>
	Name: </td><td><input type="text" name="titre" required></td></tr>
	<tr><td>
	Description:</td><td></td></tr><tr><td colspan="2"> <textarea name="desc" rows="3" cols="50"></textarea></td></tr>
	<tr><td colspan="2">
	Activite:';
	
	while($ligne=$db->DB_object())
	{
		echo '<input type="checkbox" name="activite[]" value="'.$ligne->ref_activite .'">'.$ligne->nom_activite ;
	}
	
	echo '</td></tr><tr><td colspan="2"><input type="submit" name="okkkk"></td><tr>';
	 echo '</form></table>
	 </td>
			</tr>
	   </table>';
}
else {
$db1=new DB_connection();
$req="insert into actualite (titre,description_act)Values('".$db1->DB_escape($_POST['titre'])."','".$db1->DB_escape($_POST['desc']) ."')";
$db1->DB_query($req);
$id=$db1->DB_id();
if(isset($_POST['activite']))
{
foreach($_POST['activite'] as $valeur)
{
   $req="insert into concerner (id_actualite,ref_activite)Values('".$id."','".$valeur ."')";
   $db1->DB_query($req);
}
}
header("Refresh:0;url=index.php");
}
?>



