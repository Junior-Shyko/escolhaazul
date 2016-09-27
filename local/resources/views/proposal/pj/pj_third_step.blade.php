<div class="col-md-12">
    <div id="guarantor">
        <div class="col-md-12">
            <h2><label class="control-label">Fiador</label></h2>
            <div class="col-md-3 form-group">
                <label class="control-label">Tipo de Fiador</label>
                <select name="legal_guarantor_cpf_cnpj" id="legal_guarantor_cpf_cnpj" class="selectpicker show-tick form-control">
                    <option value=""selected>Selecione</option>
                    <option value="Pessoa Física">Pessoa Física</option>
                    <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label class="control-label" for="inputSuccess1">Nome</label>
                <input type="text" name="legal_guarantor_name" id="legal_guarantor_name" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="">Relação entre fiador e proponente</label>
                <select name="legal_guarantor_relation" id="legal_guarantor_relation" class="selectpicker show-tick form-control">
                    <optgroup label="Pessoa Física" data-max-options="2">
                        <option value=""selected>--Selecione--</option>
                    <optgroup label="Pessoa Física" data-max-options="2">
                        <option value="Amigo">Amigo</option>
                        <option value="Conhecido">Conhecido</option>
                        <option value="Parente">Parente</option>
                        <option value="Outros">Outros</option>
                    </optgroup>
                    <optgroup label="Pessoa Jurídica" data-max-options="2">
                        <option value="Trabalha"selected>Trabalha</option>
                        <option value="Diretor">Diretor</option>
                        <option value="Setor Financeiro">Setor Financeiro</option>
                        <option value="Outros">Outros</option>
                    </optgroup>
                </select>
            </div>
            <div class="col-md-8 form-group">
                <label class="control-label">E-mail</label>
                <input type="text" name="legal_guarantor_email" id="legal_guarantor_email" class="form-control">
            </div>
            <div class="col-md-12 alert alert-info form-group">
                <div class="col-md-6">
                    <input type="radio" name="legal_guarantor_type" id="legal_guarantor_type" value="cadastrar_fiador" checked >
                    <label class="control-label">Eu vou cadastrá-lo</label>
                </div>
                <div class="col-md-6">
                    <input type="radio" name="legal_guarantor_type" id="legal_guarantor_type" value="enviar_fiador">
                    <label class="control-label">Solicitar para ele se cadastrar</label>
                </div>
            </div>
        </div>
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
                        <select name="legal_guarantor_cpf_cnpj2" id="legal_guarantor_cpf_cnpj2" class="selectpicker show-tick form-control">
                            <option value=""selected>Selecione</option>
                            <option value="Pessoa Física">Pessoa Física</option>
                            <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="control-label" for="inputSuccess1">Nome</label>
                        <input type="text" name="legal_guarantor_name2" id="legal_guarantor_name2" class="form-control">
                    </div>
                    <div class="col-md-4">
                        <small class="form-group control-label">Relação entre fiador e proponente</small>
                        <select name="legal_guarantor_relation2" id="legal_guarantor_relation2" class="selectpicker show-tick form-control">
                            <optgroup label="Pessoa Física" data-max-options="2">
                                <option value=""selected>--Selecione--</option>
                            <optgroup label="Pessoa Física" data-max-options="2">
                                <option value="Amigo">Amigo</option>
                                <option value="Conhecido">Conhecido</option>
                                <option value="Parente">Parente</option>
                                <option value="Outros">Outros</option>
                            </optgroup>
                            <optgroup label="Pessoa Jurídica" data-max-options="2">
                                <option value="Trabalha"selected>Trabalha</option>
                                <option value="Diretor">Diretor</option>
                                <option value="Setor Financeiro">Setor Financeiro</option>
                                <option value="Outros">Outros</option>
                            </optgroup>
                        </select>
                    </div>
                    <div class="col-md-8 form-group">
                        <label class="control-label">E-mail</label>
                        <input type="text" name="legal_guarantor_email2" id="legal_guarantor_email2" class="form-control">
                    </div>
                    <div class="col-md-12 alert alert-info form-group">
                        <div class="col-md-6">
                            <input type="radio" name="legal_guarantor_type2" id="legal_guarantor_type2" value="cadastrar_fiador2" checked >
                            <label class="control-label">Eu vou cadastrá-lo</label>
                        </div>
                        <div class="col-md-6">
                            <input type="radio" name="legal_guarantor_type2" id="legal_guarantor_type2" value="enviar_fiador2">
                            <label class="control-label">Solicitar para ele se cadastrar</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="locatario" class="">
    <div class="col-md-12">
        <div class="well">
            <h2>Alguém mais além de você vai alugar esse imóvel? <small class="glyphicon glyphicon-info-sign info_bonus" data-toggle="tooltip" data-placement="top" title="Se for alugar o imóvel com outra pessoa, informe abaixo o locatário adicional, pois a análise cadastral será feita em conjunto"> </small></h2>
        </div>
        <div class="form-group">
	        <a class="btn loc_info btn-lg" role="button" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
	        Adicionar
	        </a>
        </div>
        <div class="collapse" id="collapseExample">
            <div class="panel panel-default">
                <div class="col-md-3">
                    <label class="control-label">Tipo de Locatário</label>
                    <select name="legal_occupant_cpf" id="legal_occupant_cpf" class="selectpicker show-tick form-control">
                        <option value=""selected>Selecione</option>
                        <option value="Pessoa Física">Pessoa Física</option>
                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label">Nome</label>
                    <input type="text" name="legal_occupant_name" id="legal_occupant_name" class="form-control">
                </div>
                <div class="col-md-5 form-group">
                    <label class="control-label">E-mail</label>
                    <input type="email" name="legal_occupant_email" id="legal_occupant_email" class="form-control">
                </div>
                <div class="col-md-12 alert alert-success">
                    <div class="col-md-6">
                        <input type="radio" name="legal_occupant_type" id="legal_occupant_type" value="Cadastrar_locatario" checked >
                        <label class="control-label">Eu vou cadastrá-lo</label>
                    </div>
                    <div class="col-md-6">
                        <input type="radio" name="legal_occupant_type" id="legal_occupant_type" value="Enviar_locatario">
                        <label class="control-label">Solicitar para ele se cadastrar</label>
                    </div>
                </div>
                <!-- FIM alert-success -->
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#collapseLoc2"><span class="glyphicon glyphicon-plus">
                                </span>Adicionar Outro Locatário</a>
                            </h4>
                        </div>
                        <div id="collapseLoc2" class="panel-collapse collapse panel-body">
                            <div class="row">
                                <div class="col-md-3 form-group">
                                    <label class="control-label">Tipo de Locatário</label>
                                    <select name="legal_occupant_cpf2" id="legal_occupant_cpf2" class="selectpicker show-tick form-control">
                                        <option value=""selected>Selecione</option>
                                        <option value="Pessoa Física">Pessoa Física</option>
                                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="legal_occupant_name2" id="legal_occupant_name2" class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <label class="control-label">E-mail</label>
                                    <input type="email" name="legal_occupant_email2" class="form-control">
                                </div>
                                <div class="col-md-12 alert alert-success">
                                    <div class="col-md-6">
                                        <input type="radio" name="legal_occupant_type2" id="legal_occupant_type2" value="Cadastrar_locatario2" checked >
                                        <label class="control-label">Eu vou cadastrá-lo</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="radio" name="legal_occupant_type2" id="legal_occupant_type2" value="Enviar_locatario2">
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
<div class="col-md-12">
    <label class="pull-left label_titulo">Anexar Documentos</label>
