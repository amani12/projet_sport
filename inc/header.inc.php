<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<meta charset="ISO-8859-1">
	<title>Gymnase UHA</title>
	<link rel="stylesheet" href="../../css/accueil.css">
</head>

	<script src="../../js/jquery-2.1.1.min.js"></script>
	<script src="../../js/jquery-ui.js"></script>
	<script src="../../js/fancybox/source/jquery.fancybox.pack.js"></script>
	<script>
	$(function()
	{
		// Pour le suivi des commandes (admin)
		$("#fancy").fancybox({
			'width':'35%',
			'height':'50%',
			'type':'iframe',
			'autoScale':'false'
        });
	});
	</script>
</head>
<body>
<?php require_once('config.php');
	  require_once('../../lib/lib_db.class.php');
?>