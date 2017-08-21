@include('email.header_email')
<img src="{{ url('public/img/titulo-email-imb.png') }}" /><br/>
<img src="{{ url('public/img/forms-imb.png') }}" width="64" heigth="64" />

<h3>Recebido um cadastro de Fiador Pessoa Física!</h3>

<h1>Teste de envio de email em: {{date('d/m/Y H:i:s')}}</h1>
<hr>
<p>
    Para abrir o arquivo da proposta, clique no link acima. Segue em anexo neste e-mail os documentos que o proponente anexou à proposta.
</p>
<hr>
<p>Uma Solução:<img src="{{ url('public/img/logo_pequena.png') }}" /></p>
<br />
@include('email.footer_email')