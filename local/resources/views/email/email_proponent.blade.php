@include('email.header_email')
	
<?php 
 	if($type == "Pessoa Física")
	{
	 
	  $nome = $proposal->proposal_name;
	}   
	elseif($type == "Pessoa Jurídica")
	{
	
	  $nome = $proposal->legal_location_name_corporation;
	}      

	$var = $nome;
	$novo_nome = explode(" ", $var);
?>

<p><b>Prezado(a) {{ $novo_nome[0] }}</b>,</p><br/>
@if($type == "Pessoa Física")
	<p>Parabéns, sua proposta foi enviada com sucesso para a Espíndola Imobiliária.
		(Clique <a href="{{$caminho}}/?action=view-proposal&id={{base64_encode($proposal->proposal_id)}}"> aqui </a>
		para visualizar sua proposta)
	</p>

	@if (!empty($proposal->guarantor_email))
		<p>O próximo passo é cadastrar ou aguardar o cadastro das seguintes pessoas:</p>

	 	<strong>{{ $proposal->proposal_guarantor_name}}</strong> - FIADOR(A)	
	 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
		@if($proposal->proposal_guarantor_type == "cadastrar_fiador")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->proposal_guarantor_cpf == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf' )}}"> Cadastrar </a>
	 		{{-- @else
	 			<a href="{{url('cadastrar-fiador/pj/proposta-id/'.base64_encode($proposal->proposal_id) )}}"> Cadastrar </a> --}}
	 		@endif
	 		
	 	@elseif($proposal->proposal_guarantor_type == "enviar_fiador")

	 		@if($proposal->proposal_guarantor_cpf == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf' )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/pj/proposta-id/'.base64_encode($proposal->proposal_id) )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@endif			
	 	
	 	@endif

	@endif {{-- FIM IF EMAIL FIADOR --}}

