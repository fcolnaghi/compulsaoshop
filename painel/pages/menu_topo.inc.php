<?
session_start();
header("Content-Type: text/html; charset=iso-8859-1",true);
?>
<div id="topo">
	<div class="logo">
		<table width="100%" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="50%"><img src="../images/logo.gif"></td>
				<td align="right" valign="top"><?=$_SESSION["email"]?> | <a href="../controller/UsuarioController.class.php?action=logoff">Logoff</a></td>
			</tr>
		</table>
	</div>
	
	<ul class="jd_menu">
		<li>Painel
			<ul>
				<li><a href="consultar_mensagens.php">Mensagens</a></li>
				<li><a href="consultar_estatisticas.php">Estatísticas</a></li>
				<li><a href="consultar_resumo_financeiro.php">Resumo financeiro</a></li>
			</ul>
		</li>
		<li>Escrever
			<ul>
				<li><a href="escrever_texto.php">Texto</a></li>
				<li><a href="escrever_pagina.php">Página</a></li>
				<li><a href="escrever_mensagem.php">Mensagem</a></li>
			</ul>
		</li>
		<li>Gerenciar
			<ul>
				<li><a href="consultar_textos.php">Textos</a></li>
				<li><a href="consultar_paginas.php">Páginas</a></li>
				<li><a href="manter_categorias.php">Categorias</a></li>
				<li><a href="consultar_produtos.php">Produtos</a></li>
				<li><a href="consultar_banners.php">Banners</a></li>
				<li><a href="consultar_promocoes.php">Promoções</a></li>
				<li><a href="consultar_newsletter.php">Newsletter</a></li>
				<li><a href="consultar_leiloes.php">Leilões</a></li>
			</ul>
		</li>
		<li>Relatórios
			<ul>
				<li><a href="consultar_pedidos.php">Pedidos</a></li>
				<li><a href="consultar_vendas.php">Vendas</a></li>
				<li><a href="consultar_clientes.php">Clientes</a></li>
			</ul>
		</li>
		<li>Ferramentas
			<ul>
				<li><a href="importar.php">Importar</a></li>
				<li><a href="exportar.php">Exportar</a></li>
				<li><a href="consultar_biblioteca_midia.php">Biblioteca de mídia</a></li>
			</ul>
		</li>
		<li>Configurações
			<ul>
				<li><a href="manter_usuarios.php">Usuários</a></li>
				<li><a href="manter_loja.php">Loja</a></li>
			</ul>
		</li>
		<li>Design
			<ul>
				<li><a href="manter_tema.php">Tema</a></li>
				<li><a href="manter_complementos.php">Complementos</a></li>
				<li><a href="manter_extras.php">Extras</a></li>
				<li><a href="manter_imagem_cabecalho.php">Imagem de cabeçalho</a></li>
				<li><a href="manter_css.php">Editar CSS</a></li>
			</ul>
		</li>
		<li>Melhorias
			<ul>
				<li><a href="css_customizado.php">CSS Customizado</a></li>
				<li><a href="espaco_extra.php">Espaço extra</a></li>
			</ul>
		</li>
	</ul>
</div>