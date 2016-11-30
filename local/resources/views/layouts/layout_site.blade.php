<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <!-- Basic Page Needs
            ================================================== -->
        <meta charset="utf-8">
        <!--[if IE]>
        <meta http-equiv="x-ua-compatible" content="IE=9" />
        <![endif]-->
        <meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>
        <title>Escolha Azul</title>
        <meta name="description" content="Escolha Azul é uma aplicação para alugar o seu imóvel sem sair de sua casa, escolha o imóvel, envie seus documentos e receba todas notificações via e-mail.">
        <meta name="keywords" content="Escolha Azul, Proposta imobilaria, Alugaemfortaleza, Cadastro de Fiador, Cadastro positivo, Alugue em casa, Locatario adicional, inquilino, fortaleza, ceara, Espindola imobiliaria">
        <meta name="author" content="excellencesoft.com.br">
        <!-- Favicon  
            ================================================== -->
        <link rel="shortcut icon" href="http://espindolaimobiliaria.com.br/escolhaazul/view/static/img/mao_ea.jpg" type="image/x-icon">
        <link rel="apple-touch-icon" href="http://espindolaimobiliaria.com.br/escolhaazul/view/static/img/mao_ea.jpg">
        <link rel="apple-touch-icon" sizes="72x72" href="http://espindolaimobiliaria.com.br/escolhaazul/view/static/img/mao_ea.jpg">
        <link rel="apple-touch-icon" sizes="114x114" href="http://espindolaimobiliaria.com.br/escolhaazul/view/static/img/mao_ea.jpg">
        <link rel="icon" type="image/png" href="{{ url('public/img/favicon.png') }}" />
        <!-- Bootstrap -->
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="{{url('public/css/bootstrap.min.css')}}">
        <!-- Optional theme -->
        <link rel="stylesheet" href="{{url('public/css/font-awesome.min.css')}}">
        <!-- Slider
            ================================================== -->
        <link href="{{url('public/css/owl.carousel.css')}}" rel="stylesheet" media="screen">
        <link href="{{url('public/css/owl.theme.css')}}" rel="stylesheet" media="screen">
        <!-- Stylesheet
            ================================================== -->
        <link rel="stylesheet" type="text/css"  href="{{url('public/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{url('public/css/responsive.css')}}">
        <script type="text/javascript" src="{{url('public/js/modernizr.custom.js')}}"></script>
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Start of espindola Zendesk Widget script -->
        <script>/*<![CDATA[*/window.zEmbed||function(e,t){var n,o,d,i,s,a=[],r=document.createElement("iframe");window.zEmbed=function(){a.push(arguments)},window.zE=window.zE||window.zEmbed,r.src="javascript:false",r.title="",r.role="presentation",(r.frameElement||r).style.cssText="display: none",d=document.getElementsByTagName("script"),d=d[d.length-1],d.parentNode.insertBefore(r,d),i=r.contentWindow,s=i.document;try{o=s}catch(e){n=document.domain,r.src='javascript:var d=document.open();d.domain="'+n+'";void(0);',o=s}o.open()._l=function(){var o=this.createElement("script");n&&(this.domain=n),o.id="js-iframe-async",o.src=e,this.t=+new Date,this.zendeskHost=t,this.zEQueue=a,this.body.appendChild(o)},o.write('<body onload="document._l();">'),o.close()}("//assets.zendesk.com/embeddable_framework/main.js","espindola.zendesk.com");
        /*]]>*/</script>
        <!-- End of espindola Zendesk Widget script -->
    </head>
    <body>
        @yield('content')
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="{{url('public/js/jquery.min.js')}}"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script type="text/javascript" src="{{url('public/js/bootstrap.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/SmoothScroll.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/jquery.isotope.js')}}"></script>
        <script src="{{url('public/js/owl.carousel.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/verifica_campo.js')}}"></script>
        <!-- Javascripts
            ================================================== -->
        <script type="text/javascript" src="{{url('public/js/main.js')}}"></script>
        <script>
            $(function () {
                //PARA INFORMAÇÃO DE ALGO QUANDO PASSA O MOUSE POR CIMA DO ICONE
                $('[data-toggle="tooltip"]').tooltip()

            })
        </script>
    </body>
</html>
