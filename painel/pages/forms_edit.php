<?
session_start();
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

<script language='javascript'>
	$(function () {
		$(':submit').addClass('submit');
		$(":checkbox").css('border','0px');
		$(":radio").css('border','0px');
	});
</script>

<body>

<form name="form" id="form" action="#">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Item <?= $_REQUEST["item"] ?></h1>
		<hr>
		
		<div class="system_error_message">bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah</div>
		<div class="system_alert_message">bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah</div>
		<div class="system_confirm_message">bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah</div>
		<div class="system_warning_message">bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah bah</div>
		
		<div id="divlist">
			<div class="borda">
				<table width="100%" cellpadding="0" cellspacing="1" class="form">
					<tr>
						<td class="table_subtitle" colspan='2'>Produtos mais vendidos</td>
					</tr>
					<tr>
						<td width="20%" class="table_campo">Campo 1</td>
						<td width="80%"><input type="text"></td>
					</tr>
					<tr>
						<td class="table_campo">Campo 2</td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="table_campo">Campo 3</td>
						<td>
							<input type="checkbox" value="1"> Opção 1 <br>
							<input type="checkbox" value="2"> Opção 2 <br>
							<input type="checkbox" value="3"> Opção 3 <br>
							<input type="checkbox" value="4"> Opção 4
						</td>
					</tr>
					<tr>
						<td class="table_campo">Campo 4</td>
						<td><input type="text"></td>
					</tr>
						<td class="table_campo">Campo 5</td>
						<td>
							<input type="radio" value="1"> Opção 1 <br>
							<input type="radio" value="2"> Opção 2 <br>
							<input type="radio" value="3"> Opção 3 <br>
							<input type="radio" value="4"> Opção 4
						</td>
					<tr>
						<td class="table_campo">Campo 6</td>
						<td>
							<select>
								<option value="0"></option>
								<option value="1">Opção 1</option>
								<option value="2">Opção 2</option>
								<option value="3">Opção 3</option>
								<option value="4">Opção 4</option>
							</select>
						</td>
					</tr>
					<tr>
						<td class="table_campo">Campo 7</td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="table_campo">Campo 8</td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="table_campo">Campo 9</td>
						<td><input type="text"></td>
					</tr>
					<tr>
						<td class="table_campo">Campo 10</td>
						<td><textarea></textarea></td>
					</tr>
				</table>
				
				<div class="botoes">
					<input type="submit" name="confirmar" id="confirmar" value="Confirmar">
					<input type="submit" name="cancelar" id="cancelar" value="Cancelar">
				</div>
	
			</div> <!-- end div borda -->
		</div> <!-- end div list -->
	</div> <!-- end div conteudo -->
</form>
</body>		
</html>