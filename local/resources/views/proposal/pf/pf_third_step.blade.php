
<div class="col-md-12">
    <label class="pull-left label_titulo">Anexar documentos</label> 	  						
</div>
<div class="col-md-12 form-group">
    <p>Além desta proposta devidamente preenchida, é necessário anexar abaixo os documentos que comprovem as informações aqui fornecidas.
        <strong>
        E, após a aprovação, será imprescindível apresentar os originais ou enviar cópia autenticada até o ato da entrega das chaves. 
        </strong>	 
    </p>
    <p>Eventualmente outros documentos poderão ser solicitados para confirmar os dados aqui informados. </p>
            <div class="col-md-12">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title">Selecione seus documentos <i class="glyphicon glyphicon-info-sign pull-right" data-toggle="tooltip" data-placement="top" title="Pode ser enviados até 20 arquivos de cada vez. Se desejar escolha outros arquivos após o envio."> </i></h3>
              </div>
               
              <div class="panel-body">
                <label class="control-label"></label>
            <div class="form-group" id="load_upload_ambiente">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                <span>Aguarde...</span>
            </div>
            <div class="form-group" id="sucesso_upload_proposal">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              <div class="alert alert-success">
                <h5 >Arquivo(s) enviado com sucesso</h5> 
              </div>       
            </div>
                <form action="{{ url('/upload') }}" method="POST" enctype="multpart/form-data" id="form_upload_files">
                    <input id="upload_ajax" name="img_photo[]" type="file" multiple class="file" required="" >
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                   {{ Form::hidden('proposal_id' , $proposal[0]->proposal_id) }}
                   {{ Form::hidden('type_proposal' , $type) }}
                </form>
            
            <script>
                $("#upload_ajax").fileinput({
                   uploadUrl: domain_complet, // you must set a valid URL here else you will get an error
                   showPreview : true,
                   showUpload: false,
                   uploadIcon: '<i class="glyphicon glyphicon-ok"></i> &nbsp;',
                   allowedFileExtensions : ['jpg', 'png', 'gif', 'pdf' , 'jpeg'],
                   overwriteInitial: false,
                   maxFileSize: 20000000,
                   maxFilesNum: 20,
                   showZoom: false,
                   showDrag: true,
                   removeLabel: 'Excluir Todos',
                   msgCancelled: 'Upload Cancelado',
                   msgInvalidFileExtension: 'Tipo inválido para o arquivo "{name}". Apenas "{} tipos" arquivos são suportados.',
                   msgLoading: 'Carregando o arquivo {index} de {files} arquivos ...',
                   msgProgress: 'Carregando o arquivo {index} {de arquivos} - {name} - {} por cento% concluída.',
                   msgSelected: '{n} arquivo(s) selecionado(s)',
                   dropZoneTitle: 'Arraste e solte seus arquivos aqui',
                   //MENSAGE DE QUANDO EXCEDER O LIMITE
                   msgSizeTooLarge: 'O Arquivo "{name}" ({size} KB) excedeu o limite máximo de megabites que é {maxSize} MB. Por favor, tente novamente!',
                   //maximo de arquivos para ser enviado
                   maxFileCount: 20,
                   //MENSAGEM PARA QUANDO EXCEDER O TOTAL DE ARQUIVOS
                   msgFilesTooMany:'Número de arquivos selecionados para upload ({n}) excede o limite máximo permitido de {m} . Por favor tente novamente seu upload!',
                   //MENSAGEM PARA SEM ARQUIVOS ENVIADOS                   
                   msgNo: 'Nenhum arquivo enviado',
                   indicatorLoadingTitle: 'fazendo Upload ...',
                   browseLabel: 'Procurar',
                   removeTitle: 'Excluir todos os arquivos'
                   }); 
            </script>    
                    
                    
               
              </div>
            </div>
            
        </div>
