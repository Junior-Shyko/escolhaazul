$(document).ready(function() {
	$("#load_upload_proposal_pj").hide();
	$("#sucesso_upload_proposal_pj").hide();

	var rota = domain_complet;
	
	//DADOS DA PRIMEIRA ETAPA, PARTINDO PARA SEGUNDA
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

	$("#end_step_pj").click(function(event) {
		/* Act on the event */
		form_pj_two = $("#form_two_pj").serialize();

		$.ajax({
			url: domain_complet+'/pj/update',
			type: 'POST',
			dataType: 'JSON',
			data: form_pj_two,
			success:function(response){
				console.log('sucesso-pj-segunda-etapa');
			},
			error   : function (data ) 
	        {
	          $.each( data, function( key, value ) {
	                console.log(value[key]); 
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

	$("#final_proposta_pj").click(function(event) {
		/* INSERINDO OS VALORES DA SEGUNDA ETAPA */
		$("#modal_reload").modal('show');

		dados_end_step = {
			legal_guarantor_cpf_cnpj : $("#legal_guarantor_cpf_cnpj").val(),
			legal_guarantor_name : $("#legal_guarantor_name").val(),
			legal_guarantor_relation : $("#legal_guarantor_relation").val(),
			legal_guarantor_email : $("#legal_guarantor_email").val(),
			legal_guarantor_type : $("#legal_guarantor_type").val(),
			legal_guarantor_type : $("#legal_guarantor_type").val(),
			legal_guarantor_cpf_cnpj2 : $("#legal_guarantor_cpf_cnpj2").val(),
			legal_guarantor_name2 : $("#legal_guarantor_name2").val(),
			legal_guarantor_relation2 : $("#legal_guarantor_relation2").val(),
			legal_guarantor_email2 : $("#legal_guarantor_email2").val(),
			legal_guarantor_type2 : $("#legal_guarantor_type2").val(),
			legal_guarantor_type2 : $("#legal_guarantor_type2").val(),
			legal_occupant_cpf : $("#legal_occupant_cpf").val(),
			legal_occupant_name : $("#legal_occupant_name").val(),
			legal_occupant_email : $("#legal_occupant_email").val(),
			legal_occupant_type : $("#legal_occupant_type").val(),
			legal_occupant_cpf2 : $("#legal_occupant_cpf2").val(),
			legal_occupant_name2 : $("#legal_occupant_name2").val(),
			legal_occupant_type2 : $("#legal_occupant_type2").val(),
			legal_occupant_type2 : $("#legal_occupant_type2").val(),
			_token : $("#token_pj_thrid").val(),
			legal_id : $("#id_legal").val(),
			terceira_pj : $("#terceira_pj").val()

		};

		$.ajax({
			url: rota+'/pj/update',
			type: 'POST',
			dataType: 'JSON',
			data: dados_end_step,
			success:function(response){
				console.log('sucesso');
				setTimeout(function() {
					$('#modal_reload').fadeOut('fast');
				}, 5000);
				location.href= rota+"pj/sucesso-proposta/tipo/pj/email/"+response.legal_location_email;
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