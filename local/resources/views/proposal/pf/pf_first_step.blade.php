<style>
    option.separator {
    margin-top:8px;
    border-top:1px solid #666;
    padding:0;
    }
</style>

<div class="col-md-12">
    <div class="col-md-12">
        <label class="pull-left label_titulo">Dados da locação</label>  
        <p class="text-primary pull-right">Página 1 de 3</p>
    </div>
    <div class="col-md-6">
        <label class="control-label" for="inputSuccess1">Endereço ou código do imóvel*</label>
        <input type="text" name="proposal_reference" required id="proposal_reference" value="{{$proposals->proposal_reference}}" class="form-control" >
    </div>
    <div class="col-md-3">
        <label class="control-label">Tipo do imóvel</label>  
        {{ Form::select('proposal_type_immobile' ,
        [
            'Não Informado' => '--Selecione--',
            'Apartamento' => 'Apartamento',
            'Casa' => 'Casa',
            'Kitinet' => 'Kitinet',
            'Loja' => 'Loja',
            'Sala' => 'Sala',
            'Terreno' => 'Terreno',
            'Outros' => 'Outros'
        ],$proposals->proposal_type_immobile,
        [
            'class' => 'form-control'
        ]) }}               
        
    </div>
    <div class="col-md-3">
        <label  id="info-atendente" >Atendente Responsável</label>
        <select class="form-control"  name="proposal_id_user" >
            @if($proposals->proposal_id_user <> 0)
            <?php
                $atend = DB::table('users')->where('id' , $proposals->proposal_id_user)->get();
                ?>
            <option value="{{$atend[0]->id}}">{{$atend[0]->nick}}</option>
            <option value="" class="separator"></option>
            @else
            <option value="0">Não Lembro</option>
            @endif
            @foreach ($user as $users)
            <option value="{{$users->id}}" >{{$users->nick}}</option>
            @endforeach
        </select>
    </div>
    <div class="col-md-4">
        <label class="control-label" for="inputSuccess1">Finalidade </label>
        {{ Form::select('proposal_finality' , 
                [ 'Não Informado' => '--Selecione--',
                'Residencial' => 'Residencial',
                'Comercial' => 'Comercial',
                'Temporada' => 'Temporada',
                ], $proposals->proposal_finality,
                [ 'class' => 'form-control' , 
                'id' => 'proposal_finality']
            ) 
        }}
        
    </div>
    <div class="col-md-4">
        <label for="validate-text">Prazo desejado <small class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Aluguéis Residenciais tem a vigência mínima de 30 Meses. O valor padrão pode ser alterado."> </small></label>
        <div class="input-group">
            <input type="text" class="form-control" name="proposal_time_contract" id="validate-text" placeholder="Tempo do aluguel" value="{{(!empty($proposals->proposal_time_contract) ? $proposals->proposal_time_contract : '30')}}">
            <span class="input-group-addon danger"><span>meses</span></span>
        </div>
    </div>
    <div class="col-md-3">
        <label class="control-label" for="inputSuccess1">Tipo de garantia* </label>
        {{ Form::select('proposal_type_guarantee', 
            [ 'Não Informado' => '--Selecione--',
              'Carta fiança' => 'Carta fiança', 
              'Caução (em título)' => 'Caução (em título)' ,
              'Caução em dinheiro' => 'Caução em dinheiro', 
              'Sem garantia' => 'Sem garantia', 
              'Seguro fiança' => 'Seguro fiança', 
              'Fiador' => 'Fiador',  
              'Outras' => 'Outras'], 
              $proposals->proposal_type_guarantee , 
            [ 'class' => 'form-control' , 
              'id' => 'tipo_garantia']) }}
      
    </div>
    <div class="col-md-4">
        <label class="control-label">Aluguel proposto</label>
        <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input type="text" name="proposal_rent_proposed" value="{{number_format($proposals->proposal_rent_proposed, 2, ',', ' ')}}" id="aluguel_proposto" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <label class="control-label">Condomínio vigente
        <small class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Inserir as mesmas informações que constam no anúncio do imóvel"> </small>
        </label>
        <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input type="text" name="proposal_value_condominium" id="valor_condominio"  value="{{number_format($proposals->proposal_value_condominium, 2, ',', ' ')}}" class="form-control">
        </div>
    </div>
    <div class="col-md-4">
        <label class="control-label">IPTU - Mensal
        <small class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Inserir as mesmas informações que constam no anúncio do imóvel"> </small>
        </label>
        <div class="input-group">
            <span class="input-group-addon">R$</span>
            <input type="text" name="proposal_value_iptu" id="iptu_anual"  value="{{number_format($proposals->proposal_value_iptu, 2, ',', ' ')}}" class="form-control">
        </div>
    </div>
    <div class="col-md-12 form-group">
        <label class="control-label" for="obs">Observações</label>
        <textarea rows="3" name="proposal_ps" class="form-control" id="obs_proposta" maxlenght="255" name="resumo" id="resumo" >{{$proposals->proposal_ps}}</textarea>
        <span id="resta" title="255"> </span> Caracteres restantes
    </div>
