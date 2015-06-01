<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
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
<table>
<form action="ajouter_salle.php?re=1" method="post">
<tr><td>
	Reference:</td><td> <input type="text" name="ref" value="'.$ref .'" required></td></tr>
	<tr><td>
	Nom:</td><td> <input type="text" name="nom" value="'.$nom .'" required></td></tr>
	<tr><td>
	Est elle en maintenance?</td><td> 
	<input type="radio" name="main" value="0">non 
	<input type="radio" name="main" value="1">oui';
	
	echo '</td></tr><tr><td><input type="submit" name="okkkk"></td><td></td></tr>';
	echo '</form><table></td></tr></table>';
}
else {
$db1=new DB_connection();
$req="select ref_salle from salle where ref_salle='".$_POST['ref']."'";
$db1->DB_query($req);
if($db1->DB_object())
{

	$_SESSION['ref']=$_POST['ref'];
	$_SESSION['n']=$_POST['nom'];
	
	header("Location:ajouter_salle.php?r");
}
else
{
$_SESSION['ref']="";
$_SESSION['n']="";
$req="insert into salle (ref_salle,nom_salle,maintenance)Values('".$db1->DB_escape($_POST['ref'])."','".$db1->DB_escape($_POST['nom']) ."','".$_POST['main']."')";
$db1->DB_query($req);
}
}
?>



