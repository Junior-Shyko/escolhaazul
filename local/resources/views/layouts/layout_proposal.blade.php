<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta HTTP-EQUIV='refresh'; >
        <meta name="viewport" content="width=device-width, height=device-height,  initial-scale=1.0, user-scalable=no;user-scalable=0;"/>
        <title>Escolha Azul - Cadastro Positivo</title>
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
        <!-- CSS-->
        <link rel="stylesheet" href="{{url('public/css/bootstrap.min.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{url('public/css/fileinput.min.css')}}" media="all" />
        <link rel="stylesheet" href="{{url('public/css/responsivemobilemenu.css')}}" />
        {{--
        <link rel="stylesheet" href="{{url('css/responsive_proposal.css')}}" />
        --}}
        <link rel="stylesheet" href="{{url('public/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{url('public/css/responsive_proposal.css')}}" />
        <link rel="stylesheet" href="{{url('public/css/style_proposal.css')}}" />
        <link rel="stylesheet" href="{{url('public/css/ladda.min.css')}}" />
        <link rel="stylesheet" href="{{ url('public/plugins/js-ui/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ url('public/plugins/js-ui/jquery-ui.css') }}">

        <script src="{{url('public/js/jquery-1.7.js')}}"></script> 
        {{-- PARA USO DOS UPLOADS --}}
        <script type="text/javascript" src="{{url('public/js/fileinput/fileinput.min.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/fileinput/locales/pt-BR.js')}}"></script>
        <script type="text/javascript" type="text/javascript">
            $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
                    function mascaraData(campoData){
                         var data = campoData.value;
                         console.log(data);
                         if (data.length == 2){
                             data = data + '/';
                             document.forms[0].data.value = data;
                   return true;              
                         }
                         if (data.length == 5){
                             data = data + '/';
                             document.forms[0].data.value = data;
                             return true;
                         }
                    }
            //GLOBALIZANDO URL
             var project_survey = '/escolhaazul';
             domin  =  window.location.protocol + "//" + window.location.hostname;
             var domain_complet = domin + project_survey; 
             var url = window.location.origin;
            
            
            $('#upload_ajax').die('click').live('change', function()      { 
                 
                 $('#modal_reload').modal('show');

               $("#form_upload_files").ajaxForm({ 
                 url: domain_complet+'/upload-files', 
                 //resetForm: true,
                 type: 'POST',
                 dataType: 'json',
                 success: function(data){
                  
                   $('#modal_reload').modal('hide');
                    setTimeout(function() {
                      $('#sucesso_upload_proposal').fadeOut('fast');
                    }, 2000);
                 },
                 error:function(){       
                   console.log('Erro');
                 } }).submit();   

                 $('#modal_reload').modal('hide');   
            
             });
            
            //ARQUIVOS DO FIADOR PESSOA FÍSICA
            $('#upload_ajax_guarantor').die('click').live('change', function()      { 
            
               $('#modal_reload').modal('show');
               
               $("#form_upload_guarantor").ajaxForm({ 
                 url: domain_complet+'/upload-files', 
                 type: 'POST',
                 dataType: 'json',
                 success: function(data){
            
                  console.log('upload-com-sucesso');
                   
                  $('#modal_reload').modal('hide');

                 },
                 error:function(){ 
                   console.log('Erro');
                 } }).submit();  
                 $('#modal_reload').modal('hide');      
            
             });

            $('#upload_ajax_pj').die('click').live('change', function()      { 
            
               $('#modal_reload').modal('show');
               
               $("#form_upload_pj").ajaxForm({ 
                 url: domain_complet+'/upload-files',
                 type: 'POST',
                 dataType: 'json',
                 success: function(data){
            
                  console.log('upload-com-sucesso');
                   
                  $('#modal_reload').modal('hide');

                 },
                 error:function(){ 
                   console.log('Erro');
                 } }).submit();  
                 $('#modal_reload').modal('hide');      
            
             });
        </script>
    </head>
    <body>
        <div id="top">
            <div class="container">
                <div class="col-md-12">
                    <div class="col-md-2 col-xs-2">
                        <a href="http://www.espindola.imb.br/" target="_blank" title="Espindola Imobiliária">
                        <img src="{{url('public/img/logo_espindola.png')}}" class="pull-left" width="110" height="68" style="margin-top: 5px;" />
                        </a>
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <a href="http://www.alugueemfortaleza.com/" target="_blank" title="Espindola Imobiliária">
                        <img src="{{url('public/img/telefone.jpg')}}" class="pull-left hidden-xs" style="width: 160px; margin: 15px;" />
                        </a>
                    </div>
                    <div class="col-md-5 col-xs-5">
                        <img src="{{url('public/img/alugaemfortaleza.png')}}" class="pull-right hidden-xs" style="margin: 15px 5px 0px 0px"/>
                    </div>
                </div>
            </div>
        </div>
        @yield('content')
        {{-- @include('modal.modal_proposal') --}}
        @include('modal.modal_load')
        <div class="modal fade bs-example-modal-sm" tabindex="-1" id="modal_load" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Um momento!</h5>
                    </div>
                    <div class="modal-body">
                        <div class="text-center">
                            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
        {{-- <script src="{{url('js/fileinput.js')}}" type="text/javascript"></script> --}}
        <!-- PARA USO DO ACORDION e tb responsavel para o input file-->
        <script src="{{url('public/plugins/js-ui/external/jquery/jquery.js')}}"></script>
        <script src="{{url('public/plugins/js-ui/jquery-ui.js')}}"></script>
        <!-- PARA USO DO ACORDION -->
        <script src="{{url('public/js/bootstrap.js')}}" type="text/javascript"></script>
        <script src="{{url('public/js/responsivemobilemenu.js')}}"s></script>
        <!-- VALIDAÇÃO DE CPF E CNPJ E OPÇÕES DE ESCOLHAS-->
        <script type="text/javascript" src="{{url('public/js/funcao.js')}}"></script>
        {{ Html::script('public/js/plugins/JqueryForm/jquery.form.js') }}
        <script type="text/javascript" src="{{url('public/js/crud_ajax.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/crud_ajax_pj.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/funcao_div.js')}}"></script>
        <!--esse pluguin precisa ficar aqui devido os inputs de valor -->
        <script src="{{url('public/js/jquery.maskMoney.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/jquery.cep.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/jquery.cep2.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/jquery.cep3.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/jquery.cep4.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/jquery.cep5.js')}}"></script>
        <script type="text/javascript" src="{{url('public/js/jquery.cep6.js')}}"></script>
        <!-- PARA MASCARAR OS CAMPOS COM BOOTSTRAP -->
        <script type="text/javascript" src="{{url('public/js/jasny-bootstrap.min.js')}}"></script>
        <!-- Latest compiled and minified JavaScript -->

        <script type="text/javascript">
            $(document).ready(function() {
                $('.cep').cep();
                  $('#input-demo-cep').blur(function(){
                    $('#input-numero').focus();
                  });
            
            });
            $('#input-cep').cep2({
              // "done" é o nome da opção do seu callback
              // Funciona da mesma forma que o método 1
              // mas aqui você pode adicionar outras opções também
              done: function(endereco) {
                  console.log('O endereço encontrado foi: ', endereco);
                  $('#rua2').val(endereco.tipo_logradouro+' '+endereco.logradouro);
                      $('#bairro2').val(endereco.bairro);
                      $('#cidade2').val(endereco.cidade);
            
                      $('#guarantor_address').val(endereco.tipo_logradouro+' '+endereco.logradouro);
                      $('#guarantor_district').val(endereco.bairro);
                      $('#guarantor_city').val(endereco.cidade);
              },
            
              // Outras opções, caso você queira
              autofill: false,
              cache: false
            });
            $('#cep-conjuge').cep3({
              // "done" é o nome da opção do seu callback
              // Funciona da mesma forma que o método 1
              // mas aqui você pode adicionar outras opções também
              done: function(endereco) {
                  console.log('O endereço encontrado foi: ', endereco);
                  $('#rua_conjuge').val(endereco.tipo_logradouro+' '+endereco.logradouro);
                      $('#bairro_conjuge').val(endereco.bairro);
                      $('#cidade_conjuge').val(endereco.cidade);
            
              },
            
              // Outras opções, caso você queira
              autofill: false,
              cache: false
            });
            $('#cep-bens').cep4({
              // "done" é o nome da opção do seu callback
              // Funciona da mesma forma que o método 1
              // mas aqui você pode adicionar outras opções também
              done: function(endereco) {
                  console.log('O endereço encontrado foi: ', endereco);
                  $('#bens_rua').val(endereco.tipo_logradouro+' '+endereco.logradouro);
                      $('#bens_bairro').val(endereco.bairro);
                      $('#bens_cidade').val(endereco.cidade);
              },
            
              // Outras opções, caso você queira
              autofill: false,
              cache: false
            });
            
            $('#cep-bens').blur(function(){
              $('#bens_number_address').focus();
             });
            $('#cep-bens2').cep5({
              // "done" é o nome da opção do seu callback
              // Funciona da mesma forma que o método 1
              // mas aqui você pode adicionar outras opções também
              done: function(endereco) {
                  console.log('O endereço encontrado foi: ', endereco);
                  $('#bens_rua2').val(endereco.tipo_logradouro+' '+endereco.logradouro);
                      $('#bens_bairro2').val(endereco.bairro);
                      $('#bens_cidade2').val(endereco.cidade);
              },
            
              // Outras opções, caso você queira
              autofill: false,
              cache: false
            });
            $('#input-cep_jurifico').cep6({
              // "done" é o nome da opção do seu callback
              // Funciona da mesma forma que o método 1
              // mas aqui você pode adicionar outras opções também
              done: function(endereco) {
                  console.log('O endereço encontrado foi: ', endereco);
                  $('#rua_juridico').val(endereco.tipo_logradouro+' '+endereco.logradouro);
                      $('#bairro_juridico').val(endereco.bairro);
                      $('#cidade_juridico').val(endereco.cidade);
              },
            
              // Outras opções, caso você queira
              autofill: false,
              cache: false
            });
            //para ser usado ao sair do campo datapicket
            $('#dtn').blur(function(){
                $('#identidade').focus();
              });
              $('#dtn_admissao').blur(function(){
                $('#cargo').focus();
              });
              $('#dtn_conjuge').blur(function(){
                $('#identidade_conjuge').focus();
              });
              $('#dtn_legal').blur(function(){
                $('#identidade_legal_rep1').focus();
              });
              $('#dtn_rep_legal01').blur(function(){
                $('#identidade_legal_rep2').focus();
              });
              $('#propsota_pf_cliente_desde').blur(function(){
                $('#credito_aprovado1').focus();
              });
              $('#dt_constituicao').blur(function(){
                $('#capital_social').focus();
              });
                $('#cliente_desde').blur(function(){
                $('#fiador_pre_aprovado').focus();
              });
                $('#inicio_contrato_juridico').blur(function(){
                $('#total_parcelas1').focus();
              });
                $('#inicio_contrato_juridico2').blur(function(){
                $('#total_parcelas2').focus();
              });
            
                $('#dtn_cad').blur(function(){
                      $('#guarantor_identity').focus();
                  });
        </script>
        <script type="text/javascript">$("#aluguel_proposto").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#valor_condominio").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#iptu_anual").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#salario").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#outra_renda").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#salario_conjuge").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#salario_conjuge_outras_rendas").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#limite1_banco").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#limite2_banco").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#aplicacao1").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#aplicacao2").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#valor_bens").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#valor_bens2").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#valor_veiculos").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#valor_veiculos2").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">$("#credito_aprovado1").maskMoney({thousands:'.', decimal:',', affixesStay: true});</script>
        <script type="text/javascript">
            $("#guarantor_profission_salary").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#juridico_app1").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#juridico_app2").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#valor_parcela_onus").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#valor_parcela_onus2").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#bens_juridico_valor1").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#bens_juridico_valor1").maskMoney({thousands:'.', decimal:',', affixesStay: true});    
            $("#valor_veiculos").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#valor_veiculos2").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#capital_social").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#juridico_salario").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#juridico_outras_rendas").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            
            
            
        </script>
        <script type="text/javascript">
            $("#guarantor_profission_other_rent").maskMoney({thousands:'.', decimal:',', affixesStay: true});
            $("#fiador_pre_aprovado").maskMoney({thousands:'.', decimal:',', affixesStay: true});
        </script>
        <script>
            $(function() {
              $( "#dtn" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
              $("#dtn_admissao").datepicker({
                changeMonth: true,
                changeYear: true
              });
              $( "#dtconjugeadmissao" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
                $( "#dtn_conjuge" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
              $( "#propsota_pf_cliente_desde" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
              $( "#inicio_contrato_juridico" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
               $( "#inicio_contrato_juridico2" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
            
              $( "#dtadmconjugefiador" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
              $( "#fiador_dt_admissao" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
              $( "#dtn_legal" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
              $( "#dtn_rep_legal01" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
            
              $( "#dt_constituicao" ).datepicker({
                changeMonth: true,
                changeYear: true
              });
               $("#dtn_cad").datepicker({
                changeMonth: true,
                changeYear: true
              });
              $("#fiador_dt_admissao").datepicker({
                changeMonth: true,
                changeYear: true
              });
                $("#dtn_conjuge").datepicker({
                changeMonth: true,
                changeYear: true
              });
                $("#cliente_desde").datepicker({
                changeMonth: true,
                changeYear: true
              });
            });
            //PARA MASCARÁ CAMPOS
            $('#telefone_residencial').inputmask({
              mask: '(99)9999-9999'
            });
             $('#').inputmask({
              mask: '(99)99999-9999'
            });
            $('#').inputmask({
              mask: '(99)9999-9999'
            });
        </script>
    </body>
</html>
