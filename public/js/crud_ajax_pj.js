$(document).ready(function() {
	$("#load_upload_proposal_pj").hide();
	$("#sucesso_upload_proposal_pj").hide();

	var rota = domain_complet;
	
	$("#secound_step_pj").click(function(event) {
		/* Act on the event */
		form_pj_one = $("#form_one_pj").serialize();

		$.ajax({
			url: rota+'/pj/update',
			type: 'POST',
			dataType: 'JSON',
			data: form_pj_one,
			success:function(response){
				console.log('sucesso');
			},
			error   : function (data ) 
	        {
	          $.each( data, function( key, value ) {
	                console.log(value[0]); 
	            });
	            
	        }
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	//ENVIANDO OS DADOS DA SEGUNDA ETAPA (2 FORMULARIO)
	$("#end_step_pj").click(function(event) {
		/* CRIADO EM 2016-09-26 BY JUNIOR OLIVEIRA */
		form_two_pj = $("#form_two_pj").serialize();

		$.ajax({
			url: rota+'/pj/update',
			type: 'POST',
			dataType: 'JSON',
			data: form_two_pj,
			success:function(response){
				console.log('sucesso');
			},
			error   : function (data ) 
	        {
	          $.each( data, function( key, value ) {
	                console.log(value[0]); 
	            });
	            
	        }
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});

function verify_guarantor(){

	if($("#legal_guarantor_cpf_cnpj").val() == ""){
		alert('Informe o tipo de Fiador');		
		$("#legal_guarantor_cpf_cnpj").css("border", "1px solid red");
		$("#legal_guarantor_cpf_cnpj").focus();
	}
	if($("#legal_guarantor_name").val() == ""){
		alert('Informe o Nome do Fiador');		
		$("#legal_guarantor_name").css("border", "1px solid red");
		$("#legal_guarantor_name").focus();
	}
	if($("#legal_guarantor_email").val() == ""){
		alert('Informe o e-mail do Fiador');		
		$("#legal_guarantor_email").css("border", "1px solid red");
		$("#legal_guarantor_email").focus();
	}
	
}	

	$("#final_proposta_pj").click(function(event) {
		/* INSERINDO OS VALORES DA SEGUNDA ETAPA */
		//$("#modal_reload").modal('show');

		if($("#tipo_garantia").val() == "Fiador"){ 
			verify_guarantor();
			var type_guarantor1 = $('input[type=radio][name=legal_guarantor_type]:checked').attr('id');
			var type_guarantor2 = $('input[type=radio][name=legal_guarantor_type2]:checked').attr('id');
			
			if (type_guarantor1 == null)		
			{
				alert('Informe como será a forma que o Fiador receberá a notificação');
				$("#info_not_fiador1").removeClass('alert-success');
				$("#info_not_fiador1").addClass('alert-danger');
				
			}else{
				$("#info_not_fiador1").removeClass('alert-danger');
				$("#info_not_fiador1").addClass('alert-success');
			}
			}else{

				$('#modal_reload').modal('show');

			}

		form_tree_pj = $("#form_tree_pj").serialize();
		$.ajax({
			url: rota+'/pj/update',
			type: 'POST',
			dataType: 'JSON',
			data: form_tree_pj,
			success:function(response){
				console.log('sucesso');
				// setTimeout(function() {
				// 	$('#modal_reload').fadeOut('fast');
				// }, 5000);
				//location.href= rota+"pj/sucesso-proposta/tipo/pj/email/"+response.legal_location_email;
			},
			error   : function (data ) 
	        {
	          $.each( data, function( key, value ) {
	                console.log(value[0]); 
	            });
	            
	        }
		})
		.done(function() {
			console.log("success");
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
	});

	$("#send_files_proposal_pj").click(function(event) {
		/* Act on the event */
		console.log("pj: "+rota);
		$("#form_proposal_pj").ajaxForm({
			url: rota+'/pj/upload', 
			resetForm: true,
			type: 'POST',
			dataType: 'json',
			success : function(data){

		 		$('#load_upload_proposal_pj').hide();
		 		$('#sucesso_upload_proposal_pj').show();
		 		setTimeout(function() {
					$('#sucesso_upload_proposal_pj').fadeOut('fast');
				}, 2000);

		 	},
		 	error: function(data){
			$.each(data, function(index, val) {
				 /* iterate through array or object */
				 console.log('error' + val);
			});
		}
		}).submit();
	});
});