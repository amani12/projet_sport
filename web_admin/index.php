<?php
if($_SESSION['isLoggedAdmin']==true)
{
	header("Location: AccueilAdmin/");
}
else
{

	header("Location: InscriptionAdmin/");
}
?>