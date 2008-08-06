<?
session_start();

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
<link href="../styles/painel.css"				rel="stylesheet">
<link href="../styles/jdMenu.css"				rel="stylesheet">
<script src="../scripts/jquery.js"				type="text/javascript"></script>
<script src="../scripts/jquery.tabs.js"			type="text/javascript"></script>
<script src="../scripts/jquery.form.js"			type="text/javascript"></script>
<script src="../scripts/jquery.dimensions.js"	type="text/javascript"></script>
<script src="../scripts/jquery.jdMenu.js"		type="text/javascript"></script>
<script src="../scripts/painel.js"				type="text/javascript"></script>
</head>

<script language='javascript'>
// prepare the form when the DOM is ready 
$(document).ready(function() { 
    var options = { 
        //target:        '#mensagem',   // target element(s) to be updated with server response 
        beforeSubmit:  showRequest,  // pre-submit callback 
        success:       showResponse  // post-submit callback 
 
        // other available options: 
        //url:       url         // override for form's 'action' attribute 
        //type:      type        // 'get' or 'post', override for form's 'method' attribute 
        //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
        //clearForm: true        // clear all form fields after successful submit 
        //resetForm: true        // reset the form after successful submit 
 
        // $.ajax options can be used here too, for example: 
        //timeout:   3000 
    }; 
 
    // bind to the form's submit event 
    $('#form').submit(function() { 
        // inside event callbacks 'this' is the DOM element so we first 
        // wrap it in a jQuery object and then invoke ajaxSubmit 
        $(this).ajaxSubmit(options); 
 
        // !!! Important !!! 
        // always return false to prevent standard browser submit and page navigation 
        return false; 
    }); 
}); 
 
// pre-submit callback 
function showRequest(formData, jqForm, options) { 
    // formData is an array; here we use $.param to convert it to a string to display it 
    // but the form plugin does this for you automatically when it submits the data 
//    var queryString = $.param(formData); 
 
    // jqForm is a jQuery object encapsulating the form element.  To access the 
    // DOM element for the form do this: 
    // var formElement = jqForm[0]; 
 
//   alert('About to submit: \n\n' + queryString); 
 
 
	$("#salvar").attr("disabled","disabled").val("Aguarde...");
 
    // here we could return false to prevent the form from being submitted; 
    // returning anything other than false will allow the form submit to continue 
    return true; 
} 
 
// post-submit callback 
function showResponse(responseText, statusText)  { 
	$("#divlist").prepend(responseText); 
} 
</script>

<body>

<form name="form" id="form" method="post" action="../controller/ProdutoController.class.php?action=salvar">
	<? include_once "menu_topo.inc.php"; ?>
	
	<div id="divconteudo">
		<h1>Produtos</h1>
		<hr>

		<ul>
			<li>Ao voltar, mostrar mensagem (erro,sucesso,etc), com opção para 'inserir novo'</li>
			<li>Validar online os campos (validate)</li>
			<li>Ao clicar no botão submit, trocar o label para 'aguarde' e depois para 'pronto'</li>
			<li>Ao alterar qualquer campo, habilitar novamente o botão salvar</li>
			<li>Simplificar o layout (vide code.google.com|google.com/a/leggos.com.br|gmail.com)</li>
			<li>Tirar os campos id_loja / Desabilitar o campo id_produto</li>
			<li>Substituir o ID pela descrição (criar um método genérico)</li>
			<li>Implementar uma pop-up(ou similar) com a lista de categorias (sem drop)</li>
			<li>Implementar upload de imagens/ Implementar envio de emails</li>
		</ul>
		
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
					<input type="submit" name="salvar" id="salvar" value="Salvar">
				</div>
	
			</div> <!-- end div borda -->
		</div> <!-- end div list -->
	</div> <!-- end div conteudo -->
</form>
</body>		
</html>