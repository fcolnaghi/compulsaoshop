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
<script src="../scripts/jquery.tabs.js"		type="text/javascript"></script>
<link href="../styles/painel.css"			rel="stylesheet">
<link rel="stylesheet" href="../styles/jquery.tabs.css" type="text/css">
<!-- Additional IE/Win specific style sheet (Conditional Comments) -->
<!--[if lte IE 7]>
<link rel="stylesheet" href="../styles/jquery.tabs-ie.css" type="text/css">
<![endif]-->
<style type="text/css">

    /* Not required for Tabs, just to make this demo look better... */

    body {
        font-size: 16px; /* @ EOMB */
    }
    * html body {
        font-size: 100%; /* @ IE */
    }
    body * {
        font-size: 87.5%;
        font-family: "Trebuchet MS", Trebuchet, Verdana, Helvetica, Arial, sans-serif;
    }
    body * * {
        font-size: 100%;
    }
    h1 {
        margin: 1em 0 1.5em;
        font-size: 18px;
    }
    h2 {
        margin: 2em 0 1.5em;
        font-size: 16px;
    }
    p {
        margin: 0;
    }
    pre, pre+p, p+p {
        margin: 1em 0 0;
    }
    code {
        font-family: "Courier New", Courier, monospace;
    }
</style>

</head>
<script language="javascript">
$(function(){
	$('#menu_abas').tabs({ remote: true });
});
</script>
<body>

<form name="form" id="form" method="post" action="../controller/UsuarioController.class.php?action=login">
	<div id="divconteudo">
	
		<h1>Login</h1>
	
		<hr>
	
		<div id="divlist">
	<!------------------------ Início do conteúdo da página ------------------------>
<div id="menu_abas">
    <ul>
        <li><a href="ahah_1.html"><span>One</span></a></li>
        <li><a href="ahah_2.html"><span>Two</span></a></li>
        <li><a href="ahah_3.html"><span>Three</span></a></li>
    </ul>
</div>

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