<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);
require_once("../controller/UsuarioController.class.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>CompulsaoShop</title>
<script src="../scripts/jquery.js"			type="text/javascript"></script>
<link href="../styles/painel.css"			rel="stylesheet">
</head>
<body>

<form name="form" id="form" method="post" action="../controller/UsuarioController.class.php?action=login">
	<div id="divconteudo">
	
		<h1>Login</h1>
	
		<hr>
	
		<div id="divlist">
	<!------------------------ Início do conteúdo da página ------------------------>
			<div class="borda">
				<table width="100%" cellpadding="0" cellspacing="1" class="form">
					<tr>
						<td class="table_campo">Email</td>
						<td><input type="text" name="email" id="email" value="jackson.s.teixeira@gmail.com"></td>
					</tr>
					<tr>
						<td class="table_campo">Senha</td>
						<td><input type="password" name="senha" id="senha" value="1111"></td>
					</tr>
				</table>
				
				<div class="botoes">
					<input type="submit" name="confirmar" id="confirmar" value="Confirmar">
				</div>
			</div>
	<!-------------------------- Fim do conteúdo da página ------------------------->
		</div>
	</div>
</form>
</body>
</html>