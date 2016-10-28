@include('email.header_email')
<img src="{{ url('public/img/titulo-email-imb.png') }}" /><br/>
<img src="{{ url('public/img/forms-imb.png') }}" width="64" heigth="64" />

<h3>Recebido um cadastro de Fiador Pessoa Física!</h3>

<p> <a href="{{ $caminho }}/view/report/print_guarantor_adm.php?id={{ base64_encode($guarantor->guarantor_id) }}" target="_blank">Conferir Análise Cadastral </a></p>
<hr>

<p><strong>Fiador: </strong>{{$guarantor->guarantor_name}}</p><br>
<p><strong>DADOS DA PROPOSTA: </strong></p>
<p>NUMERO DA PROPOSTA: {{$guarantor->id_proposal}}</p>
<p>NOME DO PROPONENTE: {{$guarantor->guarantor_name_pretendend}}</p>

<hr>
<p>
    Para abrir o arquivo da proposta, clique no link acima. Segue em anexo neste e-mail os documentos que o proponente anexou à proposta.
</p>
<hr>
<p>Uma Solução:<img src="{{ url('public/img/logo_pequena.png') }}" /></p>
<br />
@include('email.footer_email')