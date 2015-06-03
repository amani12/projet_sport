<?php
session_start();
if(isset($_SESSION['isLogged'])===false) {
  header("location:http://localhost/projet_sport/web/connexion/"); 
  die(); 
}
require_once('../../inc/header.inc.php');
require_once('../../inc/tete.inc.php');


$q1 = new DB_connection();
 $query_identite="SELECT * FROM `appartenir` WHERE `numero_personne`='".$_SESSION['numero']."'";
 $q1->DB_query($query_identite);
 $res1=$q1->DB_object();
  
$q2 = new DB_connection();
$query_club="SELECT * FROM `club` WHERE `id_club` in (SELECT `id_club` from licencier WHERE `numero_personne`='".$_SESSION['numero']."')";
$q2->DB_query($query_club);
$res2=$q2->DB_object();

$q3 = new DB_connection();
$query_niveau="SELECT * FROM `niveau` WHERE `ref_niveau`='".$_SESSION['niveau']."'";
$q3->DB_query($query_niveau);
$res3=$q3->DB_object();

$q4 = new DB_connection();
$query_activite="SELECT * FROM `s_inscrire` WHERE `numero_personne`='".$_SESSION['numero']."'";
$q4->DB_query($query_activite);

$prin=$tran="";
while($res4=$q4->DB_object()){
	$q5 = new DB_connection();
	$query_activite_principale="SELECT `nom_activite` FROM  `activite` WHERE `ref_activite`='".$res4->ref_activite."'";
	$q5->DB_query($query_activite_principale);
	$res5=$q5->DB_object();	
	if($res4->principale==1){
		$prin=$res5->nom_activite;
}else{
	$tran=$res5->nom_activite;
}
}

$q6 = new DB_connection();
$query_activite_infos="SELECT * FROM `activite` WHERE `type_activite`='Journee_sports' AND `ref_activite` in(SELECT `ref_activite` FROM pratiquer WHERE `numero_personne`='".$_SESSION['numero']."')";
$q6->DB_query($query_activite_infos);
$res6=$q6->DB_object();	
?>
<td  id="lowerpage-column-content" style="width:70%">
<br><br>
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
	     
	   echo '<b>'.$_SESSION['nom'].'</b>';
	   ?>
     </td>
	 <td>
	   <?php 
	    echo '<b>'.$_SESSION['prenom'].'</b>';
	   ?>
     </td>
	 <td>
		<b><?php 
	   echo '<b>'.$_SESSION['niveau'].'</b>';
	      ?>
	   </b>   
     </td>
	 <td>
	     <b><?php 
	   echo '<b>'.$prin .'</b>';
	      ?>
	   </b> 
     </td>
	 <td>
	   <b><?php 
	   echo '<b>'.$tran .'</b>';
	      ?>
	   </b> 
     </td>
   </tr>
 </table>
 <table id="photo_et_etat" style='width:700px' >
    <tr>
	    <td style='width:150px'>
		<img src="<?php  echo $res1->photo_identite;?>" alt="Smiley face" width="80" height="80">
		</td>
         <td>
		<img src="<?php  echo $res1->photo_certificat;?>" alt="Smiley face" width="200" height="80">
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
 <b>Nombre d'heures exig&eacute;e: </b> <?php $res3->nombre_heure_sport; ?>
 </td>
 </tr>
 <tr>
 <td>
 <?php
 if($res2=$q2->DB_object()){
     echo "<b>Nom du Club: </b>".$res2->club."<b>Activit&eacute; dans un Club:</b>".$res2->activite_club."";
    }else{
		echo "L'&eacute;tudiant n'est pas inscrit dans un club";
	}
 ?>
 </td>
 </tr>
 
  <tr>
  <td>
  <br>
 <b>Les autres activit&eacute;s assister: </b> <br>
    <?php
	$i=0;
	if($res6=$q6->DB_object()){
	while($res6=$q6->DB_object()){
		$i++;
		echo $i." ".$res->nom_activite."<br>";
	}
	}else{
		echo "Aucun activit&eacute; trouv&eacute;";
	}
	?>
 </td>
 </tr>
 </table>
 <table id="prof_commentaire">
 <td>
 </td>
 </table>
  <table id="telechargement_des_pieces">
     <tr>
	    <td>
		    Pour t&eacute;l&eacute;charges les certificats et informations utilisez:
		</td>
	 </tr>
	 <form action="traitement_des_telechargement.php" method="post" enctype="multipart/form-data">
	  <tr>
	    <td>
		    <input type="file" name="doc_tele"/>
		</td>
	 </tr>
	  <tr>
	    <td>
		     <br>
		    <input type="submit" value="valider" name="doc_tele"/>
		</td>
	 </tr>
	 </form>
 </table>
 </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once('../../inc/footer.inc.php');
?>