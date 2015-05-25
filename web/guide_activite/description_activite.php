<?php 
require_once('../../inc/header.inc.php');

if($_GET['ref']!=NULL)
{
	$db = new DB_connection();
	$req="select * from activite where ref_activite='".$_GET['ref']."'";
	$db->DB_query($req);
	$ligne=$db->DB_object($req);
	if($ligne->nom_activite)
	{
		echo 'Nom:'. $ligne->nom_activite;
	}
	if($ligne->description_activite !=NULL)
	{
		echo '<br> Description:'.  $ligne->description_activite;
	}
	if($ligne->date_premier_cours !=NULL)
	{
		echo '<br> Date de premier cours:'.  $ligne->date_premier_cours;
	}
	if($ligne->nbre_fixe_heure !=NULL)
	{
		echo '<br> Nombre d'."'".'heure:'.  $ligne->nbre_fixe_heure;
	}
	if($ligne->capacite_max !=NULL)
	{
		echo '<br> Capacite Max:'.  $ligne->capacite_max;
	}
	if($ligne->numero_personne !=NULL)
	{
		echo '<br> Responable:' ;
		$req1="select nom,prenom from personnes where numero_personne='".$ligne->numero_personne."'";
		$db->DB_query($req1);
		$ligne1=$db->DB_object($req1);
		$c=strtoupper(substr($ligne1->prenom,0,1));
		echo $c.'.'.strtoupper($ligne1->nom);
	}
	
	}
	
	
?>