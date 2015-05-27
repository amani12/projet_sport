<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/tete.inc.php');
session_start();
$_SESSION['nom'] = $_POST['nom'];
$_SESSION['prenom'] = $_POST['prenom'];
$_SESSION['numetud'] = $_POST['numetud'];
$_SESSION['domaine'] = $_POST['domaine'];
$_SESSION['deptecol'] = $_POST['deptecol'];
$_SESSION['an'] = $_POST['an'];
$_SESSION['activPrinc'] = $_POST['activPrinc'];
$_SESSION['activTransf'] = $_POST['activTransf'];
$_SESSION['tel'] = $_POST['tel'];
$_SESSION['appartClub'] = $_POST['appartClub'];

 
?>

<td  id="lowerpage-column-content">
			<table>
			<b>FICHE D'INSCRIPTION</b>
			  <tr>
			      <td>
				  <form name="frm" action="traitement.php" method ="post" enctype="multipart/form-data">
				  <table>
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
				    <tr>
					 <td>
					<b> T&eacute;l&eacute;charger votre <br> photo d'identi&eacute;</b>
					 </td>
					 <td>
					 <input type="file" name="imgfile">
					 </td>
					</tr>
					<tr>
					 <td>
					 <b> T&eacute;l&eacute;charger votre <br> quittance;</b>
					 </td>
					 <td>
					 <input type="file" name="imgfile1">
					 </td>
					</tr>
				  </table> 
                   				  
			      </td>
			  </tr>
			  <tr>
			  <td>
			  <input type="checkbox" name="eligibility"/>J'ai pris connaissance des modalit&eacute;s d'inscription,des frais y aff&eacute;rentes et de modalit&eacute;s 
d'&eacute;valuation.<br><br>

 <input type="checkbox" name="eligibility1"/>je d&eacute;clare &ecirc;tre en bonne sant&eacute; et ne pr&eacute;sente aucune contre-indication &agrave; la pratiqu&eacute; du sport <br><br>

 <input type="checkbox" name="eligibility3"/>Je sais que le certificalt m&eacute;dical est:
recommand&eacute; pour les cours et activit&eacute;s libres,
obligatoire pour les comp&eacute;titions FFSU(ou copie licence)
			  </td>
			  </tr>
			  <tr>
			     
			    <td>
				<br>
				 <br>
				 <script type="text/javascript">
                                  function val(){

                                           if(frm.eligibility.checked == false || frm.eligibility1.checked == false || frm.eligibility3.checked == false)
                                              {
	                                           alert('pourriez-vous agreer les termes de services!');
	                                           return false;
                                               }
                                               return true;
                                             }
</script>
			     <input type=submit value="submit" onclick="return val();"/>
			  </td>
			  </tr>
			</table>
			</form>
		 </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once('../../inc/footer.inc.php');
?>