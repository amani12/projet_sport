<?php
require_once('../../inc/header.inc.php');
session_start();
echo md5('amani');
$db = new DB_connection();
          if(!empty($_POST['identifiant'])&& !empty($_POST['password']))
               {
   				$identifiant=$_POST['identifiant'];
			    $password=md5($_POST['password']);
				$requete="SELECT * FROM `appartenir` WHERE `email_uha`='".$identifiant."'";
                $db->DB_query($requete);
				if($res=$db->DB_object())
				{
				if($res->email_uha==$identifiant && $res->pass_uha==$password)
				  {   $_SESSION["identifiant"] = $identifiant;
                      $_SESSION["password"] = $password;
					  $_SESSION["numero"] = $res->numero_personne;
					  $_SESSION["e"]=$res->ref_campus;
					  $_SESSION['isLogged']=true;
						$req="select * from personnes where numero_personne='".$res->numero_personne ."'";
						$db1 = new DB_connection();
						$db1->DB_query($req);
						$ligne=$db1->DB_object();
						
						$_SESSION['nom']=$ligne->nom;
						$_SESSION['prenom']=$ligne->prenom;
						$_SESSION['niveau']=$ligne->ref_niveau;
						$_SESSION['frais']=$res->frais_sport;
						$_SESSION['error']=false;

						
						
					  header("Location:../../web/accueil/");  
				  }else
				   {
					$_SESSION['isLogged']=false;
					$_SESSION['error']=true;
					header("location:http://localhost/projet_sport/web/connexion/");
                				
				   }
			   }
			   else
			   {
					$_SESSION['isLogged']=false;
					$_SESSION['error']=true; 
					header("location:http://localhost/projet_sport/web/connexion/");
                      					
			   }
			   }
?>