<br>

	@if (!empty($proposal->guarantor_email2))
		
	 	<strong>{{ $proposal->proposal_guarantor_name2}}</strong> - FIADOR(A)	
	 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
		@if($proposal->proposal_guarantor_type2 == "cadastrar_fiador2")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->proposal_guarantor_cpf2 == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf' )}}"> Cadastrar </a>
	 		@else
	 			<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> Cadastrar </a>
	 		@endif
	 		
	 	@elseif($proposal->proposal_guarantor_type2 == "enviar_fiador2")

	 		@if($proposal->proposal_guarantor_cpf2 == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf' )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> Alterar </a> para você cadastrar)  </small> <br>
	 		@endif			
	 	
	 	@endif

	@endif {{-- FIM IF EMAIL FIADOR 2 --}}

<br>

	@if (!empty($proposal->proposal_occupant_email))
		
	 	<strong>{{ $proposal->proposal_guarantor_name2}}</strong> - FIADOR(A)	
	 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
		@if($proposal->proposal_occupant_type == "Cadastrar_locatario")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->proposal_occupant_cpf == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf' )}}"> Cadastrar </a>
	 		@else
	 			<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> Cadastrar </a>
	 		@endif
	 		
	 	@elseif($proposal->proposal_occupant_type == "Enviar_locatario")

	 		@if($proposal->proposal_occupant_cpf == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf' )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> Alterar </a> para você cadastrar)  </small> <br>
	 		@endif			
	 	
	 	@endif

	@endif {{-- FIM IF EMAIL LOCATPARIO 01 --}}

<br>

	@if (!empty($proposal->proposal_occupant_email2))
		
	 	<strong>{{ $proposal->proposal_occupant_name2}}</strong> - FIADOR(A)	
	 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
		@if($proposal->proposal_occupant_type2 == "Cadastrar_locatario2")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->proposal_occupant_cpf2 == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf' )}}"> Cadastrar </a>
	 		@else
	 			<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> Cadastrar </a>
	 		@endif
	 		
	 	@elseif($proposal->proposal_occupant_type2 == "Enviar_locatario2")

	 		@if($proposal->proposal_occupant_cpf2 == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf' )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> Alterar </a> para você cadastrar)  </small> <br>
	 		@endif			
	 	
	 	@endif

	@endif {{-- FIM IF EMAIL LOCATPARIO 01 --}}

@elseif($type == "Pessoa Jurídica")
	
	<p>Parabéns, sua proposta foi enviada com sucesso para a Espíndola Imobiliária.
		(Clique <a href="{{$caminho}}/?action=view-legal&id={{base64_encode($proposal->legal_id)}}"> aqui </a>
		para visualizar sua proposta)
	</p>
	@if (!empty($proposal->legal_guarantor_email))
		<p>O próximo passo é cadastrar ou aguardar o cadastro das seguintes pessoas:</p>
		<strong>{{ $proposal->legal_guarantor_name}}</strong> - FIADOR(A)	
		 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
		@if($proposal->legal_guarantor_type == "cadastrar_fiador")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->legal_guarantor_cpf_cnpj == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj' )}}"> Cadastrar </a>
	 		@else
	 			<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> Cadastrar </a>
	 		@endif
	 		
		@elseif($proposal->legal_guarantor_type == "enviar_fiador")

	 		@if($proposal->legal_guarantor_cpf_cnpj == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj'  )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@endif				
		 @endif

	@endif

	@if (!empty($proposal->legal_guarantor_email2))
		
	 	<strong>{{ $proposal->legal_guarantor_name2}}</strong> - FIADOR(A)	
	 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
	 	@if($proposal->legal_guarantor_type2 == "cadastrar_fiador2")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->legal_guarantor_cpf_cnpj2 == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj' )}}"> Cadastrar </a>
	 		
	 		@endif
	 		
		@elseif($proposal->legal_guarantor_type2 == "enviar_fiador2")

	 		@if($proposal->legal_guarantor_cpf_cnpj2 == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj'  )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj'  )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@endif
	 	@endif				
	@endif {{-- FIM EMAIL FIADOR 2 --}}

	{{-- PRIMEIRO LOCATÁRIO SE EXISTIR --}}
	@if (!empty($proposal->legal_occupant_email))
		@if($proposal->legal_occupant_type == "Cadastrar_locatario")
		 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
		 		@if($proposal->legal_occupant_cpf == "Pessoa Física")
		 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj' )}}"> Cadastrar </a>
		 		{{-- @else
		 			<a href="{{url('cadastrar-fiador/pj/proposta-id/'.base64_encode($proposal->proposal_id) )}}"> Cadastrar </a> --}}
		 		@endif
		 		
		@elseif($proposal->legal_occupant_type == "Enviar_locatario")

		 		@if($proposal->legal_occupant_cpf == "Pessoa Física")
		 			<small>Aguardando cadastro ( ou
					<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj'  )}}"> Alterar </a>
					para você cadastrar)  </small> <br>
		 		@else
		 			<small>Aguardando cadastro ( ou
					<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj'  )}}"> Alterar </a>
					para você cadastrar)  </small> <br>
		 		@endif				
		@endif
	@endif

	{{-- SEGUNDO LOCATÁRIO SE EXISTIR --}}
	@if (!empty($proposal->legal_occupant_email2))
		<strong>{{ $proposal->legal_occupant_name2}}</strong> - FIADOR(A)	
	 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
	 	@if($proposal->legal_occupant_type2 == "Cadastrar_locatario2")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->legal_occupant_cpf2 == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj' )}}"> Cadastrar </a>
	 		{{-- @else
	 			<a href="{{url('cadastrar-fiador/pj/proposta-id/'.base64_encode($proposal->proposal_id) )}}"> Cadastrar </a> --}}
	 		@endif
	 		
		@elseif($proposal->legal_occupant_type2 == "Enviar_locatario2")

	 		@if($proposal->legal_occupant_cpf2 == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj'  )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj'  )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@endif	
	 					
		@endif
	@endif


@endif

<br>
	

	<p>Por último, para iniciarem a análise da sua proposta, efetue o pagamento da caução no valor de R$100,00 (cem reais)
	através de depósito bancário na conta corrente de nº 126.535-0, agência nº 0564-9 do banco Bradesco, da Espíndola
	Imobiliária LTDA., inscrita no CNPJ sob o nº 09.652.345/0001-02, e envie o comprovante para contato@espindola.imb.br.
	Se preferir, poderá pagar diretamente no departamento financeiro da própria imobiliária.
	</p>
	<p>O resultado da análise cadastral é enviado em até 02 dias úteis contados a partir da confirmação do seu depósito.</p>
	<p>Aproveitamos para lhe desejar <label style="color: #1b81e7;"><b>BOA SORTE!</b> </label> </p>
	<p>Atenciosamente,<br /><img src="{{url('public/img/logo_grande.jpg')}}" /><br/></p>
	<br />
	<p>Uma Solução:<img src="{{url('public/img/logo_pequena.png')}}" /></p>
@include('email.footer_email')