</div>
<div class="col-md-12">
    <div class="col-md-12">
        <label class="pull-left label_titulo">Dados pessoais proponente</label>                   
    </div>
    <div class="col-md-8">
        <label class="control-label">Nome completo*</label>
        <input type="text" name="proposal_name" id="proposal_name" value="{{$proposals->proposal_name}}"  class="form-control">
    </div>
    <div class="col-md-4  form-group">
        <label class="control-label" >Motivo da locação</label>       
            {{ Form::select('proposal_lease_reason' ,
                ['Não Informado' => ' -- Selecione --',
                'Casamento' => 'Casamento',
                'Independência' => 'Independência',
                'Para terceiros' => 'Para terceiros',
                'Próximo de familiares' => 'Próximo de familiares',
                'Próximo a instituição de ensino' => 'Próximo a instituição de ensino',
                'Próximo ao trabalho' => 'Próximo ao trabalho',
                'Transferência de empresa' => 'Transferência de empresa',
                'Troca de imóvel' => 'Troca de imóvel',
                'Venda de imóvel próprio' => 'Venda de imóvel próprio',
                'Outros' => 'Outros'
                ],
                $proposals->proposal_lease_reason,
                ['id' => 'proposal_lease_reason',
                'class' => 'form-control']) 
            }}            
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Sexo</label>         
        
        {{ Form::select('proposal_sex',['Masculino' => 'Masculino' , 'Feminino' =>'Feminino'],$proposals->proposal_sex,['class' => 'form-control' , 'id' => 'proposal_sex']) }}
           
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="dtn">Data de nascimento</label>
        <input type="text" name="proposal_date_brith" onkeypress="MascaraData(form_one.proposal_date_brith)" id="dtn" maxlength="10" class="form-control" value="{{ empty($proposals->proposal_date_brith) ? "" : (date("d/m/Y" , strtotime($proposals->proposal_date_brith)) )}}">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Identidade</label>
        <input type="text" name="proposal_identity" id="identidade" value="{{$proposals->proposal_identity}}" class="form-control"  />
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">Órgão expedidor</label>
        <input type="text" name="proposal_organ_issuing" id="proposal_organ_issuing" class="form-control" maxlength="8" id="proposal_organ_issuing" value="{{(empty($proposals->proposal_organ_issuing) ? "SSP-CE" : $proposals->proposal_organ_issuing)}}">
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">CPF<span data-toggle="tooltip" data-placement="top" title="Esse campo é obrigatório"> * </span> </label><small class="text-danger"> (Somente números)</small>
        <input type="text" name="proposal_cpf" id="cpf"   value="{{$proposals->proposal_cpf}}" class="form-control" onBlur="javascript:validaCPF(this);">
    </div>
    <div class="col-md-3 ">
        <label class="control-label"  for="inputSuccess1">Nacionalidade</label>
        <input type="text" name="proposal_nationality" id="proposal_nationality" value="{{empty($proposals->proposal_nationality) ? "Brasileiro" : $proposals->proposal_nationality}}" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">Naturalidade</label>
        <input type="text" name="proposal_natural" id="proposal_natural" value="{{$proposals->proposal_natural}}"  class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">UF</label>
        <select name="proposal_natural_uf" id="proposal_natural_uf" class="form-control"  data-live-search="true">
            <option value="">{{(!empty($proposals->proposal_natural_uf) ? $proposals->proposal_natural_uf : ' -- Selecione --')}}</option>
            <option value="Não Informado">--Selecione--</option>
            @include('proposal.uf')
        </select>
    </div>
    <div class="col-md-3">
        <label class="control-label" for="inputSuccess1">Estado civil</label>
        {{ Form::select('proposal_estate_civil' , 
            ['Não Informado' => '--Selecione--',
             'Solteiro' => 'Solteiro',
             'Casado' => 'Casado',
             'União Estável' => 'União Estável',
             'Desquitado' => 'Desquitado',
             'Divorciado' => 'Divorciado',   
             'Separado' => 'Separado',
             'Viúvo' => 'Viúvo'
            ], $proposals->proposal_estate_civil,
            ['id' => 'estado_civil' , 'class' => 'form-control']) 
        }}
        
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">Nº de dependentes</label>
        {{ Form::select('proposal_number_dependent' , [
                'Não Informado' => '--Selecione--',
                'Nenhum' => 'Nenhum',
                '01' => '01',
                '02' => '02',
                '03' => '03',
                '04 ou mais' => '04 ou mais'] , $proposals->proposal_number_dependent , 
                ['id' => 'proposal_number_dependent' , 'class' => 'form-control'] ) 
        }}
        
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">Grau de instrução</label>
        {{ Form::select('proposal_degree_education' , 
            ['Não Informado' => '--Selecione--',
            'Fundamental' => 'Fundamental',
            'Ensino Médio' => 'Ensino médio',
            'Superior' => 'Superior',
            'Pós graduação' => 'Pós graduação',
            'Outros' => 'Outros',
            ], $proposals->proposal_degree_education,
            ['class' => 'form-control']) }}
        
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Telefone</label>
        <input type="text" name="proposal_phone_fixed" id="telefone_residencial" value="{{$proposals->proposal_phone_fixed}}" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Celular</label>
        <input type="text" name="proposal_phone_cel1" id="celular1" onkeyup="mascara( this, mtel );" value="{{$proposals->proposal_phone_cel1}}"  maxlength="15" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label" >Celular</label>
        <input type="text" name="proposal_phone_cel2" value="{{$proposals->proposal_phone_cel2}}" id="celular2" onkeyup="mascara( this, mtel );" maxlength="15" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="control-label">E-mail*</label>
        <input type="email" name="proposal_email" id="email_proponente" onblur="validacaoEmail(form_one.proposal_email)" value="{{$proposals->proposal_email}}" maxlength="60" class="form-control">
    </div>
    <!-- area residencial -->
    <div class="col-md-12">
        <div class="clear">
            <hr/>
        </div>
        <div class="row">
            <label class="col-md-12 pull-left text-primary">Endereço residencial atual</label>
        </div>
    </div>
    <div class="col-md-2 ">
        <label class="control-label"  for="input-demo-cep">CEP</label><small id="cep-info" class="text-danger"></small> 
        <input type="text" name="proposal_cep" id="input-demo-cep" value="{{$proposals->proposal_cep}}" class="cep form-control">
    </div>
    <div class="col-md-5 ">
        <label class="control-label" for="input-demo-logradouro">Endereço</label>
        <input type="text" name="proposal_address"  value="{{$proposals->proposal_address}}"  id="input-demo-logradouro" class="form-control" data-cep="logradouro">
    </div>
    <div class="col-md-2 ">
        <label class="control-label">Número</label>
        <input type="text" name="proposal_number" id="input-numero" value="{{$proposals->proposal_number}}" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="">Complemento</label>
        <input type="text" name="proposal_complement" id="proposal_complement"  value="{{$proposals->proposal_complement}}" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="control-label" for="input-demo-bairro">Bairro</label>
        <input type="text" name="proposal_district" id="input-demo-bairro"  value="{{$proposals->proposal_district}}" class="form-control" data-cep="bairro">
    </div>
    <div class="col-md-5 ">
        <label class="control-label" for="input-demo-cidade">Cidade</label>
        <input type="text" name="proposal_city"  value="{{$proposals->proposal_city}}" id="input-demo-cidade" class="form-control" data-cep="cidade">  
    </div>
    <div class="col-md-3">
        <label class="control-label" for="input-demo-uf">UF</label>
        <input type="text" name="proposal_state"  value="{{$proposals->proposal_state}}" id="input-demo-uf" class="form-control" data-cep="estado"> 
        
    </div>
    <div class="col-md-3 form-group">
        <label class="control-label" for="inputSuccess1">Tempo que reside</label>
        {{ Form::select('proposal_time_residing' , 
                ['Não Informado' => '--Selecione--',
                'Menos que 1 ano' => 'Menos que 1 ano',
                '1 a 2 anos' => '1 a 2 anos',
                '3 a 4 anos' => '3 a 4 anos',
                'Acima de 5 anos' => 'Acima de 5 anos'], $proposals->proposal_time_residing,
                ['class' => 'form-control']) 
        }}        
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">Tipo de residência</label>
        {{ Form::select('proposal_type_residence' , 
                ['Não Informado' => '--Selecione--',
                'Alugada' => 'Alugada',
                'Financiada' => 'Financiada',
                'Hotel ou flat' => 'Hotel ou flat',
                'Mora com os pais' => 'Mora com os pais',
                'Própria' => 'Própria',   
                'Outras' => 'Outras' ] , 
                $proposals->proposal_type_residence , 
                ['id' => 'proposal_type_residence' , 'class' => 'form-control'])  
        }}
        
    </div>

    <div class="col-md-12 ">
        <label class="pull-left label_titulo">Dados profissionais</label> 
    </div>
    <div class="col-md-5 ">
        <label class="control-label" for="inputSuccess1">Profissão</label>
        <input type="text" name="proposal_profission" value="{{$proposals->proposal_profission}}" id="proposal_function" class="form-control">
    </div>
    <div class="col-md-6 ">
        <label class="control-label" for="">Atividade (em caso de autônomo)</label>
        <input type="text" name="proposal_activity"  value="{{$proposals->proposal_activity}}" id="proposal_activity" class="form-control">  
    </div>
    <div class="col-md-8 ">
        <label class="control-label" for="">Empresa onde trabalha</label>
        <input type="text" name="proposal_business" id="proposal_business" value="{{$proposals->proposal_business}}"  class="form-control">
    </div>
    <div class="col-md-4 ">
        <label class="control-label" for="">CNPJ</label>          
        <input type="text" name="proposal_cnpj" id="proposal_cnpj" data-mask="99.999.999-9999/99" onBlur="ValidarCNPJ(form_one.proposal_cnpj);" class="form-control" value="{{$proposals->proposal_cnpj}}">  
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">Vínculo empregatício</label>
        {{ Form::select('proposal_clt' , 
                ['Não Informado' => 'Não Informado',
                'Aposentado/pensionista' => 'Aposentado/pensionista',
                'Autônomo' => 'Autônomo',
                'Empresário' => 'Empresário',
                'Funcionário público' => 'Funcionário público',
                'Registro CLT' => 'Registro CLT',
                'Profisional liberal' => 'Profisional liberal',
                'Outros' => 'Outros'] , 
                $proposals->proposal_clt , 
                ['class' => 'form-control' , 'id' => 'proposal_clt']) 
        }}
    </div>
    <div class="col-md-3 ">
        <label class="control-label" for="dtnadm">Data de admissão</label>
        <input type="text" name="proposal_admission_date" onKeyPress="MascaraData(form_one.proposal_admission_date);" id="dtn_admissao"  maxlength="10" class="form-control" value="{{  empty($proposals->proposal_admission_date) ? "" : (date("d/m/Y" , strtotime($proposals->proposal_admission_date)) )}}">
    </div>
    <div class="col-md-3 ">
        <label class="control-label" >Cargo/Função</label>
        <input type="text" name="proposal_function" id="cargo" value="{{$proposals->proposal_function}}" 
            class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label" >Pessoa para contato</label>
        <input type="text" name="proposal_contact_person" id="proposal_contact_person"  value="{{$proposals->proposal_contact_person}}" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Telefone (RH)</label>
        <input type="text" name="proposal_phone_rh" id="proposal_phone_rh" onKeyPress="MascaraTelefone(form_one.proposal_phone_rh);" maxlength="14"  value="{{$proposals->proposal_phone_rh}}" onBlur="ValidaTelefone(form_one.proposal_phone_rh);" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Ramal</label>
        <input type="text" name="proposal_branch" id="proposal_branch"  value="{{$proposals->proposal_branch}}" class="form-control">
    </div>
    <div class="col-md-6 ">
        <label class="control-label">E-mail (RH)</label>
        <input type="email" name="proposal_email_business" id="proposal_email_business" onblur="validacaoEmail(form_one.proposal_email_business)"  value="{{$proposals->proposal_email_business}}" maxlength="60" class="form-control">
    </div>
    <div class="col-md-2 ">
        <label class="control-label">Salário (R$)</label>
        <input type="text" name="proposal_salary" id="salario"  value="{{number_format($proposals->proposal_salary, 2, ',', ' ')}}" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Outras rendas (R$)</label>
        <input type="text" name="proposal_rent_other" id="outra_renda" value="{{number_format($proposals->proposal_rent_other, 2, ',', ' ')}}"  class="form-control">
    </div>
    <div class="col-md-7 ">
        <label class="control-label">Origem outras rendas</label>
        <input type="text" name="proposal_origin_other_rent" id="proposal_origin_other_rent"  value="{{$proposals->proposal_origin_other_rent}}" class="form-control">
    </div>
    <!-- area endereço profissional -->
    <label class="col-md-12 pull-left text-primary">Endereço profissional</label>
    <div class="col-md-3 ">
        <label class="control-label"  for="input-cep">CEP  </label><small id="inf-cep2" class="text-danger"></small>
        <input type="text" id="input-cep"  name="proposal_cep_business" type="text"  value="{{$proposals->proposal_cep_business}}" maxlength="9" placeholder="Informe o CEP" class="cep2 form-control">
    </div>
    <div class="col-md-4 ">
        <label class="control-label" for="input-cep-logradouro">Endereço</label>
        <input type="text" id="rua2"  data-cep="input-cep-logradouro" name="proposal_address_business"  value="{{$proposals->proposal_address_business}}" type="text" placeholder="Nome da rua / logradouro" class="form-control">
    </div>
    <div class="col-md-2 ">
        <label class="control-label" for="input-number2">Número</label>
        <input type="text" id="input-number2" name="proposal_number_business" value="{{$proposals->proposal_number_business}}"  class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Complemento</label>
        <input type="text" name="proposal_complement_business"  value="{{$proposals->proposal_complement_business}}" id="proposal_complement_business" class="form-control">
    </div>
    <div class="col-md-4 ">
        <label class="control-label" for="input-cep-bairro">Bairro</label>
        <input type="text" name="proposal_district_business" id="bairro2"  value="{{$proposals->proposal_district_business}}" class="form-control">
    </div>
    <div class="col-md-4 ">
        <label class="control-label" >Cidade</label>
        <input type="text" name="proposal_city_business" id="cidade2"  value="{{$proposals->proposal_city_business}}" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">UF</label>
        <input type="text" name="proposal_uf_business" id="estado2"  value="{{$proposals->proposal_uf_business}}" class="form-control">
        
    </div>
    <p class="pull-right" style="color: black; font-size: 12pt; font-weight: bold;">Página 1 de 3</p>
</div>
