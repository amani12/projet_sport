<?php
require_once('../../inc/header.inc.php');
$id=$_GET['id'];
$db= new DB_connection();
$req="select * from actualite where id_actualite='".$id ."'";
$db->DB_query($req);
$ligne=$db->DB_object();
$db1= new DB_connection();
$req1="select * from concerner where id_actualite='".$id ."'";
$db1->DB_query($req1);
$db2= new DB_connection();
$req2="select * from activite where ref_activite not in (select ref_activite from concerner where id_actualite='".$id ."')";
$db2->DB_query($req2);
?>
<?php echo'
<form action="modif_actualite1.php?id='.$id .'" method="post">
	
	Name: <input type="text" name="titre" value="'.$ligne->titre .'"><br>
	Description:<br> <textarea name="desc" rows="3" cols="50" >'.$ligne->description_act .'</textarea><br>
	
	
	Activite:';
	
	while($ligne1=$db1->DB_object())
	{
		echo '<input  id="myCheck" type="checkbox" name="activite[]" value="'.$ligne1->ref_activite .'" checked>'.$ligne1->ref_activite ;
	}
	while($ligne2=$db2->DB_object())
	{
		echo '<input type="checkbox" name="activite[]" value="'.$ligne2->ref_activite .'">'.$ligne2->ref_activite ;
	}
	echo'
	 <input type="submit" name="submit">
</form>';
?>