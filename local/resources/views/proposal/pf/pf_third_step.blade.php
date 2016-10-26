

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
                    
                    @if(!empty($proposals->proposal_guarantor_cpf))
                    <option data-tokens="">{{$proposals->proposal_guarantor_cpf}}</option>
                    <option value="" class="separator"></option>
                    @endif
                    <option value="Não Informado">--Selecione--</option>
                    <option value="Pessoa Física">Pessoa Física</option>
                    <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label class="control-label" for="inputSuccess1">Nome</label>
                <input type="text" name="proposal_guarantor_name"  id="primeiro_fiador" value="{{$proposals->proposal_guarantor_name}}"  class="form-control">
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
                <input type="text" name="guarantor_email" id="guarantor_email"  value="{{$proposals->guarantor_email}}"  class="form-control">
            </div>
            <div id="info_not_fiador1" class="col-md-12 alert alert-success form-group">
                <div class="col-md-6">	
                    @if($proposals->proposal_guarantor_type == "cadastrar_fiador")
                        <input type="radio" name="proposal_guarantor_type" id="cadastrar_fiador" checked="" value="cadastrar_fiador">
                    @else
                        <input type="radio" name="proposal_guarantor_type" id="cadastrar_fiador"  value="cadastrar_fiador">
                    @endif   
                    <label class="control-label">Eu vou cadastrá-lo</label>
                </div>
                <div class="col-md-6">				
                    
                    @if($proposals->proposal_guarantor_type == "enviar_fiador")
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
                        <select name="proposal_guarantor_cpf2" id="proposal_guarantor_cpf2" class="form-control">
                             @if(!empty($proposals->proposal_guarantor_cpf2))
                            <option data-tokens="">{{$proposals->proposal_guarantor_cpf2}}</option>
                            <option value="" class="separator"></option>
                            @endif
                            <option value="Não Informado">--Selecione--</option>                   
                            <option value="Pessoa Física">Pessoa Física</option>
                            <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                        </select>
                    </div>
                    <div class="col-md-4 form-group">
                        <label class="control-label" for="inputSuccess1">Nome</label>
                        <input type="text" name="proposal_guarantor_name2"  id="proposal_guarantor_name2"  value="{{$proposals->proposal_guarantor_name2}}" class="form-control">
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
                        <input type="text" name="guarantor_email2"  id="guarantor_email2"  value="{{$proposals->guarantor_email2}}" class="form-control">
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
                        {{(!empty($proposals->proposal_occupant_cpf) ?  $proposals->proposal_occupant_cpf  : '<option value=""selected> -- Selecione -- </option>')}}
                        <option value="Pessoa Física">Pessoa Física</option>
                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label class="control-label">Nome</label>
                    <input type="text" name="proposal_occupant_name" id="proposal_occupant_name"  value="{{$proposals->proposal_occupant_name}}"  class="form-control">
                </div>
                <div class="col-md-5 form-group">
                    <label class="control-label">E-mail</label>
                    <input type="email" name="proposal_occupant_email" id="proposal_occupant_email" value="{{$proposals->proposal_occupant_email}}"  class="form-control">
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
                                        {{(!empty($proposals->proposal_occupant_cpf2) ?  $proposals->proposal_occupant_cpf2  : '<option value=""selected> -- Selecione -- </option>')}}
                                        <option value="Pessoa Física">Pessoa Física</option>
                                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="proposal_occupant_name2"  value="{{$proposals->proposal_occupant_name2}}" id="proposal_occupant_name2"  class="form-control">
                                </div>
                                <div class="col-md-5">
                                    <label class="control-label">E-mail</label>
                                    <input type="email" name="proposal_occupant_email2" id="proposal_occupant_email2"  value="{{$proposals->proposal_occupant_email2}}" class="form-control">
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

