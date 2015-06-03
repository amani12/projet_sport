<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
if(!$_SESSION['isLoggedAdmin']) {
  header("location:http://localhost/projet_sport/web_admin/connexion_admin/"); 
  die(); 
}
$date=date("d/m/Y");;
$db=new DB_connection();
$req="select * from reserve where ref_activite='".$_GET['ref']."' and date_journee >= ".$date;
$db->DB_query($req);
?>

<?php

echo'	<td>
<div id="content"> 
			<table>
				<tr>';
					if($res=$db->DB_object())
					{
						$db1=new DB_connection();
						$req1="select * from horaire where id='".$res->id ."' ";
						$db1->DB_query($req1);
						$res1=$db1->DB_object();
						echo'
							<td>Date seance</td><td>heure</td><td>decaler</td><td>Annuler</td></tr>';
						echo '<tr><td>'.$res->date_journee .'</td><td>'.$res1->heure_start.'</td><td><a href="decaler_seance.php?ref='.$res->ref_activite .'&id='.$res->id .'">decaler</a></td><td><a href="annuler_seance.php?ref='.$res->ref_activite .'&id='.$res->id .'">Annuler</a></td></tr>';
					
					while($res=$db->DB_object())
					{
						
						$req1="select * from horaire where id='".$res->id ."' ";
						$db1->DB_query($req1);
						$res1=$db1->DB_object();
						echo '<td>'.$res->date_journee .'</td><td>'.$res1->heure_start.'</td><td><a href="decaler_seance.php?ref='.$res->ref_activite .'&id='.$res->id .'">decaler</a></td><td><a href="annuler_seance.php?ref='.$res->ref_activite .'&id='.$res->id .'">Annuler</a></td></tr>';
					}
					}
					else
					{
						echo 'aucune seance associe a cette activite';
					}
	echo '			</table>
	<table>
	<tr><td><a href="ajouter_seance.php?ref='.$_GET['ref'] .'"> ajouter une seance</a></td></tr></table>
	</div>
	</td>
			</tr>
	   </table>';?>
<?php
require_once('../../inc/footeradmin.inc.php');
?>	   