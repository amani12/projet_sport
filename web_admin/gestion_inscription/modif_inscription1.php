<?php
require_once('../../inc/header.inc.php');

$db=new DB_connection();
$db2=new DB_connection();
$req="select * from s_inscrire where numero_personne='".$_GET['num']."' and etat_inscription=1";
$db->DB_query($req);
$pr=$tr=null;
while($res=$db->DB_object())
{

if($res->principale==1)
{
		$pr=$res->ref_activite;
		$note=$res->notee_ou_pas;
}
else
{
		$tr=$res->ref_activite ;
		$note1=$res->notee_ou_pas;
}

}
if($_POST['principale']!= $pr)

{
		$db2=new DB_connection();
		$req2="update s_inscrire set etat_inscription=0 where numero_personne='".$_GET['num']."' and ref_activite='".$pr."'"; 

		$db2->DB_query($req2);

		$req="select * from s_inscrire where numero_personne='".$_GET['num']."' and ref_activite='".$_POST['principale'] ."' and etat_inscription=0";
		$db->DB_query($req);
	if($res=$db->DB_object())
	{
		$db2=new DB_connection();
		$req2="update s_inscrire set etat_inscription=1 , principale=1 where numero_personne='".$_GET['num']."' and ref_activite='".$_POST['principale'] ."'"; 

		$db2->DB_query($req2);
	}
	else
	{
		$db2=new DB_connection();
		$req2="insert into s_inscrire (ref_activite,numero_personne,etat_inscription,principale) values ('".$_POST['principale'] ."','".$_GET['num']."',1,1)"; 

		$db2->DB_query($req2);
	}
}
if(isset($_POST['no']))
{

	
	$req2="update s_inscrire set notee_ou_pas=1 where numero_personne='".$_GET['num']."' and ref_activite='".$_POST['principale'] ."'";
	$db2->DB_query($req2);
	}
	else
	{
	$req2="update s_inscrire set notee_ou_pas=0 where numero_personne='".$_GET['num']."' and ref_activite='".$_POST['principale'] ."'";
	$db2->DB_query($req2);
	}

	
if($_POST['transfert']!= $_POST['principale'] and $_POST['transfert']!=$tr )
{
		if($tr!=null)
		{
		$db2=new DB_connection();
		$req2="update s_inscrire set etat_inscription=0 where numero_personne='".$_GET['num']."' and ref_activite='".$tr."'"; 

		$db2->DB_query($req2);
		}
		
		if($_POST['transfert']!=null)
		{
		$req="select * from s_inscrire where numero_personne='".$_GET['num']."'and ref_activite='".$_POST['transfert'] ."' and etat_inscription=0";
		$db->DB_query($req);
	if($res=$db->DB_object())
	{
		$db2=new DB_connection();
		$req2="update s_inscrire set etat_inscription=1, principale=0 where numero_personne='".$_GET['num']."'and ref_activite='".$_POST['transfert'] ."'"; 

		$db2->DB_query($req2);
	}
	else
	{
		$db2=new DB_connection();
		$req2="insert into s_inscrire (ref_activite,numero_personne,etat_inscription,principale) values ('".$_POST['transfert']."','".$_GET['num']."',1,0)"; 

		$db2->DB_query($req2);
	}
}
}
if($_POST['transfert']!=null)
{

if(isset($_POST['no1']))
{
	
	$req2="update s_inscrire set notee_ou_pas=1 where numero_personne='".$_GET['num']."' and ref_activite='".$_POST['transfert'] ."'";
	$db2->DB_query($req2);
	}
	else
	{
	$req2="update s_inscrire set notee_ou_pas=0 where numero_personne='".$_GET['num']."'and ref_activite='".$_POST['transfert'] ."'";
	$db2->DB_query($req2);
	}
	}

?>
