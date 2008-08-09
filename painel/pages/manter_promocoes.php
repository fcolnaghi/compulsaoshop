<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

require_once ("../controller/PromocaoController.class.php");
require_once ("../classes/Promocao.class.php");
require_once ("../utils/MyException.class.php");

$_o = new PromocaoController();
$obj = new Promocao();
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

<script type="text/javascript">
$(document).ready(function() {
	$("#form").validate ({
		rules: {
			nome: "required",
			descricao: "required",
			percentual_desconto: "required",
			qtd_limite_produtos: "required",
			dt_inicio: "required",
			dt_fim: "required"
		},
		messages: {
			nome: "Por favor, preencha",
			descricao: "Por favor, preencha",
			percentual_desconto: "Por favor, preencha",
			qtd_limite_produtos: "Por favor, preencha",
			dt_inicio: "Por favor, preencha",
			dt_fim: "Por favor, preencha"
		}
	});
});
</script>

</head>

<body>

<form name="form" id="form" method="post" action="../controller/PromocaoController.class.php?action=salvar">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Promocões</h1>
		<hr>
		
		<div id="divlist">
			<div class="borda">
				<table width="100%" cellpadding="0" cellspacing="1" class="form">
					<tr>	
						<td width="20%" class="table_campo">nome</td>
						<td width="80%"><input type="text" name="nome" value="<?=$obj->getnome()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">descricao</td>
						<td width="80%"><input type="text" name="descricao" value="<?=$obj->getdescricao()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">percentual_desconto</td>
						<td width="80%"><input type="text" name="percentual_desconto" value="<?=$obj->getpercentual_desconto()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">qtd_limite_produtos</td>
						<td width="80%"><input type="text" name="qtd_limite_produtos" value="<?=$obj->getqtd_limite_produtos()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">dt_inicio</td>
						<td width="80%"><input type="text" name="dt_inicio" value="<?=$obj->getdt_inicio()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">dt_fim</td>
						<td width="80%"><input type="text" name="dt_fim" value="<?=$obj->getdt_fim()?>"></td>
					</tr>
				</table>
				
				<div class="botoes">
					<input type="submit" name="salvar" id="salvar" value="Salvar" disabled="disabled">
					<input type="button" name="cancelar" id="cancelar" value="Cancelar">
				</div>
	
			</div>
		</div>
	</div>

<input type="hidden" name="id_promocao" value="<?=$obj->getid_promocao()?>">
<input type="hidden" name="id_loja" value="<?=$_SESSION["id_loja"]?>">
</form>
</body>
</html>