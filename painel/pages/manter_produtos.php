<?
session_start();

require_once ("../controller/ProdutoController.class.php");
require_once ("../classes/Produto.class.php");

$_o = new ProdutoController();
if (isset($_REQUEST["item"])) {
	$obj = $_o->consultar($_REQUEST["item"]);
}
?>
<html>
<head>
<title>CompulsaoShop</title>
<link href="../styles/painel.css"				rel="stylesheet">
<link href="../styles/jdMenu.css"				rel="stylesheet">
<script src="../scripts/jquery.js"				type="text/javascript"></script>
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
<script src="../scripts/painel.js"				type="text/javascript"></script>
</head>

<script language='javascript'>
$(function () {
	$('#salvar').click(function(){
		$(this).attr("disabled","disabled").val("Aguarde...");
		$("div.system_confirm_message").show();
		return false;
	});
});

//../controller/ProdutoController.class.php?action=salvar
</script>

<body>

<form name="form" id="form" method="post" action="#">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Produtos</h1>
		<hr>

		<ul>
			<li>Implementar submit por ajax</li>
			<li>Ao voltar, mostrar mensagem (erro,sucesso,etc), com opção para 'inserir novo'</li>
			<li>Validar online os campos (validate)</li>
			<li>Ao clicar no botão submit, trocar o label para 'aguarde' e depois para 'pronto'</li>
			<li>Ao alterar qualquer campo, habilitar novamente o botão salvar</li>
			<li>Simplificar o layout (vide code.google.com|google.com/a/leggos.com.br|gmail.com)</li>
			<li>Tirar os campos id_loja</li>
			<li>Desabilitar o campo id_produto</li>
			<li>Substituir o ID pela descrição (criar um método genérico)</li>
			<li>Implementar uma pop-up(ou similar) com a lista de categorias (sem drop)</li>
			<li>Implementar upload de imagens</li>
			<li>Implementar envio de emails</li>
		</ul>
		
		<div class="system_confirm_message" style="display:none">Colocar uma mensagem de sucesso aqui</div>
		
		<div id="divlist">
			<div class="borda">
				<table width="100%" cellpadding="0" cellspacing="1" class="form">
					<tr>
						<td class="table_subtitle" colspan='2'><?=$obj->getnome()?></td>
					</tr>
					<tr>
						<td width="20%"class="table_campo">id_loja</td>
						<td width="80%"><input type="text" name="id_loja" value="<?=$obj->getid_loja()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">id_produto</td>
						<td><input type="text" name="id_produto" value="<?=$obj->getid_produto()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">id_categoria</td>
						<td><input type="text" name="id_categoria" value="<?=$obj->getid_categoria()?>"></td>
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
					<input type="button" name="salvar" id="salvar" value="Salvar">
				</div>
	
			</div> <!-- end div borda -->
		</div> <!-- end div list -->
	</div> <!-- end div conteudo -->
</form>
</body>		
</html>