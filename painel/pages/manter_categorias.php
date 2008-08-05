<?
require_once ("../controller/CategoriaController.class.php");
require_once ("../classes/Categoria.class.php");
?>

<html>
<head>
<title>CompulsaoShop</title>
<link href="../styles/painel.css"				rel="stylesheet">
<link href="../styles/jdMenu.css"				rel="stylesheet">
<link href="../styles/tree.css"					rel="stylesheet">
<script src="../scripts/jquery.js"				type="text/javascript"></script>
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
<script src="../scripts/painel.js"				type="text/javascript"></script>
<script src="../scripts/list.js"				type="text/javascript"></script>
<script src="../scripts/jquery.simple.tree.js"	type="text/javascript"></script>
<script src="../scripts/jquery.contextmenu.js"	type="text/javascript"></script>
</head>

<script type="text/javascript">
var simpleTreeCollection;
$(document).ready(function(){
	
	$("input[@type='text']").val("");
	$("input[@type='text']").attr("disabled","true");
	/* $("div.borda").attr("style","opacity:0.4;filter:alpha(opacity=40)");*/
			
	simpleTreeCollection = $('.simpleTree').simpleTree({
		autoclose: true,
		afterClick:function(node){
			$("#id_categoria").val(node.attr('id'));
			$("#id_categoria_pai").val("");
			$("#descricao").val($('span:first',node).text()).attr("disabled","");
		},
		afterDblClick:function(node){
			//alert("text-"+$('span:first',node).text());
		},
		afterMove:function(destination, node, pos){
			//alert("destination-"+destination.attr('id')+" node-"+node.attr('id')+" pos-"+pos);
			if (confirm("Você moveu a categoria '"+ $('span:first',node).text() + "' para '"+ $('span:first',destination).text()+ "'. Confirma?")) {
				$("#id_categoria").val(node.attr('id'));
				$("#id_categoria_pai").val(destination.attr('id'));
				$("#form").attr("action","../classes/Categoria.class.php?id_loja=1&action=salvar");
				$("#form").submit();
			} else {
				location.href = "../pages/manter_categorias.php";
			} 
		},
		afterAjax:function()
		{
			//alert('Loaded');
			//location.href = "../pages/manter_categorias.php";
		},contextOptions:function(op, node){
			// operacao = add, reload, delete, edit
			var id = node.attr('id')

			$("input[@type='text']").val("");
			$("input[@type='text']").attr("disabled","true");

			switch (op) {
				case 'add':
					$("#id_categoria_pai").val(id);
					$("#descricao").attr("disabled","");
					$("#descricao").focus();
					$("#form").attr("action","../classes/Categoria.class.php?id_loja=1&action=salvar");
										
					break;
				case 'reload':
					location.href = "../pages/manter_categorias.php";
					break;
				case 'delete':
					if (confirm("Deseja realmente excluir a categoria '"+ $('span:first',node).text() +"'? \n\nTodos os produtos sob esta categoria serão automaticamente movidos para a categoria superior.")) {
						$("#id_categoria").val(id);
						$("#form").attr("action","../classes/Categoria.class.php?id_loja=1&action=excluir");
						$("#form").submit();
					}
					break;
				default:
			}
		},
		animate:true,
		docToFolderConvert:true
	});
	
	$("#form").submit(function () {
		$("input[@type='text']").attr("disabled","");
	});
});
</script>

<body>

<form name="form" id="form" action="#" method="post">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
	
		<h1>Categorias</h1>
	
		<hr>
	
		<div id="divlist">
		<?
			try {
				$_o = new CategoriaController();
				
				/*$valores['id_loja'] = 1;
				$qtdRegistros = $_o->contar($valores);*/
		?>
			<!------------------------ Início do conteúdo da página ------------------------>
			<div id="ladoesquerdo">
				<div class="contextMenu" id="myMenu1">
					<ul>
						<li id="add"><img src="../images/tree/folder_add.png" /> Adicionar</li>
						<li id="delete"><img src="../images/tree/folder_delete.png" /> Excluir</li>
						<li id="reload"><img src="../images/tree/arrow_refresh.png" /> Atualizar</li>
					</ul>
				</div>
				
				<ul id="treemenu" class="simpleTree">
					<li class="root" id='0'><span>Categorias</span>
						<? $_o->geraMenu(0); ?>
					</li>
				</ul>
			</div>
			
			<div id="ladodireito">
				<div class="borda">
					<table width="100%" cellpadding="0" cellspacing="1" class="form">
						<tr>
							<td class="table_subtitle" colspan='2'>Manter Categoria</td>
						</tr>
						<tr>
							<td width="20%" class="table_campo">ID Categoria</td>
							<td width="80%"><input type="text" name="id_categoria" id="id_categoria" disabled="disabled"></td>
						</tr>
						<tr>
							<td class="table_campo">ID categoria superior</td>
							<td><input type="text" name="id_categoria_pai" id="id_categoria_pai" disabled="disabled"></td>
						</tr>
						<tr>
							<td class="table_campo">Descrição</td>
							<td><input type="text" name="descricao" id="descricao"></td>
						</tr>
					</table>
					
					<div class="botoes">
						<input type="submit" name="confirmar" id="confirmar" value="Confirmar">
						<input type="submit" name="cancelar" id="cancelar" value="Cancelar">
					</div>
				</div>
			</div>
			<!-------------------------- Fim do conteúdo da página ------------------------->
		<?
			// Tratamento de exceptions
			} catch (MyException $m) {
				echo "<div class='system_error_message'>". $m->getMyMessage() ."</div>";
		    }
		?>
		</div>
	</div>
</form>

</body>		
</html>