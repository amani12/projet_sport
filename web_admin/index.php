<?php
if($_SESSION['isLoggedAdmin']==true)
{
	header("Location: AccueilAdmin/");
}
else
{

	header("Location: connexion_admin/");
}
?>