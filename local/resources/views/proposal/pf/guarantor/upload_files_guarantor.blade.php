<div class="col-md-12 form-group box">
    <div class="col-md-12">
        <label class="pull-left label_titulo">Anexar Documentos</label>                 
    </div>
    <div class="col-md-12 form-group">
        <p>Além desta proposta devidamente preenchida, é necessário anexar abaixo os documentos que comprovem as informações aqui fornecidas.
            <strong>
            E, após a aprovação, será imprescindível apresentar os originais ou enviar cópia autenticada até o dia da liberação do contrato de locação. 
            </strong>  
        </p>
        <p>Eventualmente outros documentos poderão ser solicitados para confirmar os dados aqui informados. </p>
    </div>
    <div class="kv-main">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Selecione seus documentos <i class="glyphicon glyphicon-info-sign pull-right" data-toggle="tooltip" data-placement="top" title="Pode ser enviados até 20 arquivos de cada vez. Se desejar escolha outros arquivos após o envio."></i> </h3>
                </div>
                <div class="panel-body">
                    <label class="control-label"></label>
                    <div class="form-group" id="load_upload_ambiente">
                        <i class="fa fa-spinner fa-pulse fa-3x fa-fw"></i>
                        <span>Aguarde...</span>
                    </div>
                   
                    <input id="upload_ajax_guarantor" name="img_photo[]" type="file" multiple class="file-loading" required="" >
               
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                   {{ Form::hidden('proposal_id' , $guarantor->guarantor_id) }}
                   {{ Form::hidden('type_proposal' , (isset($type) ? $type : 'cadastro-pf')) }}
                   
                  
                    <script>
                        $("#upload_ajax_guarantor").fileinput({
                           uploadUrl: domain_complet, // you must set a valid URL here else you will get an error
                           showPreview : true,
                           showUpload: false,
                           uploadIcon: '<i class="glyphicon glyphicon-ok"></i> &nbsp;',
                           allowedFileExtensions : ['jpg', 'png', 'gif', 'pdf'],
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
    <div class="col-md-12">
        <hr />
        <div class="col-md-12 form-group">
            <label class="pull-left label_titulo">Termos e Condições</label> 
        </div>
        <p>Declaro que são verdadeiras as informações prestadas nesta proposta, sob as penas da legislação brasileira, observando os 
            artigos 171 e 299 do Código Penal. Ademais, as referências informadas por mim estão autorizadas a trocar infirmações a meu respeito.     
        </p>
        <p>Estou ciente de que o envio desta proposta não vincula à locação, visto que a imobiliária respeitará a prioridade na 
            entrega e a análise cadastral.  
        </p>
        <div class="col-md-6 form-group">
            <input type='checkbox' id="acordo" /><label class="control-label">Ciente e de acordo.</label>  
        </div>
        <div class="col-md-6 form-group">
        </div>
    </div>
</div>

