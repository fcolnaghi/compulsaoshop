<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>CompulsaoShop</title>
<link href="../styles/painel.css"				rel="stylesheet">
<link href="../styles/jdMenu.css"				rel="stylesheet">
<script src="../scripts/jquery.js"				type="text/javascript"></script>
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
</head>

<script language="javascript">
$(function () {
	$('#inserir').click(function(){
		$(this).attr("disabled","disabled").val("Aguarde...");

		location.href = "../pages/manter_estatisticas.php";
		
		return false;
	});
});

function editar (item) {
	location.href = "../pages/manter_estatisticas.php?item="+ item;
}
function excluir() {
	alert("excluir o item "+ item);
}
</script>

<body>

<form name="form" id="form" action="#">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
	
		<h1>Consultar estat�sticas</h1>
		<input type="button" name="inserir" id="inserir" value="Inserir novo" onClick="inserir()">
	
		<hr>
	
		<div id="divlist">
	<!------------------------ In�cio do conte�do da p�gina ------------------------>
			<div class='system_alert_message'>Essa p�gina ainda n�o foi constru�da</div>
	<!-------------------------- Fim do conte�do da p�gina ------------------------->
		</div>
	</div>
</form>
</body>
</html>