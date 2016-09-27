$(document).ready(function(){
	var id_proposal = $('#proposal_id').val();
	
	var rota = domain_complet+'/update';
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

function verify_guarantor(){
	if($("#tipo_fiador1").val() == ""){
		alert('Informe o tipo de Fiador');		
		$("#tipo_fiador1").css("border", "1px solid red");
		$("#tipo_fiador1").focus();
	}
	if($("#primeiro_fiador").val() == ""){
		alert('Informe o Nome do Fiador');		
		$("#primeiro_fiador").css("border", "1px solid red");
		$("#primeiro_fiador").focus();
	}
	if($("#guarantor_email").val() == ""){
		alert('Informe o Nome do Fiador');		
		$("#guarantor_email").css("border", "1px solid red");
		$("#guarantor_email").focus();
	}
	
}

$('#final_proposta').click(function(event) {
		/* Act on the event */

		if($("#tipo_garantia").val() == "Fiador"){ 
			verify_guarantor();
			var type_guarantor1 = $('input[type=radio][name=proposal_guarantor_type]:checked').attr('id');
			var type_guarantor2 = $('input[type=radio][name=proposal_guarantor_type]:checked').attr('id');
			
			if (type_guarantor1 == null)		
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

		}

		$('#modal_reload').modal('show');

		var rota = domain_complet+'/update';
		type_guarantor_one = $('input[type=radio][name=proposal_guarantor_type]:checked').attr('id');

		dados_third = {
			proposal_guarantor_cpf : $('#tipo_fiador1').val(), proposal_guarantor_name : $('#primeiro_fiador').val(), 
			proposal_guarantor_relation : $('#proposal_guarantor_relation').val(), guarantor_email : $('#guarantor_email').val(), 
			proposal_guarantor_type : type_guarantor_one , proposal_guarantor_cpf2 : $('#proposal_guarantor_cpf2').val(), 
			proposal_guarantor_name2 : $('#proposal_guarantor_name2').val(), proposal_guarantor_relation2 : $('#proposal_guarantor_relation2').val(), 
			guarantor_email2 : $('#guarantor_email2').val(), proposal_guarantor_type2 : type_guarantor2, 
			proposal_guarantor_type2 : $('#proposal_guarantor_type2').val(), proposal_occupant_cpf : $('#proposal_occupant_cpf').val(), 
			proposal_occupant_name : $('#proposal_occupant_name').val(), proposal_occupant_email : $('#proposal_occupant_email').val(), 
			proposal_occupant_type : $('#proposal_occupant_type').val(), proposal_occupant_type : $('#proposal_occupant_type').val(), 
			proposal_occupant_cpf2 : $('#proposal_occupant_cpf2').val(), proposal_occupant_name2 : $('#proposal_occupant_name2').val(), 
			proposal_occupant_email2 : $('#proposal_occupant_email2').val(), proposal_occupant_type2 : $('#proposal_occupant_type2').val(), 
			proposal_occupant_type2 : $('#proposal_occupant_type2').val(), _token : $('#token').val(), terceira_pf : 'terceira_pf', proposal_id : id_proposal 
		}		
		
		$.ajax({
			url: rota,
			type: 'POST',
			dataType: 'JSON',
			data: dados_third,
			success: function(data){
				$('#modal_reload').modal('hide');
				location.href = domain_complet+'/beta/proposta-concluida/?msg=sucesso-proposta&email='+data.proposal_email;				
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
			
				location.href = domain_complet+'/beta/proposta-concluida/?msg=cadastro-com-sucesso&email='+data.guarantor_email;
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

