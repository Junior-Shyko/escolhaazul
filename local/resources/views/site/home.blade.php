@extends('layouts.layout_site')

@section('content')
   <!-- Home Page e Navigation
            ==========================================-->
        <div id="tf-home" class="text-center">
        <div class="">
                <a class="navbar-brand" href="http://espindola.imb.br/"  target="_blank">
                <img src="{{url('public/img/espi_logo.png')}}" class="xs-espindola" alt="Logo Espindola">
                </a>
         </div>
            <div class="">
                <a href="http://www.alugaemfortaleza.com/" target="_blank">
                    <img src="{{url('public/img/aef_logo.png')}}" class="pull-right xs-aluga aluga aef_topo" alt="Logo Aluga em Fortaleza">
                </a>    
            </div>
            <div class="overlay">
                <div class="content">
                    <div class="form-group">
                        <div class="col-md-12">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <h1>O jeito mais fácil de alugar um imóvel.</h1>
                                <p class="lead">Faça sua proposta, preencha seu cadastro <br/> e envie seus documentos.<strong>Tudo on-line</strong></p>
                            </div>
                            <div class="col-md-3">
                            </div>
                        </div>
                    {{ Form::open(array('url' => 'ver-proposta/', 'method' => 'GET'))}}
                        <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div class="col-md-4">
                                <h5>Quem é o principal inquilino?</h5>
                                <div label="col-md-12">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <select name="tipo" id="" class="form-control" required >
                                            <option value="">--Selecione--</option>
                                            <option value="Pessoa Física">Pessoa Física</option>
                                            <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                           <div class="col-md-12">
                            <div class="col-md-4"></div>
                            <div id="form-inquilino" class="col-md-4">
                                <br />
                                <div class="form-group inquilino col-xs-12">
                                    <input type="text" name="user_name" id="nome_cadastro" class="form-control" placeholder="Nome completo ou razão social">
                                   
                                </div>
                                <div class="form-group col-xs-12">
                                    <input type="email" name="user_email" id="email_cadastro" class="form-control" placeholder="E-mail">
                                    
                                </div>
                                <div class="form-group col-xs-8">
                                    <input type="text" id="fone_cadastro" name="user_phone" class="form-control" onkeyup="mascara( this, mtel );" maxlength="15" placeholder="Telefone">

                                    
                                </div>
                                <div class="form-group col-xs-3">
                                                             
                                    <button type="submit" class="btn btn-default" style="float: left;  color: #51A2E9; width: 97px;">Continuar</button>
                                </div>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    {{Form::close()}}                       
                    </div>
                 
                    <div class="container">
                        <p class="saiba_mais hidden-xs"><u><em>Saiba mais</em></u></p>
                        <a href="#func-1" class="btn btn-circle page-scroll link-circle">
                            <i class="fa fa-angle-down animated"></i>
                        </a>           
                    </div>
                </div>   
            </div>                
        </div>
       



        <!-- COMO FUNCIONA - SERVIÇOS
            ==========================================-->
        <div id="tf-services"  class="text-center">
            <div class="container">
                <div id="func-1" class="row">
                    <h1 class="funciona_titulo">Como funciona?</h1>
                    <div class="col-md-4 " >
                        <div class="col-md-12 service" >
                            <img src="{{url('public/img/browser.svg')}}" width="60" height="60">
                            <br />
                            <h3>Envie sua proposta digital, simples e rápido.</h3>
                            <p class="intro">Faça sua proposta acima e preencha seu cadastro tudo on-line sem a necessidade de ir na imobiliária.</p>
                            <br />     
                        </div>
                        <div class="space"></div>
                        <div class="col-md-12 service">
                            <img src="{{url('public/img/photo.svg')}}" width="60" height="60"> 
                            <h3>Digitalize e anexe sua documentação.</h3>
                            <p class="intro">Você pode digitalizar seus documentos com a câmera do seu celular e anexar na proposta. </p> 
                            <br />            
                        </div>
                    </div>
                    <div class="col-md-4 hidden-xs ">
                        <img src="{{url('public/img/porta.png')}}" style="margin-left: 0px;">
                    </div>
                    <div class="col-md-4">
                        <div class="col-md-12 service">
                            <img src="{{url('public/img/check.svg')}}" width="60" height="60" class="">  
                            <br />                          

                             <h3 class="">Análise da sua proposta e do seu cadastro.</h3>
                            <p class="intro ">Em até 02 dias úteis enviaremos o resultado da sua proposta por e-mail.
                            </p>
                            <br/>
                        </div>
                        <div class="col-md-12 service ">
                            <img src="{{url('public/img/browser.svg')}}" width="60" height="60" class="">
                            <h3 class="">Contrato de locação e chaves.</h3>
                            <p class="intro ">Com a aprovação, você receberá contrato e a vistoria por e-mail com todas as instruções para receber as suas chaves.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
             <div class="container">
               <a href="#tf-about" class="btn page-scroll link_service">
                    <i class="fa fa-4x fa-angle-down"></i>
                </a>           
            </div>
        </div>
        <!-- PERGUNTAS - 
            ==========================================-->
        <div id="tf-about" class="text-center">
            <div class="container">
                <div class="section-title center">
                    <h1>Perguntas frequentes</h1>
                    <div class="clearfix"></div>
                </div>
                <div class="space"></div>
                <div class="row">
                    <div class="col-md-3 col-sm-6">
                        <h4><strong>Quais os requisitos para alugar com a Espíndola?</strong></h4>
                        <p>O pretenso locatário precisa comprovar renda superior a 3 vezes o valor do aluguel, podendo compor a renda com outras pessoas que não necessitam residir no imóvel. Ademais, não pode ter restrições nos órgãos de proteção ao crédito (SPC e SERASA) e nem figurar em processos judiciais que questionem sua idoneidade. Por fim, precisa optar por uma das modalidades de garantia locatícia: caução ou fiança.</p>
                        <p>Obs.: Caso não tenha recedido o e-mail,<a href="http://espindolaimobiliaria.com.br/escolhaazul/?action=cadastre-guarantor" target="_blank"><u> clique aqui </u></a>para fazer o cadastro do locatário adicional ou <a href="http://espindolaimobiliaria.com.br/escolhaazul/?action=guarantor-legal" target="_blank"> <u>aqui</u> </a> se for pessoa jurídica.</p>
                       
                        <div class="space"></div>
                        <br/>
                        <h4><strong>Consigo alugar se eu tiver restrição no meu nome?</strong></h4>
                        <p>Sim, se você for transparente sobre tais pendências e apresentar justificativas plausíveis no campo “observações”. Lembre de anexar na proposta documentos que comprovem que a negativação é indevida ou que demonstrem as providências que você já adotou para saná-las. </p>
                       
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <h4><strong>Qual documentação preciso apresentar?</strong>
                        </h4>
                        <p>Você precisa enviar as cópias digitais dos seguintes documentos: </p>
                        <ul class="about-list">
                            <li>                               
                                <em>CPF e RG (ou CNH);</em>
                            </li>
                            <li>                                
                                <em>Última declaração do IRPF (Imposto de Renda de Pessoa Física) na íntegra e com página de recibo;</em>
                            </li>
                            <li>                                
                                <em>Comprovantes de renda (<u><a href="https://espindola.helpshift.com/a/espindola-imobiliaria/?l=pt&s=locacao&f=como-faco-para-comprovar-minha-renda" target="_blank"> <u>saiba mais</u></a></u>);</em>
                            </li>
                            <li>
                                <!--<span class="fa fa-dot-circle-o"></span>-->
                                <em>Se tiver veículos ou imóveis, enviar comprovantes; </em>
                            </li>
                            <li>                                
                                <em>Se casado, certidão de casamentos e os documentos do cônjuge já especificados acima;</em>
                            </li>
                            <li><em>Comprovante de residência atualizado.</em></li>
                        </ul>
                        <br/>
                        <p>Para informações dos documentos necessários para locação com Pessoa Jurídica,<a href="https://espindola.helpshift.com/a/espindola-imobiliaria/?l=pt&s=locacao&f=qual-a-documentacao-necessaria-para-alugar-com-pessoa-juridica" target="_blank"> <u>clique aqui</u></a>.</p>

                       
                        <h4><strong>Qual o valor da caução?</strong></h4>
                        <p>O valor da caução é estipulado pela Espíndola e irá depender da análise do seu cadastro, sendo o valor mínimo o correspondente a 3 vezes o valor do aluguel.</p>
                        <p>Por questões de segurança a caução é convertido em título de capitalização da <strong>SulAmérica.</strong> E mais, você concorre a sorteios e ainda resgata seu dinheiro atualizado no final da locação. <a href="http://portal.sulamericaseguros.com.br/data/pages/8A61649E4E0BE9F6014E0C0F55E77EF4.htm?gclid=CIyapY7_n8wCFU0GkQodxM8DdA" target="_blank"> <u>Saiba mais</u> </a>. </p>
                    </div>

                    <div class="col-md-3 col-sm-6">                       
                        <h4><strong>Quem pode ser fiador?</strong></h4>
                        <p>Pode ser fiador qualquer pessoa física que atenda os mesmos requisitos do pretenso locatário e que tenha, preferencialmente, um imóvel na cidade de Fortaleza. Quanto a documentação, são as mesmas do pretenso locatário, sendo indispensável a anuência do cônjuge se casado.  Caso não tenha recedido o e-mail,  <a href="http://espindolaimobiliaria.com.br/escolhaazul/?action=cadastre-guarantor" target="_blank"> <u>clique aqui</u> </a> para fazer o cadastro do fiador.  </p>

                         <div class="space"><br/><br/><br/><br/></div>

                          <h4><strong>As condições contratuais são negociáveis?</strong></h4>
                        <p>Sim, principalmente o preço do aluguel, início da vigência e eventuais reparos/benfeitorias. Quanto as demais condições, lhe garantimos que dificilmente será necessário, pois elaboramos cuidadosamente a cláusulas contratuais para garantir o equilíbrio e a segurança das partes envolvidas. Aproveite e confira <a href="https://espindola.helpshift.com/a/espindola-imobiliaria/?l=pt" target="_blank"><u> aqui </u></a> as dúvidas frequentes sobra as cláusulas do contrato de locação.</p>
                    </div>

                    <div class="col-md-3 col-sm-6">
                        <h4><strong>Quanto tempo leva para analisarem minha proposta? E se não for aprovada?</strong></h4>
                        <p>Assumindo que você tenha enviado todos os documentos corretamente e não tenha nenhuma pendência, você será informado sobre o resultado em até 02 dias úteis. Independente de ter sido aprovada ou recusada. Caso seja recusada, você poderá adicionar outras pessoas como co-locatários para compor renda e/ou fornecer mais documentos.</p>

                        <div class="space"><br/><br/></div>

                        <h4><strong>Por que pagar a caução de análise?</strong></h4>
                        <p>A Espíndola solicita o pagamento do caução para evitar a análise de propostas de clientes que não tenham o real interesse de alugar um imóvel, assim podemos garantir o melhor atendimento possível. Não se preocupe, ela será devolvida mesmo se sua proposta for reprovada.</p>
                        <div class="space"></div>
                                
                        <a href="https://espindola.helpshift.com/a/espindola-imobiliaria/" class="btn-mais-perguntas pull-right" target="_blank"> <u>Mais perguntas </u><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                    </div>
                </div>
                <div class="alert">
                <h4 class=""><i class="fa fa-exclamation-circle" aria-hidden="true"></i><em> Importante</em></h4>
                    <p class="info_pergunta"><i class="fa fa-angle-double-right" aria-hidden="true"></i><strong> Lembramos que a rapidez e o sucesso da análise da sua proposta irá depender da quantidade de informações fornecidas e dos documentos enviados.</strong> </p>
                </div>
            
            </div>
        </div>
        <!-- BEIRA-MAR
            ==========================================-->
        <div id="tf-team" class="text-center">
        </div>

        <div id="footer-top">
            <div class="container">
                <div class="col-md-12">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="col-xs-6">
                            <img src="{{url('public/img/espi_footer.png')}}" class="footer-espindola" alt="Logo Espindola" >
                        </div>
                        <div class="col-xs-6">
                            <img src="{{url('public/img/aef_footer.png')}}" class="pull-right footer-xs-aluga aluga" alt="Logo Aluga em Fortaleza">
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </div>
        </div>

        <nav id="footer">
            <div class="container">
                <div class="text-center fnav">
                    <p>© Todos Direitos Reservados. Uma Solução <a href="#">Escolha Azul</a></p>
                </div>
            </div>
        </nav>
@endsection
