<?php
require_once('../../inc/header.inc.php');
require_once('../../inc/tete.inc.php');
?>
<td  id="lowerpage-column-content">
Projet pedagogique de 
<br>
<table>
<?php
	while($ligne=$db->DB_object())
	{
		echo '<tr> <td ><a id="fancy" value="" href="description_activite.php?ref='.$ligne->ref_activite .'">'.$ligne->nom_activite .'</a></td></tr>';
		}
		?>
</table>
 </td>
      </tr>
    </tbody>
  </table>
</div>

<?php
require_once('../../inc/footer.inc.php');
?>