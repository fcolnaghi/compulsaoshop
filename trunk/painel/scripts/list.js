$(function () {
	// Cor das linhas da tabela
	$('table.list tr:odd').addClass('par');
	
	// Mouse hover nas linhas da tabela
	$('table.list tr').hover(
		function(){$(this).addClass('linha_hover');},
		function(){$(this).removeClass('linha_hover');}
	);
    
    $("table.list tr td").click(function(){
    	var _oc = $(this).attr("class");

    	if (_oc!="td_item" && _oc!="table_title" && _oc!="table_subtitle") {
    		var _o = $("td:first > :checkbox", $(this).parent());
    		//alert('editar o item '+ _o.val() );
    		//location.href = "forms_edit.php?item="+ _o.val() ;
    		editar (_o.val());
    	} else {
    		// Atualizar qtd de checks clicados
    		var _qtd = $("input[@type='checkbox']:checked").length;
    		$("#total_registros_selecionados").html(""+ _qtd);
    	}
    });
	
	$('a.marcar_todos').click(function(){
		var _o = $("input[@type='checkbox']");

		$("#total_registros_selecionados").html(_o.size());
		
		_o.each(function() {
			this.checked = true;
		});
		return false;
	});
	$('a.desmarcar_todos').click(function(){
		var _o = $("input[@type='checkbox']");
		
		$("#total_registros_selecionados").html("0");
		
		_o.each(function() {
			this.checked = false;
		});
		return false;
	});
	$('a.marcar_visiveis').click(function(){
	
		$("#total_registros_selecionados").html("%total_registros%");
	
		alert("marcar_visiveis");
		return false;
	});
	$('a.desmarcar_visiveis').click(function(){
		$("#total_registros_selecionados").html("0");
	
		alert("desmarcar_visiveis");
		return false;
	});
});