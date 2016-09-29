@include('email.header_email')
	
<?php 
	$var = $proposal->proposal_name;
	$nome = explode(" ", $var);
?>
<p><b>Prezado(a) {{ $nome[0] }}</b>,</p><br/>


	<p>Parabéns, sua proposta foi enviada com sucesso para a Espíndola Imobiliária.
	(Clique <a href="{{$caminho}}/?action=view-proposal&id={{base64_encode($proposal->proposal_id)}}"> aqui </a>
	 para visualizar sua proposta)</p>
	 <p>O próximo passo é cadastrar ou aguardar o cadastro das seguintes pessoas:</p>

@if (!empty($proposal->guarantor_email))
	 <strong>{{ $proposal->proposal_guarantor_name}}</strong> - FIADOR(A)	
	 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
	 	@if($proposal->proposal_guarantor_type == "cadastrar_fiador")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->proposal_guarantor_cpf == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id) )}}"> Cadastrar </a>
	 		{{-- @else
	 			<a href="{{url('cadastrar-fiador/pj/proposta-id/'.base64_encode($proposal->proposal_id) )}}"> Cadastrar </a> --}}
	 		@endif
	 		
	 	@elseif($proposal->proposal_guarantor_type == "enviar_fiador")

	 		@if($proposal->proposal_guarantor_cpf == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id) )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="{{url('cadastrar-fiador/pj/proposta-id/'.base64_encode($proposal->proposal_id) )}}"> Alterar </a>
				para você cadastrar)  </small> <br>
	 		@endif

			
	 	@endif
	 
@endif	
<br>
@if (!empty($proposal->guarantor_email2))
	<strong>{{ $proposal->proposal_guarantor_name2 }}</strong> - FIADOR(A)	
	 	{{-- VERIFICANDO SE FOI PARA SER CADASTRADO OU FOI ENVIADO PARA O FIADOR --}}
	 	@if($proposal->proposal_guarantor_type2 == "cadastrar_fiador2")
	 		{{-- VERIFICANDO SE É PARA CADASTRAR PARA ENVIAR O LINK DE DE PF OU PJ --}}
	 		@if($proposal->proposal_guarantor_cpf2 == "Pessoa Física")
	 			<a href="{{url('cadastrar-fiador/pf/proposta-id/'.base64_encode($proposal->proposal_id) )}}"> Cadastrar </a>
	 		@else
	 			<a href="{{url('cadastrar-fiador/pj/proposta-id/'.base64_encode($proposal->proposal_id) )}}"> Cadastrar </a>
	 		@endif
	 		
	 	@elseif($proposal->proposal_guarantor_type2 == "enviar_fiador2")

	 		@if($proposal->proposal_guarantor_cpf2 == "Pessoa Física")
	 			<small>Aguardando cadastro ( ou
				<a href="{{$caminho}}/?action=guarantor&id={{base64_encode($proposal->proposal_id)}}&nm={{$proposal->proposal_guarantor_name2}}&type=ZmlhZG9y&table=pj&proponent=physical"> alterar </a>
				para você cadastrar)  </small> <br>
	 		@else
	 			<small>Aguardando cadastro ( ou
				<a href="{{$caminho}}/?action=guarantor&id={{base64_encode($proposal->proposal_id)}}&nm={{$proposal->proposal_guarantor_name2}}&type=ZmlhZG9y&table=pj&proponent=legal"> alterar </a>
				para você cadastrar)  </small> <br>
	 		@endif

			
	 	@endif
@endif	
<br>
@if (!empty($proposal->proposal_occupant_email))
	<strong>{{ $proposal->proposal_occupant_name }}</strong> - FIADOR(A)
	<small>Aguardando cadastro ( ou
	<a href="'.$caminho.'/?action=guarantor&id='.$id_cryp.'&nm='.$guarantor[0].'&type=ZmlhZG9y&table=pj&proponent=physical"> alterar </a>
	para você cadastrar)  </small>
	 <br> 
@endif	
@if (!empty($proposal->proposal_occupant_email2))
	<strong>{{ $proposal->proposal_occupant_name2 }}</strong> - FIADOR(A)
    <small>Aguardando cadastro ( ou
	<a href="'.$caminho.'/?action=guarantor&id='.$id_cryp.'&nm='.$guarantor[0].'&type=ZmlhZG9y&table=pj&proponent=physical"> alterar </a>
	para você cadastrar)  </small>
	<br> 
@endif	

	<p>Por último, para iniciarem a análise da sua proposta, efetue o pagamento da caução no valor de R$100,00 (cem reais)
	através de depósito bancário na conta corrente de nº 126.535-0, agência nº 0564-9 do banco Bradesco, da Espíndola
	Imobiliária LTDA., inscrita no CNPJ sob o nº 09.652.345/0001-02, e envie o comprovante para contato@espindola.imb.br.
	Se preferir, poderá pagar diretamente no departamento financeiro da própria imobiliária.
	</p>
	<p>O resultado da análise cadastral é enviado em até 02 dias úteis contados a partir da confirmação do seu depósito.</p>
	<p>Aproveitamos para lhe desejar <label style="color: #1b81e7;"><b>BOA SORTE!</b> </label> </p>
	<p>Atenciosamente,<br /><img src="{{url('img/logo_grande.jpg')}}" /><br/></p>
	<br />
	<p>Uma Solução:<img src="{{url('img/logo_pequena.png')}}" /></p>
@include('email.footer_email')