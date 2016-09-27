@extends('layouts.layout_proposal')

@section('content')

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			
			<div class="jumbotron">
			@if(isset($_GET['msg']) && ($_GET['msg'] == 'sucesso-proposta'))
				@include('msg.success_proposal')
			@endif	
			
			@if(isset($_GET['msg']) && ($_GET['msg'] == 'sucesso-proposta'))
			<div class="alert">
				<p>
				Enviamos uma cópia para o e-mail <a href="#">{{$_GET['email']}}</a> com mais informações sobre o processo de locação e com os links
				 para dar prosseguimento no cadastro do inquilino adicional e/ou fiador, dependendo da opção selecionada. No e-mail
				 informamos, também, a conta da <b>Espíndola Imobiliária</b> no <b>Bradesco</b> para depósito da <b>caução</b>, porém você 
				 também poderá fazer o pagamento através de <b>cartão de crédito </b>clicando no botão abaixo do Pag Seguro. 
				</p>
				<p>
				<!-- INICIO FORMULARIO BOTAO PAGSEGURO -->
				<form action="https://pagseguro.uol.com.br/checkout/v2/cart.html?action=add" method="post" onsubmit="PagSeguroLightbox(this); return false;" style="float: right;">
				<!-- NÃO EDITE OS COMANDOS DAS LINHAS ABAIXO -->
				<input type="hidden" name="itemCode" value="8F012F51EDED199DD4C57FA2B3393077" />
				<input type="image" src="https://p.simg.uol.com.br/out/pagseguro/i/botoes/pagamentos/209x48-pagar-laranja-assina.gif" name="submit" alt="Pague com PagSeguro - é rápido, grátis e seguro!" />
				</form>
				<script type="text/javascript" src="https://stc.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.lightbox.js"></script>
				<!-- FINAL FORMULARIO BOTAO PAGSEGURO -->
				<br/>
				</p>

				<p>
				<br/>
				O resultado da sua proposta será informado em até 02 dias úteis após a confirmação do pagamento da caução e do recebimento dos 
				cadastros adicionais (se houver).
				</p>

				<p><br/><strong>Boa sorte! Esperamos tê-lo como inquilino em breve. </strong></p>

				<p><br/><strong>Equipe Espíndola Imobiliária.</strong></p>
			</div>
			@endif

			@if(isset($_GET['msg']) && ($_GET['msg'] == 'cadastro-com-sucesso'))
			@include('msg.success_proposal')
				<p>Seu cadastro foi enviado com sucesso para a Espíndola Imobiliária.
				   Em breve você receberá um e-mail para visualizar e/ou imprimir sua ficha cadastral se desejar.
				</p>
				<p><br/><strong>Desde já agradecemos sua atenção! </strong></p>

				<p><br/><strong>Equipe Espíndola Imobiliária.</strong></p>
			@endif

				<p>
					<a class="btn btn-primary btn-large" href="{{url('/')}}">Nova Proposta</a>
				</p>
				<p>
					<a class="btn btn-primary btn-large" href="http://www.espindola.imb.br/"><i class="fa fa-home"></i> Home </a>
				</p>
		</div>
	</div>
</div>
</div>
@endsection