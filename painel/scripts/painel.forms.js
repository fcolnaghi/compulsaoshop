$(document).ready(function() {

//    var options = { 
//		beforeSubmit:  showRequest, 
//      success:       showResponse 
//    };

//	// Se passar da validação, cai aqui e submete o formulário (action padrão)
//	$.validator.setDefaults({
//		submitHandler: function() {
//			//$("#form").ajaxSubmit(options);
//	
//			return false;
//		}
//	});
    
    $("input,textarea").keyup(function (){
    	$("#salvar").attr("disabled","").val("Salvar");
    });
    
    $("input,textarea").change(function (){
    	$("#salvar").attr("disabled","").val("Salvar");
    });
}); 

// Essa função é chamada automaticamente, antes do formulário ser enviado
function showRequest(formData, jqForm, options) { 
//	var queryString = $.param(formData); 
//	var formElement = jqForm[0]; 
//	alert('About to submit: \n\n' + queryString); 

	// Prepara os dados do tinyMCE
//	tinyMCE.triggerSave();
 
 	$("#salvar").attr("disabled","disabled").val("Aguarde...");
 
    return true; 
} 

// Essa função é chamada automaticamente, após o formulário ser enviado 
function showResponse(responseText, statusText)  { 
	// Remove as mensagens anteriores
	if ($("#exception").size() > 0) {
		$("#exception").remove();
	}
	
	// Cria uma nova mensagem
	$("#divlist").prepend(responseText);
	
	//$("#salvar").attr("disabled","").val("Salvar"); 
	$("#salvar").val("Salvar");
}