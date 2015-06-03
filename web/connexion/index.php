<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/tete.inc.php');
$db = new DB_connection();
$requete ='SELECT * FROM `actualite` ';
$db->DB_query($requete);


?>


		 
		 
		 <td  id="lowerpage-column-content">
		 <div id="empty"><br><br></div>
			<table id="column-content-table">
			 <tr>
			    <td>
				  <?php   if(isset($_SESSION['error'])===true){ echo '<p style="color:#FA0831;">mot de passe ou identifiant non valid!!</p>';}?>
				  <form action="connexion_verif.php" method="post">
				  <b>Identifiant</b><br>
				  <input type="text" name="identifiant"><br><br><br>
				   <b>Mot de Passe</b><br>
				  <input type="password" name="password"><br><br>
				  <a href="">mot de passe perdu?</a><br><br>
				  
				  <input type="submit" value="login">
				  </form>
				  <p style="color:#185dc6;">
				</td>
			 </tr>
			</table>
		 </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once('../../inc/footer.inc.php');
?>