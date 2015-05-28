<?php
session_start();
if(!$_SESSION['isLogged']) {
  header("location:http://localhost/projet_sport/web/connexion/"); 
  die(); 
}
require_once('../../inc/header.inc.php');
require_once('../../inc/tete.inc.php');
?>
<?php
if(true) {
echo ' 
 <td  id="lowerpage-column-content">
			<table>
			<b>FICHE D\'INSCRIPTION</b>
			  <tr>
			      <td>
				  <form action="inscri2.php" method="POST">
				  <table>
				    <tr>
					 <td>
					 <b>Nom:</b>
					 </td>
					 <td>
					 <input type="text" name="nom"/>
					 </td>
					
					</tr>
					<tr>
					 <td>
					 <b>Prenom: </b>
					 </td>
					 <td>
					 <input type="text" name="prenom"/><br><br>
					 </td>
					
					</tr>
					<tr>
					 <td>
					 <b>NumEtudiants: </b>
					 </td>
					 <td>
					 <input type="text" name="numetud"/><br><br>
					 </td>
					</tr>
					<tr>
					 <td>
					 <b>Domaine : </b>
					 </td>
					 <td>
					 <input type="text" name="domaine"/><br><br>
					 </td>
					</tr>
					<tr>
					 <td>
					  <b>D&eacute;partment/Ecole: </b>
					 </td>
					 <td>
					 <input type="text" name="deptecol"/><br><br>
					 </td>
					</tr>
					<tr>
					 <td>
					 <b>Ann&eacute;e d\'&eacute;tudes:</b>
					 </td>
					 <td>
					   <select name="an">
					                                   <option value="l1">1</option>
													   <option value="l2">2</option>
                                                       <option value="l3">3</option>
													   <option value="m1">4</option>
													   <option value="m2">5</option>
                       </select><br><br>
					 </td>
					</tr>
					<tr>
					 <td>
					  <b>T&eacute;l&eacute;phone: </b>
					 </td>
					 <td>
					  <input type="tel" name="tel"/><br><br>
					 </td>
					</tr>
					<tr>
					 <td>
					  <b>Activit&eacute; principale:</b>
					 </td>
					 <td>
					                               <select  name="activPrinc">
					                                   <option value="Badminton">Badminton</option>
                                                       <option value="Natation">Natation</option>
                                                       <option value="Volley-ball">Volley-ball</option>
                                                       <option value="PingPong">PingPong</option>
                                                   </select>
												   <br><br>
					 </td>
					 <td>
					 <input type="checkbox" name="note" value="note">not&eacute;e<br>
					 </td>
					</tr>
					<tr>
					 <td>
					 <b>Activit&eacute; de transfert:</b>
					 </td>
					 <td>
					                               <select name="activTransf">
					                                  <option value="Badminton">Badminton</option>
                                                       <option value="Natation">Natation</option>
                                                       <option value="Volley-ball">Volley-ball</option>
                                                       <option value="PingPong">PingPong</option>
                                                    </select>
													<br><br>
					 </td>
					 <td>
					 <input type="checkbox" name="note1" value="note1">not&eacute;e<br>
					 </td>
					</tr>
					<tr>
					<td>
					<b>Est ce que vous &ecirc;tes licenci&eacute; dans un club?
					</td>
					<td>
					 <input type="checkbox" name="appartClub" value=1>Oui<br>
                     
					</td>
					</tr>
					<tr>
					<td>
					<br>
					<input type=submit value="suivant"/>
					</td>
					</tr>
				  </table>    
                  </form>				  
			      </td>
			  </tr>
			</table>
		 </td>
      </tr>
    </tbody>
  </table>
</div> ';
}else{
	echo '<b> veuillez payez les frais de sport </b>';
}
?>

<?php
require_once('../../inc/footer.inc.php');
?>