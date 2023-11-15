@include('mails.mail_header')
<?php 
$var = $data['fromName'];
$novo_nome = explode(" ", $var);
?>
<p><b>Prezado(a) {{ $novo_nome[0] }}</b>,</p><br/>
<p>Parabéns, sua proposta foi enviada com sucesso para a Espíndola Imobiliária.
    (Clique <a href="#"> aqui </a>
    para visualizar sua proposta)
</p>
<p>Por último, para iniciarem a análise da sua proposta, efetue o pagamento da caução no valor de R$100,00 (cem reais)
	através de depósito bancário na conta corrente da Espíndola	Imobiliária LTDA, inscrita no CNPJ sob o nº 09.652.345/0001-02, e envie o comprovante para contato@espindola.imb.br.
	Se preferir, poderá pagar diretamente no departamento financeiro da própria imobiliária.
	</p>
    <strong>AGÊNCIA ALDEOTA: </strong>  Conta de nº 126.535-0, agência nº 0564-9 do banco Bradesco; <br>
    <p>O resultado da análise cadastral é enviado em até 02 dias úteis contados a partir da confirmação do seu depósito.</p>
	<p>Aproveitamos para lhe desejar <label style="color: #1b81e7;"><b>BOA SORTE!</b> </label> </p>
	<p>Atenciosamente,<br /><img src="{{asset('img/logo_grande.jpg')}}" /><br/></p>
	<br />
	<p>Uma Solução:<img src="{{asset('img/logo_pequena.png')}}" /></p>

    @include('mails.mail_footer')