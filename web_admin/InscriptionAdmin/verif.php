<?php
require_once('../../inc/header.inc.php');
session_start();
  
  $nc = new DB_connection();
      if(!empty($_POST['ident'])&& !empty($_POST['mdp'])){
   	      $ident=$_POST['ident'];
		  $pass=md5($_POST['mdp']);
		  $requete="SELECT * FROM `appartenir` WHERE `email_uha`='".$ident."'";
          $nc->DB_query($requete);
		  
		    if($res=$nc->DB_object()){
			   if($res->email_uha==$ident && $res->pass_uha==$pass){
                  if($res->code_statue==1 || $res->code_statue==2){ 					
         			  $_SESSION["ident"] = $ident;
                      $_SESSION["pass"] = $mdp;
					  $_SESSION["numero"] = $res->numero_personne;
					  $_SESSION['isLoggedAdmin']=true;
					  $_SESSION['statue']=$res->code_statue;
					    $req="select * from personnes where numero_personne='".$res->numero_personne ."'";
						$db1 = new DB_connection();
						$db1->DB_query($req);
						$ligne=$db1->DB_object();
					  $_SESSION['nom']=$ligne->nom;
					  $_SESSION['prenom']=$ligne->prenom;
					  $_SESSION['niveau']=$ligne->ref_niveau;
					  $_SESSION['frais']=$res->frais_sport;
                        header("Location:../../web_admin/AccueilAdmin/");  
				    }else{
					      $_SESSION['isLoggedAdmin']=false;
					      echo "Vous n'avez par les droits necessaires pour acceder a cette Page!!";  
						 }
			    }else{
					  $_SESSION['isLoggedAdmin']=false;
					  echo "mot de passe ou identifiant incorrect!!";  
				    }
			}else{
				  $_SESSION['isLoggedAdmin']=false;
				  echo "mot de passe ou identifiant incorrect!!";  
				}
	    }
?>
