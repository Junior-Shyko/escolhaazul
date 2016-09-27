@include('email.header_email')

<p><b>Prezado(a) {{$guarantor->guarantor_name}} </b>,<br/>

		<p>Seu cadastro foi enviado com sucesso para a Espíndola Imobiliária.
		   (Clique <a href="{{$caminho}}/?action=view-guarantor&id={{base64_encode($guarantor->guarantor_id) }}"> aqui </a> para visualizar ou imprimir a sua ficha cadastral)
		</p>
		<p>Desde já agradecemos a sua atenção.</p>
		<br/>
		<p>Atenciosamente,<br /><img src="{{url('public/img/logo_grande.jpg')}}" /><br/>  </p>
		<br />
		<p>Um solução: <img src="{{url('public/img/logo_pequena.png')}}" /></p>

@include('email.footer_email')