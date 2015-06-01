<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/teteadmin.inc.php');
if(!$_SESSION['isLoggedAdmin']) {
  header("location:http://localhost/projet_sport/web_admin/connexion_admin/"); 
  die(); 
}
$db=new DB_connection();
$req="select * from activite where numero_personne='".$_SESSION['numero']."' and etat=1";
$db->DB_query($req);
?>
<<<<<<< HEAD
	
<?php
echo'	<td>
<div id="content"> 
			<table>
				<tr>
					<td>Nom_activite</td><td>Modifier les horaires</td><td>Presence</td></tr>';
					while($res=$db->DB_object())
					{
						echo '<td>'.$res->nom_activite .'</td><td><a href="modifier_seance/?ref='.$res->ref_activite .'">Modifier les horaires</a></td><td>Presence</td></tr>';
					}
	echo '			</table>
	</div>
	</td>
=======
				<td>
					<div id="contents">
						   <div id="choix">
						   <table>
						     <tr>
						           <td>
								   <b>Activite:</b>
								   </td>
								   <td>
										  <select>
												   <option value="Badminton">Badminton</option>
												   <option value="Natation">Natation</option>
												   <option value="Volley-ball">Volley-ball</option>
												   <option value="Musculation">Musculation</option>
											</select>
								    </td>
									<td style="width:100px">
									</td>
									
								   <td>
								   <b>Date:</b>
								   </td>
								   <td>
										   <select>
												   <option value="datekey1">22/02/2016</option>
												   <option value="datekey2">28/02/2016</option>
												   <option value="datekey3">06/03/2016</option>
												   <option value="datekey3">13/03/2016</option>
											</select>
								    </td>			
							   </tr>				
						    </table>
                            </div>	
                             <div  id="infos_seance">
							    <table border=1>
								   <tr>
								     <th>
									 Séance
									 </th>
									 <th>
									 Date
									 </th>
									 <th>
									 Modifier
									 </th>
									 <th>
									 Annuler
									 </th>
									 <th>
									 Presence
									 </th>
								   </tr>
								    <tr>
								     <td>
									 Séance
									 </td>
									 <td>
									 Date
									 </td>
									 <td>
									 Modifier
									 </td>
									 <td>
									 Annuler
									 </td>
									 <td>
									 Presence
									 </td>
								   </tr>
								</table>
                             </div>
							 <div>
							 
							    <form action="">
                                     <input type="submit" value="Ajouter une seance">
                                 </form>
							 </div>
                             							 
						  
						
					</div>
				</td>
>>>>>>> origin/master
			</tr>
	   </table>';?>
<?php
require_once('../../inc/footeradmin.inc.php');
?>	   
	   