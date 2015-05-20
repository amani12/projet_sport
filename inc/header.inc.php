<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr">
<head>
	<meta charset="ISO-8859-1">
	<title>Gymnase UHA</title>
	<link rel="stylesheet" href="../../css/accueil.css">
	<link rel="stylesheet" href="../../js/fancybox/source/jquery.fancybox.css">
	<script src="../../js/jquery-2.1.1.min.js"></script>
	<script src="../../js/jquery-ui.js"></script>
	<script src="../../js/fancybox/source/jquery.fancybox.pack.js"></script>
	<script type="text/javascript">
	
		$( document ).ready(function() {
			$("#fancy").fancybox({
				
				type: "iframe",
				width: '40%',
				height: '40%',
				onClosed: function() {   
     parent.location.reload(true); 
    ;}
								});
	});
	</script>
</head>
<body>
<?php require_once('config.php');
	  require_once('../../lib/lib_db.class.php');
?>