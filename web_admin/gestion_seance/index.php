<?php
session_start();
require_once('../../inc/header.inc.php');
if(!$_SESSION['isLoggedAdmin']) {
  header("location:http://localhost/projet_sport/web_admin/connexion_admin/"); 
  die(); 
}
require_once('../../inc/teteadmin.inc.php');
$db=new DB_connection();
$req="select * from activite where numero_personne='".$_SESSION['numero']."' and etat=1";
$db->DB_query($req);
?>
	
<?php
echo'	<td>
<div id="content"> 
			<table>
				<tr>
					<td>Nom_activite</td><td>Modifier les horaires</td><td>Presence</td></tr>';
					while($res=$db->DB_object())
					{
						echo '<td>'.$res->nom_activite .'</td><td><a href="modifier_seance/?ref='.$res->ref_activite .'">Modifier les horaires</a></td><td>Presence</td></tr>';
					}
	echo '			</table>
	</div>
	</td>
			</tr>
	   </table>';?>
<?php
require_once('../../inc/footeradmin.inc.php');
?>	   
	   