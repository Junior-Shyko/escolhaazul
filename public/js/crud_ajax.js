$(document).ready(function(){
	var id_proposal = $('#proposal_id').val();
	
	var rota = domain_complet+'/update';
	var rota_success = domain_complet+'/escolhaazul';
	//var rota = window.location.origin + project_survey;
		
	//CLICK DA PRIMEIRA ETAPA PARA A SEGUNDA ETAPA
	$('#segunda_etapa').click(function(event) {
		
		var form_primeira = $("#form_one").serialize();
		
		$.ajax({
			url: rota,
			type: 'POST',
			dataType: 'JSON',
			data: form_primeira,
			success:function(response){
				console.log(response);
			},
			error   : function (data ) 
	        {
	          $.each( data, function( key, value ) {
	                console.log(value[0]); 
	            });	            
	        }
		});

	});

	$('#end_step').click(function(event) {
		/* Act on the event */
		form_segunda = $("#form_two").serialize();		
		$.ajax({
			url: rota,
			type: 'POST',
			dataType: 'JSON',
			data: form_segunda,
			success:function(response){
				console.log('sucesso');
				$("#modal_load").hide();
			},
			error   : function (data ) 
	        {
	          $.each( data, function( key, value ) {
	                console.log(value[0]); 
	            });
	            
	        }
		});
	
	});

// FUNCAO PARA VERIFICAR SE A ESCOLHA DA GARANTIA FOI FIADOR
function verify_guarantor(){

	if($("#tipo_fiador1").val() == "" || $("#tipo_fiador1").val() == "Não Informado"  ){
		alert('Informe o tipo de Fiador');		
		$("#tipo_fiador1").css("border", "1px solid red");
		$("#tipo_fiador1").focus();
		$('#modal_reload').modal('hide');
		return false;
	}
	if($("#primeiro_fiador").val() == ""){
		alert('Informe o Nome do Fiador');		
		$("#primeiro_fiador").css("border", "1px solid red");
		$("#primeiro_fiador").focus();
		$('#modal_reload').modal('hide');
		return false;
	}
	if($("#guarantor_email").val() == ""){
		alert('Informe o E-mail do Fiador');		
		$("#guarantor_email").css("border", "1px solid red");
		$("#guarantor_email").focus();
		$('#modal_reload').modal('hide');
		return false;
	}
	
	return "success";
}

$('#final_proposta').click(function(event) {
	
	
		/* Act on the event */
		
		 if($("#tipo_garantia").val() == "Fiador"){ 
			verif = verify_guarantor();
			
			var type_guarantor1 = $('input[type=radio][name=proposal_guarantor_type]:checked').attr('id');
			var type_guarantor2 = $('input[type=radio][name=proposal_guarantor_type]:checked').attr('id');
			
			if (type_guarantor1 == undefined)		
			{
				alert('Informe como será a forma que o Fiador receberá a notificação');
				$("#info_not_fiador1").removeClass('alert-success');
				$("#info_not_fiador1").addClass('alert-danger');
				
			}else{
				$("#info_not_fiador1").removeClass('alert-danger');
				$("#info_not_fiador1").addClass('alert-success');
			}
		
		}else if($("#tipo_garantia").val() != "Fiador"){

			$('#modal_reload').modal('show');
			$('#button-final-load').show();
			

		}

		guarantor = verify_guarantor();
		if(guarantor == "success"){
			$("#pri_click").hide();
			$('#sec_click').show();
			form_terceira = $("#form_tree").serialize();	
			console.log("dominio completo: "+domain_complet);
			var rota = domain_complet+'/update';
			var rota_dom = domain_complet;
			type_guarantor_one = $('input[type=radio][name=proposal_guarantor_type]:checked').attr('id');
			
			$.ajax({
				url: rota,
				type: 'POST',
				dataType: 'JSON',
				data: form_terceira,
				success: function(data){
					
					location.href = rota_dom+'/proposta-concluida?msg=sucesso-proposta&email='+data.proposal_email;				
				}
			})
			.done(function() {
				console.log("success");
				$('#modal_reload').modal('hide');
			})
			.fail(function() {
				console.log("error");
				$('#modal_reload').modal('hide');
			})
			.always(function() {
				console.log("complete-etapa-final");
				$('#modal_reload').modal('hide');
			});
		}	
		
		
	});

	/*CRUD PARA PARTE DO FIADOR*/
	$("#guarantor_two_step").click(function(event) {
		/* Created in 2016-09-23 15:21 by Junior Oliveira */


		form_guarantor_one = $("#form_guarantor_one").serialize();		
		$.ajax({
			url: domain_complet+'/update-fiador',
			type: 'POST',
			dataType: 'JSON',
			data: form_guarantor_one,
			success:function(response){
				console.log('sucesso');
				
			},
			error   : function (data ) 
	        {
	          $.each( data, function( key, value ) {
	                console.log(value[0]); 
	            });
	            
	        }
		});
	});
	//SEGUNDA PARTE DO CADASTRO DO FIADOR
	$("#final_proposta_fiador").click(function(event) {
		/* Created in 2016-09-24 19:37 by Junior Oliveira */
		$('#modal_reload').modal('show');
		form_guarantor_two = $("#form_guarantor_two").serialize();		
		$.ajax({
			url: domain_complet+'/update-fiador',
			type: 'POST',
			dataType: 'JSON',
			data: form_guarantor_two,
			success: function(data){
			
				location.href = rota_success+'/proposta-concluida/?msg=cadastro-com-sucesso&email='+data.guarantor_email;
			},
			error   : function (data ) 
	        {
	          $.each( data, function( key, value ) {
	                console.log(value[0]); 
	            });
	            
	        }
		});
	});



});//fim documente ready