</div>
<div class="container kv-main col-md-12"></div>
<div class="col-md-12">

    <div id="guarantor">
        <div class="col-md-12">
            <h2> <label class="label_titulo">Fiador</label> </h2>

<div class="col-md-12 form-group">
    <p>Informe neste campo quem será seu fiador e selecione quem você prefere que preencha o cadastro dele, você ou o próprio fiador. A pessoa selecionada receberá um e-mail com um link do formulário on-line completo para cadastrá-lo (dados pessoais, profissionais, cônjuge e bens). Caso não receba, disponibilizamos o link também na nossa página "<a href="https://espindola.helpshift.com/a/espindola-imobiliaria/" target="_blank">Perguntas Frequentes</a>".
    <p> <strong>E se eu tiver mais de um fiador?</strong>       
      
    </p>
    <p> Neste caso, basta selecionar o botão abaixo para fazer o pré-cadastro do segundo fiador da mesma forma que o primeiro, porém neste campo não deve ser cadastrado o cônjuge. Os dados do cônjuge do fiador somente serão solicitados posteriormente. </p>
</div>

            <div class="col-md-3 form-group">
                <label class="control-label">Tipo de Fiador</label>
                <select name="proposal_guarantor_cpf" class="form-control" id="tipo_fiador1">
                    {{(!empty($proposal[0]->proposal_guarantor_cpf) ? '<option value="">'.$proposal[0]->proposal_guarantor_cpf.'</option>'   :  '<option value="">-- Selecione--</option><option class="divider"></option>')}}
                    <option value="Pessoa Física">Pessoa Física</option>
                    <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label class="control-label" for="inputSuccess1">Nome</label>
                <input type="text" name="proposal_guarantor_name"  id="primeiro_fiador" value="{{$proposal[0]->proposal_guarantor_name}}"  class="form-control">
            </div>
            <div class="col-md-4">
                <label class="">Relação entre fiador e proponente</label>		
                <select name="proposal_guarantor_relation" id="proposal_guarantor_relation" class="selectpicker show-tick form-control">
                    <option value="" selected>--Selecione--</option>
                    <option value="Amigo">Amigo</option>
                        <option value="Conhecido">Trabalho</option>
                        <option value="Parente">Parente</option>
                        <option value="Outros">Outros</option>   
                </select>
            </div>
            <div class="col-md-8 form-group">
                <label class="control-label">E-mail</label>
                <input type="text" name="guarantor_email" id="guarantor_email"  value="{{$proposal[0]->guarantor_email}}"  class="form-control">
            </div>
            <div id="info_not_fiador1" class="col-md-12 alert alert-success form-group">
                <div class="col-md-6">	
                    @if($proposal[0]->proposal_guarantor_type == "cadastrar_fiador")
                        <input type="radio" name="proposal_guarantor_type" id="cadastrar_fiador" checked="" value="cadastrar_fiador">
                    @else
                        <input type="radio" name="proposal_guarantor_type" id="cadastrar_fiador"  value="cadastrar_fiador">
                    @endif   
                    <label class="control-label">Eu vou cadastrá-lo</label>
                </div>
                <div class="col-md-6">				
                    
                    @if($proposal[0]->proposal_guarantor_type == "enviar_fiador")
                        <input type="radio" name="proposal_guarantor_type" id="enviar_fiador"  checked="" value="enviar_fiador">
                    @else
                        <input type="radio" name="proposal_guarantor_type" id="enviar_fiador"  value="enviar_fiador">
                    @endif  
                    <label class="control-label">Solicitar para ele se cadastrar</label>
                </div>
            </div>
        </div>
        <!-- FIM COL-12 -->
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4 class="panel-title">
                        <a data-toggle="collapse" data-parent="#accordion" href="#collapseFiador2"><span class="glyphicon glyphicon-plus">
                        </span>Adicionar Fiador</a>
                    </h4>
                </div>
                <div id="collapseFiador2" class="panel-collapse collapse panel-body">
                    <div class="col-md-3 form-group">
                        <label class="control-label">Tipo de Fiador</label>
                        <select name="proposal_guarantor_cpf2" id="tipo_fiador2" class="form-control" style="border: 1px solid red;">
                            {{(!empty($proposal[0]->proposal_guarantor_cpf2) ?  $proposal[0]->proposal_guarantor_cpf2  : '<option value=""selected> -- Selecione -- </option>')}}
                            <option value="Pessoa Física">Pessoa Física</option>
                            <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="control-label" for="inputSuccess1">Nome</label>
                        <input type="text" name="proposal_guarantor_name2"  id="proposal_guarantor_name2"  value="{{$proposal[0]->proposal_guarantor_name2}}" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <small class="form-group control-label">Relação entre fiador e proponente</small>		
                        <select name="proposal_guarantor_relation2" id="proposal_guarantor_relation2"  class="selectpicker show-tick form-control">
                            <option value="" selected>--Selecione--</option>
                            <option value="Amigo">Amigo</option>
                        <option value="Conhecido">Trabalho</option>
                        <option value="Parente">Parente</option>
                        <option value="Outros">Outros</option>   
                        </select>
                    </div>
                    <div class="col-md-8 form-group">
                        <label class="control-label">E-mail</label>
                        <input type="text" name="guarantor_email2"  id="guarantor_email2"  value="{{$proposal[0]->guarantor_email2}}" class="form-control">
                    </div>
                    <div class="col-md-12 alert alert-success form-group">
                        <div class="col-md-6">				
                            <input type="radio" name="proposal_guarantor_type2" id="proposal_guarantor_type2"  value="cadastrar_fiador2"  >
                            <label class="control-label">Eu vou cadastrá-lo</label>
                        </div>
                        <div class="col-md-6">				
                            <input type="radio" name="proposal_guarantor_type2" id="proposal_guarantor_type2"  value="enviar_fiador2">
                            <label class="control-label">Solicitar para ele se cadastrar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- FIM col-12 -->
    </div>
    <!-- FIM GUARANTOR -->
