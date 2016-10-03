
<div class="col-md-12">
    <div id="guarantor">
        <div class="col-md-12">
            <h2><label class="control-label label_titulo">Fiador</label></h2>
            <div class="col-md-12 form-group">
    <p>Informe neste campo quem será seu fiador e selecione quem você prefere que preencha o cadastro dele, você ou o próprio fiador. A pessoa selecionada receberá um e-mail com um link do formulário on-line completo para cadastrá-lo (dados pessoais, profissionais, cônjuge e bens). Caso não receba, disponibilizamos o link também na nossa página "<a href="https://espindola.helpshift.com/a/espindola-imobiliaria/" target="_blank">Perguntas Frequentes</a>".
    <p> <strong>E se eu tiver mais de um fiador?</strong>       
      
    </p>
    <p> Neste caso, basta selecionar o botão abaixo para fazer o pré-cadastro do segundo fiador da mesma forma que o primeiro, porém neste campo não deve ser cadastrado o cônjuge. Os dados do cônjuge do fiador somente serão solicitados posteriormente. </p>
</div>
            <div class="col-md-3 form-group">
                <label class="control-label">Tipo de Fiador</label>
                <select name="legal_guarantor_cpf_cnpj" id="legal_guarantor_cpf_cnpj" class="selectpicker show-tick form-control">
                    @if(!empty($proposals->legal_guarantor_cpf_cnpj))
                    <option selected="" >{{$proposals->legal_guarantor_cpf_cnpj}}</option>
                    @endif
                    <option value="">--Selecione--</option>
                    <option value="Pessoa Física">Pessoa Física</option>
                    <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                </select>
            </div>
            <div class="col-md-4 form-group">
                <label class="control-label" for="inputSuccess1">Nome</label>
                <input type="text" name="legal_guarantor_name" id="legal_guarantor_name" value="{{ $proposals->legal_guarantor_name }}" class="form-control" 
                value="{{ $proposals->legal_guarantor_name }}">
            </div>
            <div class="col-md-4">
                <label class="">Relação entre fiador e proponente</label>
                <select name="legal_guarantor_relation" id="legal_guarantor_relation" class="selectpicker show-tick form-control">
                    <optgroup label="Pessoa Física" data-max-options="2">
                        <option value="Não informado" selected>--Selecione--</option>
                        <option value="Amigo">Amigo</option>
                        <option value="Conhecido">Trabalho</option>
                        <option value="Parente">Parente</option>
                        <option value="Outros">Outros</option>                   
                </select>
            </div>
            <div class="col-md-8 form-group">
                <label class="control-label">E-mail</label>
                <input type="text" name="legal_guarantor_email" id="legal_guarantor_email" class="form-control" value="{{ $proposals->legal_guarantor_email }}" value="{{ $proposals->legal_guarantor_name }}">
            </div>
            <div class="col-md-12 alert alert-info form-group" id="info_not_fiador1">
                <div class="col-md-6">
                    @if($proposal[0]->legal_guarantor_type == "cadastrar_fiador")
                        <input type="radio" name="legal_guarantor_type" id="cadastrar_fiador" value="cadastrar_fiador" checked="" >
                    @else
                        <input type="radio" name="legal_guarantor_type" id="cadastrar_fiador" value="cadastrar_fiador" >
                    @endif   
                    
                    <label class="control-label">Eu vou cadastrá-lo</label>
                </div>
                <div class="col-md-6">
                    @if($proposal[0]->legal_guarantor_type == "cadastrar_fiador")
                        <input type="radio" name="legal_guarantor_type" id="enviar_fiador" value="enviar_fiador" checked=""> 
                    @else
                        <input type="radio" name="legal_guarantor_type" id="enviar_fiador" value="enviar_fiador">
                    @endif   
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
                        <input type="text" name="legal_guarantor_name2" id="legal_guarantor_name2" class="form-control" value="{{ $proposals->legal_guarantor_name2 }}">
                    </div>
                    <div class="col-md-4">
                        <small class="form-group control-label">Relação entre fiador e proponente</small>
                        <select name="legal_guarantor_relation2" id="legal_guarantor_relation2" class="selectpicker show-tick form-control">
                            <optgroup label="Pessoa Física" data-max-options="2">
                                <option value=""selected>--Selecione--</option>
                            <option value="Amigo">Amigo</option>
                        <option value="Conhecido">Trabalho</option>
                        <option value="Parente">Parente</option>
                        <option value="Outros">Outros</option>   
                        </select>
                    </div>
                    <div class="col-md-8 form-group">
                        <label class="control-label">E-mail</label>
                        <input type="text" name="legal_guarantor_email2" id="legal_guarantor_email2" class="form-control" value="{{ $proposals->legal_guarantor_email2 }}">
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
	        Adicionar Locatário
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
                    <input type="text" name="legal_occupant_name" id="legal_occupant_name" class="form-control" value="{{ $proposals->legal_occupant_name }}">
                </div>
                <div class="col-md-5 form-group">
                    <label class="control-label">E-mail</label>
                    <input type="email" name="legal_occupant_email" id="legal_occupant_email" class="form-control" value="{{ $proposals->legal_occupant_email }}">
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

                                        <option value="">Selecione</option>
                                        <option value="Pessoa Física">Pessoa Física</option>
                                        <option value="Pessoa Jurídica">Pessoa Jurídica</option>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label class="control-label">Nome</label>
                                    <input type="text" name="legal_occupant_name2" id="legal_occupant_name2" class="form-control" value="{{ $proposals->legal_occupant_name2 }}">
                                </div>
                                <div class="col-md-5">
                                    <label class="control-label">E-mail</label>
                                    <input type="email" name="legal_occupant_email2" class="form-control" value="{{ $proposals->legal_occupant_email2 }}">
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


