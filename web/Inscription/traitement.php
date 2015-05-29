<?php
require_once('../../inc/header.inc.php');
?>
<?php
session_start();
$db=new DB_connection();
if($_POST['activPrinc']!=null)
{
	
	$req="insert into s_inscrire (ref_activite, numero_personne,principale,notee_ou_pas,note,etat_inscription) Values('". $_POST['activPrinc'] ."','".$_SESSION['numero'] ."',1,";
	if(isset($_POST['note'])!="note")
	{
		$req.="1,null,1)";
	}
	else
	{
		$req.="0,null)";
	}
	$db->DB_query($req);
	
	if($_POST['activTransf']!=null and $_POST['activPrinc']!=$_POST['activTransf'] )
	{
	$req="insert into s_inscrire (ref_activite, numero_personne,principale,notee_ou_pas,note,etat_inscription) Values('". $_POST['activTransf'] ."','".$_SESSION['numero'] ."',0,";
	if(isset($_POST['note1'])!=null)
	{
		$req.="1,null,1)";
	}
	else
	{
		$req.="0,null)";
	}
	$db->DB_query($req);
	}
	if($_POST['activite']!=null and $_POST['club']!=null )
	{
		$req="insert into club (nom_club,activite) Values('". $_POST['club'] ."','".$_POST['activite']."')";
		$db->DB_query($req);
		$id=$db->DB_id();
		$req="insert into licencier (id_club,numero_personne) Values('". $id ."','".$_SESSION['numero']."')";
		$db->DB_query($req);
	}
	if(!empty($_FILES['imgfile']['tmp_name']))
	   {
			move_uploaded_file ($_FILES['imgfile']['tmp_name'], 
       "../../img/uploads/{$_FILES['imgfile'] ['name']}");
	   $req="update appartenir set photo_identite='".$db->DB_escape('../../img/uploads/'.$_FILES['imgfile'] ['name'])."' where numero_personne='" . $_SESSION['numero']."'";
	   $db->DB_query($req);
			}
			if(!empty($_FILES['imgfile1']['tmp_name']))
	   {
			move_uploaded_file ($_FILES['imgfile1']['tmp_name'], 
       "../../img/uploads/{$_FILES['imgfile1'] ['name']}");
	   $req="update appartenir set photo_cerificat='".$db->DB_escape('../../img/uploads/'.$_FILES['imgfile1'] ['name'])."' where numero_personne='" . $_SESSION['numero']."'";
	   $db->DB_query($req);
			}
			header("Location:../../web/accueil/");  
}


else{
echo 'votre inscription n\'est pas prise en compte';
}	

echo $_FILES['imgfile']['name'];



?>