</div>
<div id="locatario" class="">
    <div class="col-md-12">
        <div class="well">
            <h2>Alguém mais além de você vai alugar esse imóvel? <small class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Se for alugar o imóvel com outra pessoa, informe abaixo o locatário adicional, pois a análise cadastral será feita em conjunto"> </small></h2>
        </div>
        <a class="btn loc_info btn-lg" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
        Adicionar Locatário
        </a>
        <div class="collapse" id="collapseExample">
            <div class="panel panel-default">
                <div class="col-md-3">
                    <label class="control-label">Tipo de locatário</label>
                    <select name="proposal_occupant_cpf" id="proposal_occupant_cpf"  class="selectpicker show-tick form-control">
                        {{(!empty($proposal[0]->proposal_occupant_cpf) ?  $proposal[0]->proposal_occupant_cpf  : '<option value=""selected> -- Selecione -- </option>')}}
                        <option value="Pessoa Física">Pessoa Física</option>
                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label">Nome</label>
                    <input type="text" name="proposal_occupant_name" id="proposal_occupant_name"  value="{{$proposal[0]->proposal_occupant_name}}"  class="form-control">
                </div>
                <div class="col-md-5 form-group">
                    <label class="control-label">E-mail</label>
                    <input type="email" name="proposal_occupant_email" id="proposal_occupant_email" value="{{$proposal[0]->proposal_occupant_email}}"  class="form-control">
                </div>
                <div class="col-md-12 alert alert-success">
                    <div class="col-md-6">				
                        <input type="radio" name="proposal_occupant_type"  id="proposal_occupant_type" value="Cadastrar_locatario">
                        <label class="control-label">Eu vou cadastrá-lo</label>
                    </div>
                    <div class="col-md-6">				
                        <input type="radio" name="proposal_occupant_type" id="proposal_occupant_type"  value="Enviar_locatario">
                        <label class="control-label">Solicitar para ele se cadastrar</label>
                    </div>
                </div>
                <!-- FIM alert-success -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseLoc2"><span class="glyphicon glyphicon-plus">
                                </span>Adicionar outro locatário</a>
                            </h4>
                        </div>
                        <div id="collapseLoc2" class="panel-collapse collapse panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label class="control-label">Tipo de locatário</label>
                                    <select name="proposal_occupant_cpf2" id="proposal_occupant_cpf2"  class="selectpicker show-tick form-control">
                                        {{(!empty($proposal[0]->proposal_occupant_cpf2) ?  $proposal[0]->proposal_occupant_cpf2  : '<option value=""selected> -- Selecione -- </option>')}}
                                        <option value="Pessoa Física">Pessoa Física</option>
                                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="proposal_occupant_name2"  value="{{$proposal[0]->proposal_occupant_name2}}" id="proposal_occupant_name2"  class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <label class="control-label">E-mail</label>
                                    <input type="email" name="proposal_occupant_email2" id="proposal_occupant_email2"  value="{{$proposal[0]->proposal_occupant_email2}}" class="form-control">
                                </div>
                                <div class="col-md-12 alert alert-success">
                                    <div class="col-md-6">				
                                        <input type="radio" name="proposal_occupant_type2"  id="proposal_occupant_type2" value="Cadastrar_locatario2">
                                        <label class="control-label">Eu vou cadastrá-lo</label>
                                    </div>
                                    <div class="col-md-6">				
                                        <input type="radio" name="proposal_occupant_type2" id="proposal_occupant_type2"  value="Enviar_locatario2">
                                        <label class="control-label">Solicitar para ele se cadastrar</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- FIM panel-default -->
                </div>
                <!-- FIM col-12 -->
            </div>
            <!--FECHA ACORDEON -->
        </div>

    </div>
