<?php
session_start();
$_SESSION['activite'] = $_POST['activite'];
$_SESSION['club'] = $_POST['club'];
$_SESSION['eligibility'] = $_POST['eligibility'];
$_SESSION['eligibility1'] = $_POST['eligibility1'];
$_SESSION['eligibility3'] = $_POST['eligibility3'];

if(isset($_POST['eligibility'])&&isset($_POST['eligibility1'])&&isset($_POST['eligibility3'])){
if(isset($_POST['appartClub'])){
	$_POST['appartClub']=1;
	}else{
	$_POST['appartClub']=0;	
	}	
move_uploaded_file ($_FILES['imgfile']['tmp_name'], 
       "../../img/uploads/{$_FILES['imgfile'] ['name']}");
	   
move_uploaded_file ($_FILES['imgfile1']['tmp_name'], 
       "../../img/uploads/{$_FILES['imgfile1'] ['name']}");
}else{
}	

echo $_FILES['imgfile']['name'];



?>