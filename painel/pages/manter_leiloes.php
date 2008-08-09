<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

require_once ("../controller/LeilaoController.class.php");
require_once ("../classes/Leilao.class.php");
require_once ("../utils/MyException.class.php");

$_o = new LeilaoController();
$obj = new Leilao();
if (isset($_REQUEST["item"])) {
	$obj = $_o->consultar($_REQUEST["item"]);
}

?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>CompulsaoShop</title>
<link href="../styles/painel.css"				rel="stylesheet">
<link href="../styles/jdMenu.css"				rel="stylesheet">
<script src="../scripts/jquery.js"				type="text/javascript"></script>
<script src="../scripts/jquery.validate.js"		type="text/javascript"></script>
<script src="../scripts/jquery.tabs.js"			type="text/javascript"></script>
<script src="../scripts/jquery.form.js"			type="text/javascript"></script>
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
<script src="../scripts/painel.js"				type="text/javascript"></script>
<script src="../scripts/painel.forms.js"		type="text/javascript"></script>
</head>

<body>

<form name="form" id="form" method="post" action="../controller/LeilaoController.class.php?action=salvar">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Leilões</h1>
		<hr>
		
		<div id="divlist">
			<div class="borda">
				<table width="100%" cellpadding="0" cellspacing="1" class="form">
					<tr>	
						<td width="20%" class="table_campo">descricao</td>
						<td width="80%"><input type="text" name="descricao" value="<?=$obj->getdescricao()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">id_produto</td>
						<td><input type="text" name="id_produto" value="<?=$obj->getid_produto()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">dt_inicio</td>
						<td><input type="text" name="dt_inicio" value="<?=$obj->getdt_inicio()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">dt_fim</td>
						<td><input type="text" name="dt_fim" value="<?=$obj->getdt_fim()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">id_status_leilao</td>
						<td><input type="text" name="id_status_leilao" value="<?=$obj->getid_status_leilao()?>"></td>
					</tr>
				</table>
				
				<div class="botoes">
					<input type="submit" name="salvar" id="salvar" value="Salvar" disabled="disabled">
					<input type="button" name="cancelar" id="cancelar" value="Cancelar">
				</div>
	
			</div>
		</div>
	</div>

<input type="hidden" name="id_leilao" value="<?=$obj->getid_leilao()?>">
<input type="hidden" name="id_loja" value="<?=$_SESSION["id_loja"]?>">
</form>
</body>
</html>