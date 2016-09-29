<div class="col-md-12">
    <label class="pull-left label_titulo">Anexar Documentos</label>
    
</div>
<div class="col-md-12">
    <p>Além desta proposta devidamente preenchida, é necessário anexar abaixo os documentos que comprovem as informações aqui fornecidas.
        <strong>
        E, após a aprovação, será imprescindível apresentar os originais ou enviar cópia autenticada até o ato da entrega das chaves. 
        </strong>    
    </p>
    <p>Eventualmente outros documentos poderão ser solicitados para confirmar os dados aqui informados. </p>
</div>

<div class="col-md-12 form-group">
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
                <form action="{{ url('/pj/upload') }}" method="POST" enctype="multpart/form-data" id="form_upload_pj">
                    <input id="upload_ajax_pj" name="img_photo[]" type="file" multiple class="file-loading" required="" >
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                   {{ Form::hidden('proposal_id' , $proposal[0]->legal_id) }}
                   {{ Form::hidden('type_proposal' , $type) }}
                </form> 
            <script>
                $("#upload_ajax_pj").fileinput({
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
<div class="col-md-12">
    <hr />
    <div class="col-md-12 form-group">
        <label class="pull-left label_titulo">Termos e Condições</label>
    </div>
    <div class="col-md-12">
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
    </div>
    <div class="col-md-6 form-group">
        <input type='checkbox' id="acordo"  style="  height: 15px;  padding: 20px; width: 15px;"/><label class="control-label">Ciente e de acordo.</label>
    </div>
</div>

<div class="col-md-12 form-group">
    <p class="pull-right" style="color: black; font-size: 12pt; font-weight: bold;">Página 3 de 3</p>
</div>

<div class="col-md-12">
  <section class="button-demo">
      <input type="button" class="btn btn-lg btn-primary pull-right" value="Enviar Proposta" id="final_proposta_pj" onmousedown="return validaTermos()" />
  </section>
</div>
            