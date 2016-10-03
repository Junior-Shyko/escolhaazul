<div class="col-md-12">
    <!-- Button trigger modal -->
    <div class="col-md-10">
        <label class="pull-left label_titulo">Dados da Locação</label> 	
        <p class="text-primary pull-right">Página 1 de 3</p>
    </div>
    <div class="col-md-8">
        <label class="control-label" for="inputSuccess1">Endereço ou código do Imóvel*</label>
        <input type="text" name="legal_location_reference" required id="proposal_reference" class="form-control" value="{{$proposals->legal_location_reference}}" >
    </div>
    <div class="col-md-3">
        <label class="control-label">Tipo do Imóvel</label>					
        <select  class="selectpicker show-tick form-control" name="legal_location_type_immobile">
            @if(!empty($proposals->legal_location_type_immobile))
            <option selected="" >{{$proposals->legal_location_type_immobile}}</option>
            @endif
            <option value="Não Informado"> -- Selecione -- </option>
            <option >Apartamento</option>
            <option>Casa</option>
            <option>Kitinet</option>
            <option>Loja</option>
            <option>Sala</option>
            <option>Terreno</option>
            <option>Outros</option>
        </select>
    </div>
    <div class="col-md-4">
        <label class="control-label" for="inputSuccess1">Finalidade</label>
        <select class="selectpicker show-tick form-control" name="legal_location_finality">
            @if(!empty($proposals->legal_location_finality))
            <option selected="" >{{$proposals->legal_location_finality}}</option>
            @endif
            <option value=""> -- Selecione -- </option>
            <option>Residencial</option>
            <option>Comercial</option>
            <option>Temporada</option>
        </select>
    </div>
    <div class="col-md-4">
        <label for="validate-text">Prazo desejado
        <small class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Aluguéis Residenciais tem a vigência mínima de 30 Meses."> </small>
        </label>
        <div class="input-group">
            <input type="text"  class="form-control" value="{{$proposals->legal_location_time_contract}}" name="legal_location_time_contract" id="validate-text" placeholder="Tempo do aluguel">
            <span class="input-group-addon danger"><span>Meses</span></span>
        </div>
    </div>
    <div class="col-md-4">
        <label class="control-label" for="inputSuccess1">Tipo de garantia*</label>
        <select  class="form-control" name="legal_location_type_guarantee" id="tipo_garantia" onblur="verifica_obs()">
            @if(!empty($proposals->legal_location_type_guarantee))
            <option selected="" >{{$proposals->legal_location_type_guarantee}}</option>
            @endif   
            <option value="Não Informado">--Selecione--</option>
            <option value="Fiador">Fiador</option>
            <option value="Caução (em título)">Caução (em título)</option>
            <option value="Outras">Outras</option>
        </select>
    </div>
    <div class="col-md-4">
        <label class="control-label">Aluguel Proposto</label>
        <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input type="text" name="legal_location_rent_proposed" id="aluguel_proposto" class="form-control" value="{{$proposals->legal_location_rent_proposed}}">
        </div>
    </div>
    <div class="col-md-4">
        <label class="control-label">Condomínio Vigente
        <small class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Inserir as mesmas informações que constam no anúncio do imóvel"> </small>
        </label>
        <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input type="text" name="legal_location_value_condominium" id="valor_condominio"  class="form-control" value="{{$proposals->legal_location_value_condominium}}">
        </div>
    </div>
    <div class="col-md-4">
        <label class="control-label">IPTU - Mensal
        <small class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Inserir as mesmas informações que constam no anúncio do imóvel"> </small>
        </label>
        <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input type="text" name="legal_location_value_iptu" id="iptu_anual"  class="form-control" value="{{$proposals->legal_location_value_iptu}}">
        </div>
    </div>
    <div class="col-md-12">
        <label class="control-label" for="obs">Observações</label>
        <textarea rows="3" name="legal_location_ps"  class="form-control" value="{{$proposals->legal_location_ps}}" id="obs_proposta" maxlenght="255" name="resumo" id="resumo" value=""></textarea>
        <span id="resta" title="255"> </span> Caracteres Restantes
    </div>
    <div class="col-md-12 box">
        <div class="col-md-12">
            <label class="pull-left label_titulo">Dados da Empresa Proponente</label> 
            <div class="col-md-3 pull-right">
                <a href="#"  data-toggle="modal" data-target="#myModal"	class="text-danger">Não esqueça <i class="fa fa-exclamation-triangle fa-1x"></i></a> 	
            </div>
        </div>
        <div class="col-md-6">
            <label class="control-label">Razão Social*</label>
            <input type="text" name="legal_location_name_corporation" id="proposal_name" 
                value="{{$proposals->legal_location_name_corporation}}" class="form-control">
        </div>
        <div class="col-md-6">
            <label class="control-label">Nome Fantasia</label>
            <input type="text" name="legal_location_fantasy"  class="form-control" value="{{$proposals->legal_location_fantasy}}" />
        </div>
        <div class="col-md-5">
            <label class="control-label" for="inputSuccess1">CNPJ (MF)</label><small class="text-danger"> (Somente números)</small>
            <input type="text" name="legal_location_cnpj" onKeyPress="MascaraCNPJ(form1.legal_location_cnpj);" maxlength="18"id="legal_cnpj"   onBlur="ValidarCNPJ(form1.legal_cnpj);" class="form-control" value="{{$proposals->legal_location_cnpj}}">
        </div>
        <div class="col-md-7">
            <label class="control-label" for="inputSuccess1">Contato para esclarecimentos</label>
            <input type="text" name="legal_location_contact"  class="form-control" value="{{$proposals->legal_location_contact}}">
        </div>
        <div class="col-md-4">
            <label class="control-label">Telefone</label>
            <input type="text" name="legal_location_phone" id="telefone_residencial" value="{{$proposals->legal_location_phone}}" class="form-control">
        </div>
        <div class="col-md-4">
            <label class="control-label">FAX</label>
            <input type="text" name="legal_location_phone_fax" data-mask="(99) 9999-9999" maxlength="15"  class="form-control" value="{{$proposals->legal_location_phone_fax}}">
        </div>
        <div class="col-md-4">
            <label class="control-label" >Celular</label>
            <input type="text" name="legal_location_cel" id="celular2" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->legal_location_cel}}">
        </div>
        <div class="col-md-5 ">
            <label class="control-label">E-Mail*</label>
            <input type="email" name="legal_location_email" maxlength="60" value="{{$proposals->legal_location_email}}" class="form-control">
        </div>
        <div class="col-md-3 ">
            <label class="control-label"  for="inputSuccess1">Prédio da empresa</label>
            <select name="legal_location_location" class="selectpicker show-tick form-control">
                @if(!empty($proposals->legal_location_location))
                <option selected="" >{{$proposals->legal_location_location}}</option>
                @endif 
                <option value="Não Informado">--Selecione--</option>
                <option>Próprio</option>
                <option>Alugado</option>
            </select>
        </div>
        <div class="col-md-4">
            <label class="control-label">Se alugado, valor</label>
            <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" name="legal_location_value_location" id="juridico_valor_alugado"  class="form-control" value="{{$proposals->legal_location_value_location}}">
            </div>
        </div>
        <div class="col-md-3 ">
            <label class="control-label" for="dtn">Data da Constituição</label>
            <input type="text" name="legal_location_data_constitution" onKeyPress="MascaraData(form_one_pj.legal_location_data_constitution);" id="dt_constituicao"  maxlength="10"  class="form-control" value="{{$proposals->legal_location_data_constitution}}">
        </div>
        <div class="col-md-3 ">
            <label class="control-label" for="inputSuccess1">Capital Social</label>
            <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" name="legal_location_capital_social" id="capital_social"  class="form-control" value="{{$proposals->legal_location_capital_social}}">
            </div>
        </div>
        <div class="col-md-3 ">
            <label class="control-label" for="inputSuccess1">Renda/Faturamento</label>
            <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" name="legal_location_salary" id="juridico_salario"  class="form-control" value="{{$proposals->legal_location_salary}}">
            </div>
        </div>
        <div class="col-md-3 ">
            <label class="control-label" for="inputSuccess1">Outras Rendas</label>
            <div class="input-group">
                <span class="input-group-addon">R$</span>
                <input type="text" name="legal_location_other_rent" id="juridico_outras_rendas"  class="form-control" value="{{$proposals->legal_location_other_rent}}">
            </div>
        </div>
        <div class="col-md-5">
            <label class="control-label" for="inputSuccess1">Origem outras rendas</label>
            <input type="text" name="legal_location_origim_other_rent"  class="form-control" value="{{$proposals->legal_location_origim_other_rent}}">
        </div>
        <div class="col-md-4">
            <label class="control-label" for="inputSuccess1">Opção tributária</label>
            <select name="legal_location_option_tributary" class="selectpicker show-tick form-control">
                @if(!empty($proposals->legal_location_option_tributary))
                <option selected="" >{{$proposals->legal_location_option_tributary}}</option>
                @endif 
                <option value="Não Informado">--Selecione--</option>
                <option value="Lucro Real">Lucro Real</option>
                <option value="Lucro Presumido">Lucro Presumido</option>
                <option value="Simples Nacional">Simples Nacional</option>
                <option value="Lucro Arbitrado">Lucro Arbitrado</option>
            </select>
        </div>
        <div class="col-md-3">
            <label class="control-label" for="inputSuccess1">Inscrição Estadual</label>
            <input type="text" name="legal_municipal_registration"  class="form-control" value="{{$proposals->legal_municipal_registration}}">
        </div>
        <div class="col-md-6 form-group">
            <label class="control-label" >Motivo da Locação</label>
            <select name="legal_location_reason_location" class="selectpicker show-tick form-control">
                <option >	
                    {{(!empty($proposals->legal_location_reason_location) ?  $proposals->legal_location_reason_location  : '-- Selecione --')}}
                </option>
                <option value="Não Informado">--Selecione--</option>
                <option >Abertura de filial</option>
                <option>Troca de local de sede</option>
                <option>Locação para moradia de sócios/colaboradore</option>
                <option>Outros</option>
            </select>
        </div>
        <!-- area residencial -->
        <label class="col-md-12 pull-left text-primary">Endereço</label>
        <div class="col-md-2">
            <label class="control-label"  for="input-demo-cep">CEP</label>
            <input type="text" name="legal_location_cep" id="input-demo-cep" class="cep form-control" value="{{$proposals->legal_location_cep}}">
        </div>
        <div class="col-md-5 ">
            <label class="control-label" for="input-demo-logradouro">Endereço</label>
            <input type="text" name="legal_location_address" id="input-demo-logradouro"  class="form-control" value="{{$proposals->legal_location_address}}" data-cep="logradouro">
        </div>
        <div class="col-md-2 ">
            <label class="control-label">Número</label>
            <input type="text" name="legal_location_number" id="input-numero"  class="form-control" value="{{$proposals->legal_location_number}}">
        </div>
        <div class="col-md-3 ">
            <label class="control-label" for="">Complemento</label>
            <input type="text" name="legal_location_complenent"  class="form-control" value="{{$proposals->legal_location_complenent}}">
        </div>
        <div class="col-md-5 ">
            <label class="control-label" for="input-demo-bairro">Bairro</label>
            <input type="text" name="legal_location_district" id="input-demo-bairro"  class="form-control" value="{{$proposals->legal_location_district}}" data-cep="bairro">
        </div>
        <div class="col-md-4 ">
            <label class="control-label" for="input-demo-cidade">Cidade</label>
            <input type="text" name="legal_location_city" id="input-demo-cidade"  class="form-control" value="{{$proposals->legal_location_city}}" data-cep="cidade">	
        </div>
        <div class="col-md-3">	
            <label class="control-label" for="input-demo-uf">UF</label>
            <select name="legal_location_uf" class="selectpicker show-tick form-control">
            @include('proposal.uf')
            </select>
        </div>
    </div>
    <!-- fim box-->	
    <div class="col-md-12 box">
        <div class="col-md-12 ">
            <label class="pull-left label_titulo">Dados Representante Legal (1)</label> 
        </div>
        <div class="col-md-12 ">
            <label class="control-label" for="inputSuccess1">Nome Completo</label>
            <input type="text" name="legal_location_representative_name" id="proposal_name"  class="form-control" value="{{$proposals->legal_location_representative_name}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label">Sexo</label>					
            <select name="legal_location_representative_sex" class="selectpicker show-tick form-control">
                @if(!empty($proposals->legal_location_representative_sex))
                <option selected="" >{{$proposals->legal_location_representative_sex}}</option>
                @endif 
                <option value="Não Informado">--Selecione--</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="dtn">Data de nascimento</label>
            <input type="text" name="legal_location_representative_date_brith1" onKeyPress="MascaraData(form_one_pj.legal_location_representative_date_brith);" id="dtn_legal"  maxlength="10"  class="form-control" value="{{$proposals->legal_location_representative_date_brith}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="">Identidade</label>
            <input type="text" name="legal_location_representative_identity" id="identidade_legal_rep1"  class="form-control" value="{{$proposals->legal_location_representative_identity}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="">Órgão expedidor</label>
            <input type="text" name="legal_location_representative_organ_issuer"  class="form-control" value="{{$proposals->legal_location_representative_organ_issuer}}">
        </div>
        <div class="col-md-3 form-group required-field-block">
            <label class="control-label" for="inputSuccess1">CPF*</label>
            <input type="text" name="legal_location_representative_cpf"    class="form-control" value="{{$proposals->legal_location_representative_cpf}}" id="cpf" onBlur="javascript:validaCPF(this);">
            <div class="required-icon">
                <div class="text">*</div>
            </div>
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label"  for="inputSuccess1">Nacionalidade</label>
            <input type="text" name="legal_location_representative_nationality"  class="form-control" value="{{$proposals->legal_location_representative_nationality}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="inputSuccess1">Grau de Instrução</label>
            <select name="legal_location_representative_literacy1" class="selectpicker show-tick form-control">
                <option value="Não Informado">--Selecione--</option>
                <option value="Fundamental" >Fundamental</option>
                <option value="Ensino Médio">Ensino Médio</option>
                <option value="Superior">Superior</option>
                <option value="Pós Graduação">Pós Graduação</option>
                <option value="Outros">Outros</option>
            </select>
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="inputSuccess1">Naturalidade</label>
            <input type="text" name="legal_location_representative_natural"  class="form-control" value="{{$proposals->legal_location_representative_natural}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="inputSuccess1">UF</label>
            <select name="legal_location_representative_natural_uf" class="selectpicker show-tick form-control">
            @include('proposal.uf')
            </select>	
        </div>
        <div class="col-md-3 ">
            <label class="control-label" for="inputSuccess1">Estado civil</label>
            <select name="legal_location_representative_marital_status" id="estado_civil" class="selectpicker show-tick form-control">
                @if(!empty($proposals->legal_location_representative_marital_status))
                <option selected="" >{{$proposals->legal_location_representative_marital_status}}</option>
                @endif 
                <option value="Não Informado">--Selecione--</option>
                <option value="Solteiro">Solteiro</option>
                <option value="Casado">Casado</option>
                <option value="União Estável">União Estável</option>
                <option value="Desquitado">Desquitado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Separado">Separado</option>
                <option value="Viúvo">Viúvo</option>
            </select>
        </div>
        
        <div class="col-md-4">
            <label class="control-label">Telefone</label>
            <input type="text" name="legal_location_representative_phone_fixed" data-mask="(99) 9999-9999"  class="form-control" value="{{$proposals->legal_location_representative_phone_fixed}}">
        </div>
        <div class="col-md-4">
            <label class="control-label">Celular</label>
            <input type="text" name="legal_location_representative_mobile1" id="celular1" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->legal_location_representative_mobile1}}">
        </div>
        <div class="col-md-4">
            <label class="control-label" >Celular</label>
            <input type="text" name="legal_location_representative_mobile2" id="celular2" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->legal_location_representative_mobile2}}">
        </div>
        <div class="col-md-12">
            <label class="control-label">E-Mail</label>
            <input type="text" name="legal_location_representative_email" id="telefone_residencial"  class="form-control" value="{{$proposals->legal_location_representative_email}}">
        </div>
        <div class="col-md-5 ">
            <label class="control-label" for="inputSuccess1">Profissão</label>
            <input type="text" name="legal_location_representative_profission"  class="form-control" value="{{$proposals->legal_location_representative_profission}}">
        </div>
        <div class="col-md-3 ">
            <label class="control-label" >Cargo/Função</label>
            <input type="text" name="legal_location_representative_function"   class="form-control" value="{{$proposals->legal_location_representative_function}}">
        </div>
        <div class="col-md-4">
            <label class="control-label">Ligação com a Empresa</label>
            <select name="legal_location_representative_link_business" class="selectpicker show-tick form-control">
                @if(!empty($proposals->legal_location_representative_link_business))
                <option selected="" >{{$proposals->legal_location_representative_link_business}}</option>
                @endif 
                <option value="Não Informado">--Selecione--</option>
                <option >Responsável Administrativo</option>
                <option>Sócio</option>
                <option>Procurador</option>
                <option>Diretor</option>
                <option>Funcionario</option>
                <option>Outros</option>
            </select>
        </div>
        <!-- area endereço profissional -->
        <label class="col-md-12 pull-left text-primary">Endereço residencial</label>
        <div class="col-md-3">
            <label class="control-label" for="input-cep">CEP</label>
            <input type="text" id="input-cep"  name="legal_location_representative_cep" type="text" maxlength="9" placeholder="Informe o CEP" class="cep2 form-control"  value="{{$proposals->legal_location_representative_cep}}">
        </div>
        <div class="col-md-4 ">
            <label class="control-label" for="input-cep-logradouro">Endereço</label>
            <input type="text" id="rua2"  data-cep="input-cep-logradouro" name="legal_location_representative_address" type="text" class="form-control" value="{{$proposals->legal_location_representative_address}}">
        </div>
        <div class="col-md-2 ">
            <label class="control-label" for="input-number2">Numero</label>
            <input type="text" id="input-number2" name="legal_location_representative_number"  class="form-control" value="{{$proposals->legal_location_representative_number}}">
        </div>
        <div class="col-md-3 ">
            <label class="control-label">Complemento</label>
            <input type="text" name="legal_location_representative_complement"  class="form-control" value="{{$proposals->legal_location_representative_complement}}">
        </div>
        <div class="col-md-4 ">
            <label class="control-label" for="input-cep-bairro">Bairro</label>
            <input type="text" name="legal_location_representative_district" id="bairro2"   class="form-control" value="{{$proposals->legal_location_representative_district}}">
        </div>
        <div class="col-md-4 ">
            <label class="control-label" >Cidade</label>
            <input type="text" name="legal_location_representative_city" id="cidade2"  class="form-control" value="{{$proposals->legal_location_representative_city}}">
        </div>
        <div class="col-md-4">
            <label class="control-label">UF</label>
            <select name="legal_location_representative_uf" id="estado2" class="selectpicker show-tick form-control">
            @include('proposal.uf')
            </select>	
        </div>
    </div>
    <div class="col-md-12 box">
        <div class="col-md-12 ">
            <label class="pull-left label_titulo">Dados Representante Legal (2)</label> 
        </div>
        <div class="col-md-12 ">
            <label class="control-label" for="inputSuccess1">Nome Completo</label>
            <input type="text" name="legal_location_representative_name2" id="proposal_filiation"  class="form-control" value="{{$proposals->legal_location_representative_name2}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label">Sexo</label>					
            <select name="legal_location_representative_sex2" class="selectpicker show-tick form-control">
                @if(!empty($proposals->legal_location_representative_sex2))
                <option selected="" >{{$proposals->legal_location_representative_sex2}}</option>
                @endif 
                <option value="Não Informado">--Selecione--</option>
                <option value="Masculino">Masculino</option>
                <option value="Feminino">Feminino</option>
            </select>
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="dtn">Data de nascimento</label>
            <input type="text" name="legal_location_representative_date_brith2" onKeyPress="MascaraData(form_one_pj.legal_location_representative_date_brith2);" id="dtn_rep_legal01"  maxlength="10"  class="form-control" value="{{$proposals->legal_location_representative_date_brith2}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="">Identidade</label>
            <input type="text" name="legal_location_representative_identity2" id="identidade_legal_rep2"  class="form-control" value="{{$proposals->legal_location_representative_identity2}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="">Órgão expeditor</label>
            <input type="text" name="legal_location_representative_organ_issuer2"  class="form-control" value="{{$proposals->legal_location_representative_organ_issuer2}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="inputSuccess1">CPF</label>
            <input type="text" name="legal_location_representative_cpf2"    class="form-control" value="{{$proposals->legal_location_representative_cpf2}}" id="cpf" onBlur="javascript:validaCPF(this);">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label"  for="inputSuccess1">Nacionalidade</label>
            <input type="text" name="legal_location_representative_nationality2"  class="form-control" value="{{$proposals->legal_location_representative_nationality2}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="inputSuccess1">Grau de Instrução</label>
            <select name="legal_location_representative_literacy2" class="selectpicker show-tick form-control">
                <option value="Não Informado">--Selecione--</option>
                <option value="Fundamental">Fundamental</option>
                <option value="Ensino Médi">Ensino Médio</option>
                <option value="Superior">Superior</option>
                <option value="Outros">Outros</option>
            </select>
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="inputSuccess1">Naturalidade</label>
            <input type="text" name="legal_location_representative_natural2"  class="form-control" value="{{$proposals->legal_location_representative_natural2}}">
        </div>
        <div class="col-md-3 form-group">
            <label class="control-label" for="inputSuccess1">UF</label>
            <select name="legal_location_representative_natural_uf2" class="selectpicker show-tick form-control">
            @include('proposal.uf')
            </select>	
        </div>
        <div class="col-md-3 ">
            <label class="control-label" for="inputSuccess1">Estado civil</label>
            <select name="legal_location_representative_marital_status2" id="estado_civil" class="selectpicker show-tick form-control">
                @if(!empty($proposals->legal_location_representative_marital_status2))
                <option selected="" >{{$proposals->legal_location_representative_marital_status2}}</option>
                @endif 
                <option value="Não Informado">--Selecione--</option>
                <option value="Solteiro">Solteiro</option>
                <option value="Casado">Casado</option>
                <option value="União Estável">União Estável</option>
                <option value="Desquitado">Desquitado</option>
                <option value="Divorciado">Divorciado</option>
                <option value="Separado">Separado</option>
                <option value="Viúvo">Viúvo</option>
            </select>
        </div>
        
        <div class="col-md-4">
            <label class="control-label">Telefone</label>
            <input type="text" name="legal_location_representative_phone_fixed2" data-mask="(99) 9999-9999"   class="form-control" value="{{$proposals->legal_location_representative_phone_fixed2}}">
        </div>
        <div class="col-md-4">
            <label class="control-label">Celular</label>
            <input type="text" name="legal_location_representative_mobile12" id="celular1" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->legal_location_representative_mobile12}}">
        </div>
        <div class="col-md-4">
            <label class="control-label" >Celular</label>
            <input type="text" name="legal_location_representative_mobile22" id="celular2" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->legal_location_representative_mobile22}}">
        </div>
        <div class="col-md-12">
            <label class="control-label">E-Mail</label>
            <input type="text" name="legal_location_representative_profission2"   class="form-control" value="{{$proposals->legal_location_representative_profission2}}">
        </div>
        <div class="col-md-5 ">
            <label class="control-label" for="inputSuccess1">Profissão</label>
            <input type="text" name="legal_location_representative_profission2"  class="form-control" value="{{$proposals->legal_location_representative_profission2}}">
        </div>
        <div class="col-md-3 ">
            <label class="control-label" >Cargo/Função</label>
            <input type="text" name="legal_location_representative_function2"   class="form-control" value="{{$proposals->legal_location_representative_function2}}">
        </div>
        <div class="col-md-4">
            <label class="control-label">Ligação com a Empresa</label>
            <select name="legal_location_representative_link_business2" class="selectpicker show-tick form-control">
                @if(!empty($proposals->legal_location_representative_link_business2))
                <option selected="" >{{$proposals->legal_location_representative_link_business2}}</option>
                @endif 
                <option value="Não Informado"> --Selecione--</option>
                <option >Responsável Administrativo</option>
                <option>Sócio</option>
                <option>Procurador</option>
                <option>Diretor</option>
                <option>Funcionario</option>
                <option>Outros</option>
            </select>
        </div>
        <!-- area endereço profissional -->
        <label class="col-md-12 pull-left text-primary">Endereço residencial</label>
        <div class="col-md-3 ">
            <label class="control-label"  for="input-cep_jurifico">CEP</label>
            <input type="text" id="input-cep_jurifico"  name="legal_location_representative_cep2" type="text" maxlength="9" placeholder="Informe o CEP" class="cep6 form-control"  value="{{$proposals->legal_location_representative_cep2}}">
        </div>
        <div class="col-md-4 ">
            <label class="control-label" for="input-cep-logradouro">Endereço</label>
            <input type="text" id="rua_juridico"  data-cep="input-cep-logradouro" name="legal_location_representative_address2" type="text" class="form-control" value="{{$proposals->legal_location_representative_address2}}">
        </div>
        <div class="col-md-2 ">
            <label class="control-label" for="input-number2">Numero</label>
            <input type="text" id="input-number2" name="legal_location_representative_numbe2"  class="form-control" value="{{$proposals->legal_location_representative_numbe2}}">
        </div>
        <div class="col-md-3 ">
            <label class="control-label">Complemento</label>
            <input type="text" name="legal_location_representative_complement2"  class="form-control" value="{{$proposals->legal_location_representative_complement2}}">
        </div>
        <div class="col-md-4 ">
            <label class="control-label" for="input-cep-bairro">Bairro</label>
            <input type="text" name="legal_location_representative_district2" id="bairro_juridico"   class="form-control" value="{{$proposals->legal_location_representative_district2}}">
        </div>
        <div class="col-md-4 ">
            <label class="control-label" >Cidade</label>
            <input type="text" name="legal_location_representative_city2" id="cidade_juridico"  class="form-control" value="{{$proposals->legal_location_representative_city2}}">
        </div>
        <div class="col-md-4">
            <label class="control-label">UF</label>
            <select name="legal_location_representative_uf2" id="estado2" class="selectpicker show-tick form-control">
            @include('proposal.uf')
            </select>	
        </div>
    </div>
    <p class="pull-right" style="color: black; font-size: 12pt; font-weight: bold;">Página 1 de 3</p>
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><img src="/view/static/img/logo_pequena.png"></h4>
                </div>
                <div class="modal-body">
                    <h2 class="text-danger">
                        A aprovação da sua proposta irá depender da quantidade de informações aqui fornecidas.
                    </h2>
                    <img src="/view/static/img/linkedin.png" width="64" height="64"/>
                    <label>
                    Em breve você poderá ganhar tempo ao utilizar a sua conta do Linkedin para se cadastrar.
                    </label>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
