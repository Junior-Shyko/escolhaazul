@include('email.header_email')
<img src="{{ url('public/img/titulo-email-imb.png') }}" /><br/>
<img src="{{ url('public/img/forms-imb.png') }}" width="64" heigth="64" />
<label>Enviada uma
<a href="{{ $caminho }}/?action=view-proposal&id={{ base64_encode($proposal->proposal_id) }}" >Proposta de Locação Pessoa Física!</a> Conferir!
</label>
<p> <a href="{{ $caminho }}/view/report/proposal_pf_adm.php?id={{ base64_encode($proposal->proposal_id) }}" target="_blank">Conferir Análise Cadastral </a></p>
<hr>
<p><strong>Proponente: </strong>{{ $proposal->proposal_name }}</p>
<br>
<p><strong>Dados da Locação: </strong></p>
<p>ENDEREÇO OU CÓDIGO DO IMÓVEL: {{ $proposal->proposal_reference }}</p>
<p>TIPO DO IMÓVEL: {{ $proposal->proposal_type_immobile }}</p>
<p>FINALIZADE: {{ $proposal->proposal_finality }}</p>
<p>PRAZO DO CONTRATO: {{ $proposal->proposal_time_contract }} meses</p>
<p>TIPO DE GARANTIA: {{ $proposal->proposal_type_guarantee }}'</p>
<p>ALUGUEL PROPOSTO: R$ {{ $proposal->proposal_rent_proposed }}</p>
<p>OBSERVAÇÕES: {{ $proposal->proposal_ps }}</p>
<hr>
<p>
    Para abrir o arquivo da proposta, clique no link acima. Segue em anexo neste e-mail os documentos que o proponente anexou à proposta.
</p>
<hr>
<p>Uma Solução:<img src="{{ url('public/img/logo_pequena.png') }}" /></p>
<br />
@include('email.footer_email')