<?php
require_once('../../../inc/header.inc.php');
require_once('../../../inc/teteadmin.inc.php');
$db=new DB_connection();
$req="select * from horaire where id = ".$_GET['id'];
$db->DB_query($req);
?>

<?php

echo'	<td>
<div id="content"> 
			<table>
				<tr>
					<td>Date seance</td><td>heure</td><td>decaler</td><td>Annuler</td></tr>';
					while($res=$db->DB_object())
					{
						$db1=new DB_connection();
						$req1="select * from horaire where id='".$res->id ."' ";
						$db1->DB_query($req1);
						$res1==$db1->DB_object()
						echo '<td>'.$res->date_journee .'</td><td>'.$res1->heure_start.'</td><td><a href="decaler_seance.php?ref='.$res->ref_activite .'&id='.$res->id .'">decaler</a></td><td><a href="annuler_seance.php?ref='.$res->ref_activite .'&id='.$res->id .'">Annuler</a></td></tr>';
					}
	echo '			</table>
	</div>
	</td>
			</tr>
	   </table>';?>
<?php
require_once('../../inc/footeradmin.inc.php');
?>	   