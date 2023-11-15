@include('mails.mail_header')

<p><b>Prezado(a)  {{  $data['fromName'] }}</b>,<br/>

<p>O(A) Sr(a). <strong> {{strtoupper($data['user']['name'])}} </strong> 
    acabou de fazer uma proposta para a locação de um imóvel na Espíndola Imobiliária e lhe indicou como 
    <strong> FIADOR(A) </strong>.</p>
<p>Neste sentido, solicitamos que preencha o seu cadastro clicando
    <a href="{{url('/')}}"> aqui </a> para que possamos dar prosseguimento na locação.</p>
    <br />

	<p>Além do cadastro devidamente preenchido, é necessário anexar os documentos digitalizados que comprovem as informações nele fornecidas.
        (<a href="https://espindola.zendesk.com/hc/pt-br/articles/230154127-Qual-documenta%C3%A7%C3%A3o-preciso-apresentar-" target="_blank"> Ver </a> relação de documentos).
       </p>
       <p>Desde já agradecemos a sua atenção.</p>
       <br/>
       <p>Atenciosamente,<br /><img src="{{asset('img/logo_grande.jpg')}}" /><br/>  </p>
       <br />
       <p>Um solução: <img src="https://espindolaimobiliaria.com.br/escolhaazul/public/img/logo_pequena.png" /></p>
   


@include('mails.mail_footer')