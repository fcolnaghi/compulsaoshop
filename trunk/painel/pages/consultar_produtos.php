<?
require_once ("../controller/ProdutoController.class.php");
require_once ("../classes/Produto.class.php");
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
<script src="../scripts/list.js"				type="text/javascript"></script>
</head>

<body>

<form name="form" id="form" action="#">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
	
		<h1>Produtos</h1>
	
		<hr>
	
		<div id="divlist">
		<?
			try {
				$_o = new ProdutoController();
		
				$valores['id_loja'] = 1;
				$qtdRegistros = $_o->contar($valores);
		?>
			<!------------------------ Início do conteúdo da página ------------------------>
			<p class="paginacao">Página <img src="../images/pager_arrow_left_off.gif">&nbsp;<input type='text' id='page' value='1' size='1' disabled="disabled">&nbsp;<img src="../images/pager_arrow_right.gif"> de 1 páginas | Visualizar <select name='paginas' id='paginas'><option value='10'>10</option><option value='20' selected>20</option><option value='50'>50</option><option value='100'>100</option></select> por página | Total <?=$qtdRegistros[0]?> registros encontrados</p>
		
			<div class="borda">
				<table cellpadding="0" cellspacing="0" class="marcacao">
					<tr>
						<td><a href="#" class="marcar_todos">Marcar todos</a> | <a href="#" class="desmarcar_todos">Desmarcar todos</a> | <a href="#" class="marcar_visiveis">Marcar visíveis</a> | <a href="#" class="desmarcar_visiveis">Desmarcar invisíveis</a> | <span id="total_registros_selecionados">0</span> itens selecionados</td>
						<td align="right">Ações
							<select name="options">
								<option value="0"></option>
								<option value="1">Excluir</option>
							</select>
						</td>
					</tr>
				</table>
				<table cellpadding="0" cellspacing="1" class="list">
					<tr>
						<td class='table_title' width="5%">&nbsp;</td>
						<td class='table_title' width="15%" align='center'>ID Produto</td>
						<td class='table_title' width="65%">Nome Produto</td>
						<td class='table_title' width="15%" align='center'>ID Loja</td>
					</tr>
					<?
						$valores = array();
						$valores['id_loja'] = 1;
						
						$response = $_o->listar($valores);
						
						foreach($response as $obj) {
							echo "<tr>";
							echo "	<td class='td_item' align='center'><input type='checkbox' name='item' value='". $obj->getid_produto() ."'></td>";
							echo "	<td align='center'>". $obj->getid_produto() ."</td>";
							echo "	<td>". $obj->getnome() ."</td>";
							echo "	<td align='center'>". $obj->getid_loja() ."</td>";
							echo "</tr>";
						}
					?>
				</table>
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