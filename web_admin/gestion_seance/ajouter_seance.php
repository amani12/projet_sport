<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
if(!$_SESSION['isLoggedAdmin']) {
  header("location:http://localhost/projet_sport/web_admin/connexion_admin/"); 
  die(); 
}
$db=new DB_connection();
$req="select * from salle where maintenance=1";
$db->DB_query($req);
?>

<?php if(!isset($_GET['re']))
{
if(isset($_GET['r']))
{
	echo "<SCRIPT language='Javascript'>";


	echo "alert('Veuillez Changer la date ou le creneau!');";


	echo "</SCRIPT>	";
	}
$ref=$nom="";

echo '
<td>
<table width="200">
<form action="ajouter_activite.php?re=1" method="post">

<tr>
	<td>
Date:</td><td> <input type="date" name="date">
</td></tr>
<tr><td>
heure de start:</td><td> <input type="time" name="time">
</td></tr>
<tr><td>
Duree:</td><td> <input type="number" name="duree">
</td></tr>';
}?>
 