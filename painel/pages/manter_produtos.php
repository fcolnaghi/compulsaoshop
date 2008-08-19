<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

require_once ("../controller/ProdutoController.class.php");
require_once ("../classes/Produto.class.php");
require_once ("../utils/MyException.class.php");

$_o = new ProdutoController();
$obj = new Produto();
if (isset($_REQUEST["item"])) {
	$obj = $_o->consultar($_REQUEST["item"]);
}

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
<script src="../scripts/painel.forms.js"		charset="iso-8859-1" type="text/javascript"></script>
</head>

<body>

<form name="form" id="form" method="post" action="../controller/ProdutoController.class.php?action=salvar">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Produtos</h1>
		<hr>
		
		<div id="divlist">
			<div class="borda">
				<table width="100%" cellpadding="0" cellspacing="1" class="form">
					<tr>	
						<td width="20%" class="table_campo">id_categoria</td>
						<td width="80%"><input type="text" name="id_categoria" value="<?=$obj->getid_categoria()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">nome</td>
						<td><input type="text" name="nome" value="<?=$obj->getnome()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">descricao</td>
						<td><input type="text" name="descricao" value="<?=$obj->getdescricao()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">valor</td>
						<td><input type="text" name="valor" value="<?=$obj->getvalor()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">peso</td>
						<td><input type="text" name="peso" value="<?=$obj->getpeso()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">qtd_estoque</td>
						<td><input type="text" name="qtd_estoque" value="<?=$obj->getqtd_estoque()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">referencia</td>
						<td><input type="text" name="referencia" value="<?=$obj->getreferencia()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">in_vitrine_loja</td>
						<td>
							<input type="radio" name="in_vitrine_loja" value="1" <?= ($obj->getin_vitrine_loja()==1)?"checked=checked":"" ?>> Sim 
							<input type="radio" name="in_vitrine_loja" value="0" <?= ($obj->getin_vitrine_loja()==0)?"checked=checked":"" ?>> Não
						</td>
					</tr>
					<tr>	
						<td class="table_campo">in_vitrine_categoria</td>
						<td>
							<input type="radio" name="in_vitrine_categoria" value="1" <?= ($obj->getin_vitrine_categoria()==1)?"checked=checked":"" ?>> Sim
							<input type="radio" name="in_vitrine_categoria" value="0" <?= ($obj->getin_vitrine_categoria()==0)?"checked=checked":"" ?>> Não
						</td>
					</tr>
					<tr>	
						<td class="table_campo">in_portal</td>
						<td>
							<input type="radio" name="in_portal" value="1" <?= ($obj->getin_portal()==1)?"checked=checked":"" ?>> Sim
							<input type="radio" name="in_portal" value="0" <?= ($obj->getin_portal()==0)?"checked=checked":"" ?>> Não
						</td>
					</tr>
					<tr>	
						<td class="table_campo">id_categoria_portal</td>
						<td><input type="text" name="id_categoria_portal" value="<?=$obj->getid_categoria_portal()?>"></td>
					</tr>
				</table>
				
				<div class="botoes">
					<input type="submit" name="salvar" id="salvar" value="Salvar" disabled="disabled">
					<input type="button" name="cancelar" id="cancelar" value="Cancelar">
				</div>
	
			</div>
		</div>
	</div>

<input type="hidden" name="id_produto" value="<?=$obj->getid_produto()?>">
<input type="hidden" name="id_loja" value="<?=$_SESSION["id_loja"]?>">
</form>
</body>
</html>