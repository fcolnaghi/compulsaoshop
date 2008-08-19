<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

require_once ("../controller/BannerController.class.php");
require_once ("../classes/Banner.class.php");
require_once ("../utils/MyException.class.php");

$_o = new BannerController();
$obj = new Banner();
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
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
<script src="../scripts/painel.js"				type="text/javascript"></script>
<script src="../scripts/painel.forms.js"		type="text/javascript"></script>
</head>

<body>

<form name="form" id="form" method="post" action="../controller/BannerController.class.php?action=salvar">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Banners</h1>
		<hr>
		
		<div id="divlist">
			<div class="borda">
				<table width="100%" cellpadding="0" cellspacing="1" class="form">
					<tr>	
						<td width="20%" class="table_campo">posicao</td>
						<td width="80%"><input type="text" name="posicao" value="<?=$obj->getposicao()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">url</td>
						<td width="80%"><input type="text" name="url" value="<?=$obj->geturl()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">destino</td>
						<td width="80%"><input type="text" name="destino" value="<?=$obj->getdestino()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">target</td>
						<td width="80%"><input type="text" name="target" value="<?=$obj->gettarget()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">click</td>
						<td width="80%"><input type="text" name="click" value="<?=$obj->getclick()?>"></td>
					</tr>
				</table>
				
				<div class="botoes">
					<input type="submit" name="salvar" id="salvar" value="Salvar" disabled="disabled">
					<input type="button" name="cancelar" id="cancelar" value="Cancelar">
				</div>
	
			</div>
		</div>
	</div>

<input type="hidden" name="id_banner" value="<?=$obj->getid_banner()?>">
<input type="hidden" name="id_loja" value="<?=$_SESSION["id_loja"]?>">
</form>
</body>
</html>