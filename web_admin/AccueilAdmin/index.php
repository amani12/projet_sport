<?php
require_once('../../inc/teteadmin.inc.php');
if(!$_SESSION['isLoggedAdmin']) {
  header("location:http://localhost/projet_sport/web_admin/connexion_admin/"); 
  die(); 
}
?>
				<td>
					<div id="contents">
					<p style="color:#185dc6;font-size:30px;" align="center">Bienvenue dans la page Accueil de Site des UE libre Sport</p>
					<img src="../../img/gymnase.jpg" alt="Gymnase Universitaire" style="width:700px;height:200px;">
					</div>
				</td>
			</tr>
	   </table>
<?php
require_once('../../inc/footeradmin.inc.php');
?>	   
	   
	