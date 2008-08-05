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

	<h1>Forms default</h1>

	<hr>

	<div id="divlist">
	
		<p class="paginacao">Página <img src="../images/pager_arrow_left_off.gif">&nbsp;<input type='text' id='page' value='1' size='1' disabled="disabled">&nbsp;<img src="../images/pager_arrow_right.gif"> de 1 páginas | Visualizar <select name='paginas' id='paginas'><option value='10'>10</option><option value='20' selected>20</option><option value='50'>50</option><option value='100'>100</option></select> por página | Total 10 registros encontrados</p>
	
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
					<td class='table_title' width="4%">&nbsp;</td>
					<td class='table_title' width="4%"  align="center">id</td>
					<td class='table_title' width="60%">nome</td>
					<td class='table_title' width="15%">idade</td>
					<td class='table_title' width="15%">telefone</td>
				</tr>
				<tr>
					<td class="table_subtitle" colspan='5'>Produtos mais vendidos</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="1"></td>
					<td align="center">1</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="2"></td>
					<td align="center">2</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="3"></td>
					<td align="center">3</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="4"></td>
					<td align="center">4</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="5"></td>
					<td align="center">5</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="6"></td>
					<td align="center">6</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="7"></td>
					<td align="center">7</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="8"></td>
					<td align="center">8</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="9"></td>
					<td align="center">9</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
				<tr>
					<td class="td_item" align="center"><input type="checkbox" name="item" value="10"></td>
					<td align="center">10</td>
					<td>--</td>
					<td>--</td>
					<td>--</td>
				</tr>
			</table>
		</div> <!-- end div borda -->
	</div> <!-- end div list -->
</div> <!-- end div conteudo -->
</form>
</body>		
</html>