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
			<form name="frm" action="traitement.php" method ="post" enctype="multipart/form-data">
			<b>FICHE D\'INSCRIPTION</b>
			<table>
				    <tr>
					 <td>
					 <b>Nom:</b>
					 </td>
					 <td>
					 <input type="text" name="nom" value="'.$_SESSION['nom'] .'" readonly/>
					 </td>

					 <td>
					 <b>Prenom: </b>
					 </td>
					 <td>
					 <input type="text" name="prenom" value="'.$_SESSION['prenom'] .'" readonly/><br><br>
					 </td>
					
					</tr>
					<tr>
					 <td>
					 <b>NumEtudiants: </b>
					 </td>
					 <td>
					 <input type="text" name="numetud" value="'.$_SESSION['numero'] .'" readonly/><br><br>
					 </td>
					</tr>
					<tr>
					 <td>
					  <b>D&eacute;partment/Ecole: </b>
					 </td>
					 <td>
					 <input type="text" name="deptecol" value="'.$_SESSION['e'] .'" readonly/><br><br>
					 </td>
					</tr>
					<tr>
					 <td>
					 <b>Ann&eacute;e d\'&eacute;tudes:</b>
					 </td>
					 <td>
					   <input type="text" name="anne" value="'.$_SESSION['niveau'] .'" readonly/><br><br>
					 </td>
					</tr>
					</table>
					<table>
					<tr>
					 <td>
					  <b>Activit&eacute; principale:</b>
					 </td>
					 <td>
					   <select  name="activPrinc">
					   <option value=""> </option>';
						$db=new DB_connection();
						$req="select * from activite where etat=1 and type_activite='Unite_Libre'";
						$db->DB_query($req);
						while($ligne=$db->DB_object())
						{
							echo '<option value="'.$ligne->ref_activite .'">'. $ligne->nom_activite .'</option>';
	}
					                                   
                    echo'  
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
					<select name="activTransf"> <option value=""> </option>';
						$d1=new DB_connection();
					  	$d1->DB_query($req);
						while($ligne1=$d1->DB_object())
						{
							echo '<option value="'.$ligne1->ref_activite .'">'. $ligne1->nom_activite .'</option>';
						}  
                      echo '                           
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
					 
                     
					</td>
					</tr>
					
					<tr>
					  <td>
					  <b>Si,oui dans quel activit&eacute;s</b>
					  </td>
					  <td>
					  <input type="text" name ="activite"/>
					  </td>
					</tr>
					<tr>
					  <td>
					  <b>Dans quel club?</b>
					  </td>
					  <td>
					  <input type="text" name ="club"/>
					  </td>
					</tr>
					</table>
					<table>
				    <tr>
					 <td>
					<b> T&eacute;l&eacute;charger votre <br> photo d\'identi&eacute;</b>
					 </td>
					 <td>
					 <input type="file" name="imgfile" accept="image/png,image/gif,image/jpeg,image/pjpeg">
					 </td>
					</tr>
					<tr>
					 <td>
					 <b> T&eacute;l&eacute;charger votre <br> quittance;</b>
					 </td>
					 <td>
					 <input type="file" name="imgfile1" accept="image/png,image/gif,image/jpeg,image/pjpeg">
					 </td>
					</tr>
					    </table>
						<table>
			<tr>
			  <td>
			  <input type="checkbox" name="eligibility"/>J\'ai pris connaissance des modalit&eacute;s d\'inscription,des frais y aff&eacute;rentes et de modalit&eacute;s 
d\'&eacute;valuation.</td></tr>
<tr><td>
 <input type="checkbox" name="eligibility1"/>je d&eacute;clare &ecirc;tre en bonne sant&eacute; et ne pr&eacute;sente aucune contre-indication &agrave; la pratiqu&eacute; du sport <br><br>
</tr></td><tr><td>
 <input type="checkbox" name="eligibility3"/>Je sais que le certificalt m&eacute;dical est:
recommand&eacute; pour les cours et activit&eacute;s libres,
obligatoire pour les comp&eacute;titions FFSU(ou copie licence)
			  </td>
			  </tr>
</table>
<table>
			<tr>
					<td>
					<input type=submit value="submit" onclick="return val();" />
					
					</td>
					</tr>
			</table>
			</form>
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