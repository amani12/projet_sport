<html>
  <head>
  <link rel="stylesheet" href="../../css/admin.css">
      <title>
	  AdminPage
	  </title>
	  <div id="admin_header">
		<b><p style="color:#185dc6;font-size:20px" align="center">PAGE DE L'ADMINSTRATEUR </p></b>
	  </div>
	   <div id="emptyspace">
	  <div id="info_utilisateur_ad"><?php  session_start(); if( isset($_SESSION['isLoggedAdmin'])===true){ echo "Bienvenue ".$_SESSION["nom"]." ".$_SESSION['prenom'];}?></div><div id="deconnexion_ad"><a href="../../web_admin/connexion_admin/deconn.php">deconnexion</a></div><div id="connexion_ad"><a href="../../web_admin/connexion_admin">connexion</a></div>
	  </div>
  </head>
  
  <body>
	<div id="admin_lowerpage">
	   <table>
	        <tr>
			    <td id="haha">
					<div id="navigation">
					   <table>
					       <tr>
						     <td>
							    <a href="../AccueilAdmin/"  title="">Accueil</a>
							 </td>
						   </tr>
						   <tr>
						     <td>
							    <a href="../gestion_activite/"  title="">Gestion des Activites</a>
							 </td>
						   </tr>
						   <tr>
						     <td>
							    <a href="../gestion_actualite/"  title="">Gestion des Actualites</a>
							 </td>
						   </tr>
						   <tr>
						     <td>
							    <a href="../gestion_inscription/"  title="">Gestion des Inscription</a>
							 </td>
						   </tr>
						   <tr>
						     <td>
							    <a href="../gestion_salle/"  title="">Gestion des salle</a>
							 </td>
						   </tr>
						   <tr>
						     <td>
							    <a href="../gestion_seance/"  title="">Gestion des seances</a>
							 </td>
						   </tr>
					   </table>
					</div>
				</td>
				