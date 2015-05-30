<?php
if(!$_SESSION['isLoggedAdmin'])
{
	header("Location:../");
}
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
?>
<?php

	$db=new DB_connection();
	$req="select * from appartenir where code_statue=1";
	$db->DB_query($req);
	session_start();
	
?>
<?php if(!isset($_GET['re']))
{
if(isset($_GET['r']))
{
	echo "<SCRIPT language='Javascript'>";


	echo "alert('Veuillez Changer la Référence!');";


	echo "</SCRIPT>	";
	}
$ref=$nom="";

if(isset($_SESSION['ref'])){ $ref=$_SESSION['ref'];}
if(isset($_SESSION['n'])){ $nom= $_SESSION['n'];}
echo '
<td>
<table width="200">
<form action="ajouter_activite.php?re=1" method="post">

<tr>
	<td>
Reference: 
	</td>
	<td>
	<input type="text" name="ref" value="'.$ref .'" required
	</td>
</tr>
<tr>
	<td>
	Nom:
	</td>
	<td>
	<input type="text" name="nom" value="'.$nom .'" required>
	</td>
</tr>
<tr>
	<td>
	Description:
	</td>
	<td>
	</td>
<tr>
	<td colspan="2">
	<textarea name="desc" rows="3" cols="50">';
	if(isset($_SESSION['desc'])){ echo $_SESSION['desc'];} 
	echo '</textarea>
	</td>
</tr>
<tr>
<td>
	Date de premier cours: 
</td><td><input type="text" name="date1"></td>
</tr>
<tr>
<td>
	Activite: </td><td><select name="type">
				<option value="Unite_Libre">UE libre</option>
				<option value="Journee_sports">Journee Sportif</option>
			 </select></td>
			 </tr>
<tr>
<td>
	
	Nombre heure: </td><td><input type="number" name="nbh"></td>
	</tr>
<tr>
<td>
	Capacite max:</td><td> <input type="number" name="cap"></td>
	</tr>
<tr>
<td>
	Responsable: <select name="responsable">';
	while($ligne=$db->DB_object())
	{
		echo '<option value="'.$ligne->numero_personne .'">'. $ligne->numero_personne .'</option>';
	}
	echo'</td> </tr>
<tr>
<td colspan="2"><input type="submit" name="okkkk"></td></tr>';
	 echo '</form>
	 </table>
	 </td>
			</tr>
	   </table>';
}
else {

$db1=new DB_connection();
$req="select ref_activite from activite where ref_activite='".$_POST['ref']."'";
$db1->DB_query($req);
if($db1->DB_object())
{

	$_SESSION['ref']=$_POST['ref'];
	$_SESSION['n']=$_POST['nom'];
	$_SESSION['desc']=$_POST['desc'];
	
	header("Location:ajouter_activite.php?r");
}
else
{
$_SESSION['ref']="";
$_SESSION['n']="";
$_SESSION['desc']="";
$req="insert into activite (ref_activite,nom_activite,description_activite,date_premier_cours,type_activite,nbre_fixe_heure,capacite_max,etat)Values('".$db1->DB_escape($_POST['ref'])."','".$db1->DB_escape($_POST['nom']) ."','".$db1->DB_escape($_POST['desc']) ."','".$_POST['date1'] ."','".$_POST['type'] ."','".$_POST['nbh'] ."', '".$_POST['cap'] ."','1')";
$db1->DB_query($req);
header("Refresh:0;url=index.php");
}
}
?>