</div>
<!-- DECLARAÇÃO -->
<div class="col-md-12">
    <hr />
    <div class="col-md-12 form-group">
        <label class="pull-left label_titulo">Termos e condições</label> 							
    </div>
    <div class="col-md-12">
        <p>Declaro que são verdadeiras as informações prestadas nesta proposta, sob as penas da legislação brasileira, observando os 
        artigos 171 e 299 do Código Penal. Ademais, as referências informadas por mim estão autorizadas a trocar informações a meu respeito.     
    </p>
    <p>Estou ciente de que o envio desta proposta não vincula a locação, visto que a imobiliária respeitará a prioridade na 
        entrega e a análise cadastral.  
    </p>
    <p>
        Concordo em pagar uma caução no valor de <strong>R$100,00 (cem reais)</strong>, a qual será devolvida pela imobiliária após a 
        assinatura do contrato de locação ou se desaprovada a referida proposta. No entanto, caso desista da locação ou se as informações aqui fornecidas não forem verdadeiras, a quantia permanecerá na imobiliária para cobrir as despesas do locador com os serviços administrativos prestados para esta aferição. No mesmo sentido, se o locador desistir após a aprovação integral desta proposta e liberação do contrato, será devolvido o valor recebido, mais o equivalente. Em ambos os casos não haverá direito a indenização adicional.
    </p>
    </div>
    <div class="col-md-6 form-group">
        <input type='checkbox' id="acordo"  style="  height: 15px;  padding: 20px; width: 15px;"/>
        <label class="control-label">Ciente e de acordo.</label>  
    </div>
    <div class="col-md-12">
        <div id="reload">
            <div class="alert alert-success text-center">
                <label>Aguarde</label>....
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                
            </div>
        </div>

       
       
        <section class="button-demo">
            <input type="button" class="btn btn-lg btn-primary pull-right" value="Enviar Proposta" id="final_proposta" onclick="return validaTermos()" />
        </section>
    </div>
</div>
