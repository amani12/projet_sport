<?php
session_start();
if(!$_SESSION['isLogged']) {
  header("location:http://localhost/projet_sport/web/connexion/"); 
  die(); 
}
require_once('../../inc/header.inc.php');
require_once('../../inc/tete.inc.php');
$query_identite="SELECT `nom`,`prenom` FROM `personnes` WHERE `email_perso`='".$_SESSION['identifiant']."'";
$qi = new DB_connection();
$qi->DB_query($query_identite);
$res1=$qi->DB_object();

?>
<td  id="lowerpage-column-content">
<table id="titre_proj_peda">
   <tr>
      <td>
         <p><b>PROJET PEDAGOGIQUE SPORT DE L'ETUDIANT</b></p>
      </td>
   </tr>
</table>
<table  id= "info_general_etudiant">
   <tr>
     <td>
	   <?php 
	   echo '<b>'.$res1->nom.'</b>';
	   ?>
     </td>
	 <td>
	   <?php 
	   echo '<b>'.$res1->prenom.'</b>';
	   ?>
     </td>
	 <td>
		<b>Master 1 Info</b>   
     </td>
	 <td>
	     <b>Natation</b>
     </td>
	 <td>
	   <b>Musculation</b>
     </td>
   </tr>
 </table>
 <table id="photo_et_etat" style='width:700px' >
    <tr>
	    <td style='width:150px'>
		<img src="../../img/uploads/photo.jpg" alt="Smiley face" width="80" height="80">
		</td>
        <td>
		<b>Etat :</b> <button type="button" id="etat" ></button>
		</td>
    </tr>
 </table >
 <table id="presence_etudiant" style ='width:400px' border='1'>
  <tr>
        <th style='width: 20%;'>Mois</th>
        <th style='width: 80%;'>Les date des s&eacute;ances</th>
  </tr>
  <tr>
  <td>
  Septembre
  </td>
  <td>
     2    7           14             21
  </td>
  </tr>
  <tr>
  <td>
  Octobre
  </td>
  <td>
     1              6            15            22
  </td>
  </tr>
  <tr>
  <td>
  Novembre
  </td>
  <td>
     2    7           14             21
  </td>
  </tr>
  <tr>
  <td>
  Decembre
  </td>
  <td>
     1              6            15            22
  </td>
  </tr>
  <tr>
  <td>
  Janvier
  </td>
  <td>
     2    7           14             21
  </td>
  </tr>
  <tr>
  <td>
  Fevrier
  </td>
  <td>
     1              6            15            22
  </td>
  </tr>
  <tr>
  <td>
  Mars
  </td>
  <td>
     2    7           14             21
  </td>
  </tr>
  <tr>
  <td>
  Avril
  </td>
  <td>
     1              6            15            22
  </td>
  </tr>
  <tr>
  <td>
  Mai
  </td>
  <td>
     2    7           14             21
  </td>
  </tr>
  <tr>
  <td>
  Juin
  </td>
  <td>
     1              6            15            22
  </td>
  </tr>
  
  <tr>
  </tr>	
 </table>
 <br>
 <table id="heures_pratiques">
 <tr>
 <td>
 <b>Nombre d'heures exig&eacute;e: </b> 50
 </td>
 </tr>
 <tr>
 <td>
 <b>Nom du Club: </b> FC Mulhouse  <b>Activit&eacute; dans un Club:</b>Football
 </td>
 </tr>
 
  <tr>
  <td>
  <br>
 <b>Les autres activit&eacute;s assister: </b> <br>
     1.Decathlon.<br>
	 2.FFSU
 </td>
 </tr>
 </table>
 <table id="prof_commentaire">
 <td>
 </td>
 </table>
  <table id="telechargement_des_pieces">
 </table>
 </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once('../../inc/footer.inc.php');
?>