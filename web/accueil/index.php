<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/tete.inc.php');

$db = new DB_connection();
$requete ='SELECT * FROM `actualite` ';
$db->DB_query($requete);

?>


		 
		 
		 <td  id="lowerpage-column-content">
			<table id="column-content-table">
			 <tr>
			    <td>
				<img src="../../img/anniv.jpg" alt="40ans anniversaire" style="width:304px;height:228px">
				</td>
				<td>
				  <h2>Actualit&eacute;s</h2>
				  <?php
				    $p=0;
				    while($p<3 && $res=$db->DB_object())
					{ 
				       echo '<p>';
					   echo '<b>';
					   echo  $res->titre;
					   echo '</b><br>';
					   
                       echo	$res->description_act;				   
					   echo '</p>';
					   $p++;
					}
					  
					?>
					  					  
				</td>
			 </tr>
			</table>
		 </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once('../../inc/footer.inc.php');
?>