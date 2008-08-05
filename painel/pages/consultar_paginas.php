<?
require_once ("../controller/PaginaController.class.php");
require_once ("../classes/Pagina.class.php");
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
	
		<h1>P�ginas</h1>
	
		<hr>
	
		<div id="divlist">
		<?
			try {
				$_o = new PaginaController();
				
				$valores['id_loja'] = 1;
				$qtdRegistros = $_o->contar($valores);
		?>
			<!------------------------ In�cio do conte�do da p�gina ------------------------>
			<p class="paginacao">P�gina <img src="../images/pager_arrow_left_off.gif">&nbsp;<input type='text' id='page' value='1' size='1' disabled="disabled">&nbsp;<img src="../images/pager_arrow_right.gif"> de 1 p�ginas | Visualizar <select name='paginas' id='paginas'><option value='10'>10</option><option value='20' selected>20</option><option value='50'>50</option><option value='100'>100</option></select> por p�gina | Total <?=$qtdRegistros[0]?> registros encontrados</p>
		
			<div class="borda">
				<table cellpadding="0" cellspacing="0" class="marcacao">
					<tr>
						<td><a href="#" class="marcar_todos">Marcar todos</a> | <a href="#" class="desmarcar_todos">Desmarcar todos</a> | <a href="#" class="marcar_visiveis">Marcar vis�veis</a> | <a href="#" class="desmarcar_visiveis">Desmarcar invis�veis</a> | <span id="total_registros_selecionados">0</span> itens selecionados</td>
						<td align="right">A��es
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
						<td class='table_title' width="15%" align='center'>ID P�gina</td>
						<td class='table_title' width="65%">T�tulo</td>
						<td class='table_title' width="15%" align='center'>ID Loja</td>
					</tr>
					<?
						$valores = array();
						$valores['id_loja'] = 1;
						
						$response = $_o->listar($valores);
						
						foreach($response as $obj) {
							echo "<tr>";
							echo "	<td class='td_item' align='center'><input type='checkbox' name='item' value='". $obj->getid_pagina() ."'></td>";
							echo "	<td align='center'>". $obj->getid_pagina() ."</td>";
							echo "	<td>". $obj->gettitulo_pagina() ."</td>";
							echo "	<td align='center'>". $obj->getid_loja() ."</td>";
							echo "</tr>";
						}
					?>
				</table>
			</div>
			<!-------------------------- Fim do conte�do da p�gina ------------------------->
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