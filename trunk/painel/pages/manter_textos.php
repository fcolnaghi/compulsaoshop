<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);

require_once ("../controller/TextoController.class.php");
require_once ("../classes/Texto.class.php");
require_once ("../utils/MyException.class.php");

$_o = new TextoController();
$obj = new Texto();
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
<script src="../scripts/jquery.js"				charset="iso-8859-1" type="text/javascript"></script>
<script src="../scripts/jquery.validate.js"		type="text/javascript"></script>
<script src="../scripts/jquery.tabs.js"			type="text/javascript"></script>
<script src="../scripts/jquery.form.js"			charset="iso-8859-1" type="text/javascript"></script>
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
<script src="../scripts/painel.js"				type="text/javascript"></script>
<script src="../scripts/painel.forms.js"		charset="iso-8859-1" type="text/javascript"></script>

<script type="text/javascript" src="../scripts/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript">
tinyMCE.init({
	mode : "textareas",
	theme : "advanced",
	plugins : "safari,style,table,preview,media,contextmenu,paste,advimage,advlink,iespell,xhtmlxtras,template",

	theme_advanced_buttons1 : "cut,copy,paste,|,undo,redo,|,link,unlink,image,media,template,hr,|,bullist,numlist,|,code,preview",
	theme_advanced_buttons2 : "formatselect,|,bold,italic,underline,strikethrough,blockquote,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,|,forecolor,backcolor",
	theme_advanced_buttons3 : "tablecontrols",

	theme_advanced_blockformats : "h1,h2,h3,p,blockquote",
	theme_advanced_toolbar_location : "top",
	theme_advanced_toolbar_align : "left",

	// Drop lists for link/image/media/template dialogs
	template_external_list_url : "../scripts/tiny_mce/lists/template_list.js",
	external_link_list_url : "../scripts/tiny_mce/lists/link_list.js",
	external_image_list_url : "../scripts/tiny_mce/lists/image_list.js",
	media_external_list_url : "../scripts/tiny_mce/lists/media_list.js",

	// Replace values for the template plugin
	template_replace_values : {
		nome : "<?=$_SESSION["nome"]?>",
		email : "<?=$_SESSION["email"]?>"
	}
});
</script>

</head>

<body>

<form name="form" id="form" method="post" action="../controller/TextoController.class.php?action=salvar">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Textos</h1>
		<hr>
		
		<div id="divlist">
			<div class="borda">
				<table width="100%" cellpadding="0" cellspacing="1" class="form">
					<tr>	
						<td width="20%" class="table_campo">titulo_texto</td>
						<td width="80%"><input type="text" name="titulo_texto" value="<?=$obj->gettitulo_texto()?>"></td>
					</tr>
					<tr>	
						<td class="table_campo">texto</td>
						<td><textarea id="texto" name="texto" rows="15" cols="80" style="width: 100%"><?=$obj->gettexto()?></textarea></td>
					</tr>
				</table>
				<a href="javascript:;" onmousedown="alert(tinyMCE.get('texto').getContent());">Conteúdo</a>

				<div class="botoes">
					<input type="submit" name="salvar" id="salvar" value="Salvar" disabled="disabled">
					<input type="button" name="cancelar" id="cancelar" value="Cancelar">
				</div>
	
			</div>
		</div>
	</div>

<input type="hidden" name="id_texto" value="<?=$obj->getid_texto()?>">
<input type="hidden" name="id_loja" value="<?=$_SESSION["id_loja"]?>">
</form>
</body>
</html>