<?php
require_once('../../inc/header.inc.php');
session_start();
$db = new DB_connection();
          if(!empty($_POST['identifiant'])&& !empty($_POST['password']))
               {
   				$identifiant=$_POST['identifiant'];
			    $password=md5($_POST['password']);
				$requete="SELECT `email_uha`,`pass_uha` FROM `appartenir` WHERE `email_uha`='".$identifiant."' AND `pass_uha`='".$password."'";
                $db->DB_query($requete);
				$res=$db->DB_object();
				if($res->email_uha==$identifiant && $res->pass_uha==$password)
				  {   $_SESSION["identifiant"] = $identifiant;
                      $_SESSION["password"] = $password;
					  $_SESSION['isLogged']=true;
					  header("Location:../../web/accueil/");  
				  }else
				   {
					$_SESSION['isLogged']=false;
					echo "mot de passe ou identifiant incorrect!!";  
				   }
			   }
?>
