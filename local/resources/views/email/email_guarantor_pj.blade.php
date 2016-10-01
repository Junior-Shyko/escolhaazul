{{-- ESSE EMAIL SERÁ DISPARADO PARA FIADOR PESSOA FÍSICA --}}

@include('email.header_email')
<?php 
	$var = $nome_fiador;
	$nome = explode(" ", $var);
	$novo_nome = strtoupper($nome[0]);

?>

	<p><b>Prezado(a)  {{ $novo_nome }}</b>,<br/>

	<p>O(A) Sr(a). <strong> {{strtoupper($proposal->legal_location_name_corporation)}} </strong> acabou de fazer uma proposta para a locação de um(a) {{strtoupper($proposal->legal_location_type_immobile)}} na Espíndola Imobiliária e lhe indicou como <strong> FIADOR(A) </strong>.</p>
	<p>Neste sentido, solicitamos que preencha o seu cadastro clicando
		<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->legal_id).'/tipo/pj')}}"> aqui </a> para que possamos dar prosseguimento na locação.</p>

	<p>Além do cadastro devidamente preenchido, é necessário anexar os documentos digitalizados que comprovem as informações nele fornecidas.
	 (<a href="http://www.espindola.imb.br/#!documentos-necessrios/c1jbm" target="_blank"> Ver </a> relação de documentos).
	</p>
	<p>Desde já agradecemos a sua atenção.</p>
	<br/>
	<p>Atenciosamente,<br /><img src="{{url('/img/logo_grande.jpg')}}" /><br/>  </p>
	<br />
	<p>Um solução: <img src="{{url('/img/logo_pequena.png')}}" /></p>';


	
@include('email.footer_email')