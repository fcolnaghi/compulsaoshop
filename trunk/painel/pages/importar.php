<?
session_start();
?>
<html>
<head>
<title>CompulsaoShop</title>
<link href="../styles/painel.css"				rel="stylesheet">
<link href="../styles/jdMenu.css"				rel="stylesheet">
<script src="../scripts/jquery.js"				type="text/javascript"></script>
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
</head>

<body>

<form name="form" id="form" action="#">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
	
		<h1>Importar</h1>
	
		<hr>
	
		<div id="divlist">
	<!------------------------ In�cio do conte�do da p�gina ------------------------>
			<div class='system_alert_message'>Essa p�gina ainda n�o foi constru�da</div>
	<!-------------------------- Fim do conte�do da p�gina ------------------------->
		</div>
	</div>
</form>
</body>
</html><?
	echo $_SERVER['PHP_SELF'];
?>
