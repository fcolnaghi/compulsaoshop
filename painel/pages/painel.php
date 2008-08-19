<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

require_once ("../utils/MyException.class.php");
?>
<html>
<head>
<title>CompulsaoShop</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="../styles/painel.css"				rel="stylesheet">
<link href="../styles/jdMenu.css"				rel="stylesheet">
<script src="../scripts/jquery.js"				charset="iso-8859-1" type="text/javascript"></script>
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
<script src="../scripts/painel.js"				type="text/javascript"></script>
</head>

<body>

<form name="form" id="form" method="post" action="#">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Painel</h1>

		<hr>
		
		<div id="divlist">
			<div class="borda">
				<h2>Escolher quais painéis serão apresentados aqui..</h2>
			</div>
		</div>
	</div>
</form>

</body>
</html>