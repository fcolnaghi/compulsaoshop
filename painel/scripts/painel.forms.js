$(document).ready(function() {

//    var options = { 
//		beforeSubmit:  showRequest, 
//      success:       showResponse 
//    };

//	// Se passar da valida��o, cai aqui e submete o formul�rio (action padr�o)
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

// Essa fun��o � chamada automaticamente, antes do formul�rio ser enviado
function showRequest(formData, jqForm, options) { 
//	var queryString = $.param(formData); 
//	var formElement = jqForm[0]; 
//	alert('About to submit: \n\n' + queryString); 

	// Prepara os dados do tinyMCE
//	tinyMCE.triggerSave();
 
 	$("#salvar").attr("disabled","disabled").val("Aguarde...");
 
    return true; 
} 

// Essa fun��o � chamada automaticamente, ap�s o formul�rio ser enviado 
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