</div>
<div class="col-md-12 form-group">
   <form action="{{ url('/pj/upload') }}" method="POST" enctype="multpart/form-data" id="form_proposal_pj">
        <input id="upload_ajax_pj" name="img_photo[]" type="file" multiple class="file-loading" required="" >
        <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
       {{ Form::hidden('id_proposal' , $proposals->legal_id) }}
       {{ Form::hidden('type_proposal' , $type) }}
        
        <div class="well well-sm">
            <button type="button" class="btn btn-success" id="send_files_proposal_pj"><i class="fa fa-upload" aria-hidden="true"></i>  Upload</button>
        </div>
         <div class="form-group" id="load_upload_proposal_pj">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                <span>Aguarde...</span>
            </div>
            <div class="form-group" id="sucesso_upload_proposal_pj">
              <div class="alert alert-success">
                <h5 >Arquivo(s) enviado com sucesso</h5> 
              </div>       
            </div>
    </form> 
</div>

<div class="col-md-12">
    <hr />
    <div class="col-md-12 form-group">
        <label class="pull-left label_titulo">Termos e Condições</label>
    </div>
    <p>Declaro que são verdadeiras as informações prestadas nesta proposta, sob as penas da legislação brasileira, observando os
        artigos 171 e 299 do Código Penal. Ademais, as referências informadas por mim estão autorizadas a trocar informações a meu respeito.
    </p>
    <p>Estou ciente de que o envio desta proposta não vincula à locação, visto que a imobiliária respeitará a prioridade na
        entrega e a análise cadastral.
    </p>
    <p>
        Concordamos em pagar uma caução no valor de <strong>R$100,00 (cem reais)</strong>, a qual será devolvida pela imobiliária após a
        assinatura do contrato de locação ou se desaprovada a referida proposta. No entanto, caso desista da locação ou se as informações aqui fornecidas não forem verdadeiras, a quantia permanecerá na imobiliária para cobrir as despesas do locador com os serviços administrativos prestados para esta aferição. No mesmo sentido, se o locador desistir após a aprovação integral desta proposta e liberação do contrato, será devolvido o valor recebido, mais o equivalente. Em ambos os casos não haverá direito a indenização adicional.
    </p>
    <div class="col-md-6 form-group">
        <input type='checkbox' id="acordo"  style="  height: 15px;  padding: 20px; width: 15px;"/><label class="control-label">Ciente e de acordo.</label>
    </div>
</div>
<div class="col-md-12">
    {{Form::hidden('legal_id', $proposals->legal_id , ['id' => 'id_legal'])}}
    
    <div id="reload">
        <div class="alert alert-success text-center">
            <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
            <span class="sr-only">Aguarde um momento...</span>
        </div>
    </div>
    <input type="hidden" name="_token" id="token_pj_thrid" value="{{ csrf_token() }}">
     {{Form::hidden('terceira_pj' , 'terceira_pj' , array('id' => 'terceira_pj'))}}
    <input type="button" class="btn btn-lg btn-primary pull-right" value="Enviar Proposta" id="final_proposta_pj" />
</div>
<div class="col-md-12 form-group">
    <p class="pull-right" style="color: black; font-size: 12pt; font-weight: bold;">Página 3 de 3</p>
</div>
            <script>
                $("#upload_ajax_pj").fileinput({
                       uploadUrl: domain_complet, // you must set a valid URL here else you will get an error
                       showPreview : true,
                       showUpload: false,
                       uploadIcon: '<i class="glyphicon glyphicon-ok"></i> &nbsp;',
                       allowedFileExtensions : ['jpg', 'png','gif', 'pdf'],
                       overwriteInitial: false,
                       maxFileSize: 20000000,
                       maxFilesNum: 10,
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
