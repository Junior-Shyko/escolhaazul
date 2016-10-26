@include('email.header_email')


@if($type == "Pessoa Física")

	<p><b>Prezado(a)  {{ $nome_fiador }}</b>,<br/>

	<p>O(A) Sr(a). <strong> {{strtoupper($proposal->proposal_name)}} </strong> acabou de fazer uma proposta para a locação de um(a) {{strtoupper($proposal->proposal_type_immobile)}} na Espíndola Imobiliária e lhe indicou como <strong> FIADOR(A) </strong>.</p>
	<p>Neste sentido, solicitamos que preencha o seu cadastro clicando
		<a href="{{url('cadastrar-fiador/'.base64_encode($proposal->proposal_id).'/tipo/pf')}}"> aqui </a> para que possamos dar prosseguimento na locação.</p>

@elseif($type == "Pessoa Jurídica")
	
	<p><b>Prezado(a)  {{ $nome_fiador }}</b>,<br/>

	<p>O(A) Sr(a). <strong> {{strtoupper($proposal->proposal_name)}} </strong> acabou de fazer uma proposta para a locação de um(a) {{strtoupper($proposal->proposal_type_immobile)}} na Espíndola Imobiliária e lhe indicou como <strong> FIADOR(A) </strong>.</p>
	<p>Neste sentido, solicitamos que preencha o seu cadastro clicando
		<a href="http://espindolaimobiliaria.com.br/ea/?action=guarantor-legal&id={{base64_encode($proposal->proposal_id)}}&table=pj&nm={{$proposal->proposal_name}}"> aqui </a> para que possamos dar prosseguimento na locação.</p>
@endif

	<p>Além do cadastro devidamente preenchido, é necessário anexar os documentos digitalizados que comprovem as informações nele fornecidas.
	 (<a href="http://www.espindola.imb.br/#!documentos-necessrios/c1jbm" target="_blank"> Ver </a> relação de documentos).
	</p>
	<p>Desde já agradecemos a sua atenção.</p>
	<br/>
	<p>Atenciosamente,<br /><img src="{{url('/public/img/logo_grande.jpg')}}" /><br/>  </p>
	<br />
	<p>Um solução: <img src="{{url('/public/img/logo_pequena.png')}}" /></p>


	
@include('email.footer_email')