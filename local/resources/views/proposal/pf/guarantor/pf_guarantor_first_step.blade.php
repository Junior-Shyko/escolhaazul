<script type="text/javascript">
    $(function(){
              var formObject = $('#form_one');
              formObject.data('original_serialized_form', formObject.serialize());
             
              $(':submit').click(function() {
                window.onbeforeunload = null;
              });
             
              window.onbeforeunload = function() {
                if (formObject.data('original_serialized_form') !== formObject.serialize()) {
                  return "As mudanças deste formulário não foram salvas. Saindo desta página, todas as mudanças serão perdidas.";
                }
              };
            });
</script>
<div class="col-md-12 box" >
    <div class="col-md-12">
        <label class="pull-left label_titulo">
        Dados da proposta 
        </label>
        <p class="text-primary pull-right">
            Página 1 de 2
        </p>
    </div>
    <div class="col-md-4">
        <label class="">
        Nº da proposta
        </label>
        @if(isset($proposal))
           
                @if(!empty($proposal[0]->proposal_id))       
                    <input type="text" name="id_proposal"  class="form-control" disabled value="{{$proposal[0]->proposal_id}}">
                    <input type="hidden" name="id_proposal"  class="form-control" value="{{$proposal[0]->proposal_id}}">
                @elseif(!empty($proposal[0]->legal_id))
                    <input type="text" name="id_proposal"  class="form-control" disabled value="{{$proposal[0]->legal_id}}">
                    <input type="hidden" name="id_proposal"  class="form-control" value="{{$proposal[0]->legal_id}}">
                @endif  
                    
        @else
            <input type="text" name="id_proposal"  class="form-control" value="">
        @endif
        
    </div>
    <div class="col-md-4">
        <label class="">
        Nome do proponente <small class="glyphicon glyphicon-info-sign" data-toggle="tooltip" data-placement="top" title="Informe o nome do Proponente que lhe indicou como Fiador/Locatário"> </small>
        </label>
        @if(isset($proposal))
            @if(!empty($proposal[0]->proposal_name))       
                <input type="text" name="id_proposal"  class="form-control" disabled value="{{$proposal[0]->proposal_name}}">
            @elseif(!empty($proposal[0]->legal_location_name_corporation))
                <input type="text" name="id_proposal"  class="form-control" disabled value="{{$proposal[0]->legal_location_name_corporation}}">
            @endif  
        
        @else
            <input type="text" name="guarantor_name_pretended"  id="nome_proponente" class="form-control" value="">
        @endif
    </div>
    <div class="col-md-4">
        <label class="">
        Imobiliária
        </label>
        <input type="text" name="guarantor_name_immobile" disabled value="Espíndola" class="form-control">
    </div>
</div>

<!--SEGUNDA PARTE -->
<div class="col-md-12 box">
    <div class="col-md-12">
        <label class="pull-left label_titulo">
        Dados pessoais
        </label>
    </div>
    <!--ESCOLHE DO PORPONENTE -->
  <div class="col-md-12">
<?php if(isset($tipo_proposta) && $tipo_proposta == "locatario"){

    ?>

  	<div class="col-md-6">
  		<label class="check_large">
  			<input type="radio" name="guarantor_type" checked="" value="Locatário Adicional" />Locatário adicional
  		</label>
  	</div>
  	<div class="col-md-6">
  		<label class="check">
  			<input type="radio" name="guarantor_type" value="Fiador" />Fiador
  		</label>
  	</div>
  	<?php }elseif(isset($tipo_proposta)  && $tipo_proposta == "fiador"){ ?>
  	<div class="col-md-6">
  		<label class="check_large">
  			<input type="radio" name="guarantor_type" value="Locatário Adicional" />Locatário adicional
  		</label>
  	</div>
  	<div class="col-md-6">
  		<label class="check">
  			<input type="radio" name="guarantor_type" checked="" value="Fiador" />Fiador
  		</label>
  	</div>
  	 	<?php }elseif(empty($tipo_proposta)){ ?>
  	 	<div class="col-md-6">
  		<label class="check_large">
  			<input type="radio" name="guarantor_type" value="Locatário Adicional" />Locatário adicional
  		</label>
  		
  		</div>	
  		<div class="col-md-6">
  		<label class="check">
  			<input type="radio" name="guarantor_type" checked="" value="Fiador" />Fiador
  		</label>
  	</div>
  	 		
  	 	<?php } ?>	
  </div>
    <div class="col-md-12 ">
        <label class="">
        Nome completo
        </label>
       
        @if(isset($proposal))
            
            @if(!empty($proposal[0]->proposal_guarantor_name)) 

                <input type="text" name="guarantor_name" id="guarantor_name" value="{{$proposal[0]->proposal_guarantor_name}}" class="form-control"> 

            @elseif(empty($proposal[0]->proposal_guarantor_name))

                <input type="text" name="guarantor_name" id="guarantor_name" value="" class="form-control">

            @elseif(!empty($proposal[0]->legal_guarantor_name))
                <input type="text" name="guarantor_name" id="guarantor_name" value="{{$proposal[0]->legal_guarantor_name}}" class="form-control"> 
               
            @endif 

        @else
            <input type="text" name="guarantor_name" id="guarantor_name" value="" class="form-control">
        @endif
    </div>
    <div class="col-md-3 ">
        <label class="">
        Sexo
        </label>
        <select name="guarantor_sex" class="selectpicker show-tick form-control">
           <option value="">-- Selecione --</option>
          		 <option value="Masculino">Masculino</option>
          		 <option value="Feminino">Feminino</option>	
        </select>
    </div>
    <div class="col-md-3 ">
        <label class="" for="dtn">
        Data de nascimento
        </label>
        <input type="text" name="guarantor_date_brith" onKeyPress="MascaraData(form_guarantor_one.guarantor_date_brith);"  id="dtn_cad"  class="form-control"/>
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Identidade
        </label>
        <input type="text" name="guarantor_identity" id="guarantor_identity"  class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Órgão expedidor
        </label>

        <input type="text" name="guarantor_organ_issuing" class="form-control" maxlength="8" id="proposal_organ_issuing" value="{{(empty($proposals->guarantor_organ_issuing) ? "SSP-CE" : $proposals->guarantor_organ_issuing)}}">
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        CPF
        </label>
        <small class="text-danger">(Somente Números)</small>
        <input type="text" name="guarantor_cpf" id="guarantor_cpf" class="form-control"  onBlur="javascript:validaCPF(this);">
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Nacionalidade
        </label>
 
         <input type="text" name="guarantor_nationality"  value="{{empty($proposals->guarantor_nationality) ? "Brasileiro" : $proposals->guarantor_nationality}}" class="form-control">
       
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Naturalidade
        </label>
        <input type="text" name="guarantor_natural" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        UF
        </label>
        <select name="guarantor_natural_uf" class="selectpicker show-tick form-control">
        <option value="">{{(!empty($proposals->proposal_natural_uf) ? $proposals->proposal_natural_uf : ' -- Selecione --')}}</option>
        @include('proposal.uf')
        </select>
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Estado civil
        </label>
        <select name="guarantor_state_civil" id="estado_civil" class="selectpicker show-tick form-control">
        	  <option value="" selected> -- Selecione -- </option>
      		  <option value="Solteiro">Solteiro</option>
	          <option value="Casado">Casado</option>
	          <option value="União Estável">União Estável</option>
	          <option value="Desquitado">Desquitado</option>
	          <option value="Divorciado">Divorciado</option>
	          <option value="Separado">Separado</option>
	          <option value="Viúvo">Viúvo</option>		
        </select>
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Nº de dependentes
        </label>
        <select name="guarantor_number_dependent" class="selectpicker show-tick form-control">
             <option value=""selected> -- Selecione -- </option>
            <option>
                Nenhum
            </option>
            <option>
                01
            </option>
            <option>
                02
            </option>
            <option>
                03
            </option>
            <option>
                04
            </option>
            <option>
                02
            </option>
            <option>
                06
            </option>
        </select>
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Grau de Instrução
        </label>
        <select name="guarantor_degree_instrucion" class="selectpicker show-tick form-control">
          <option value=""selected> -- Selecione -- </option>
          <option value="Fundamental">Fundamental</option>
          <option value="Ensino Médio">Ensino Médio</option>
          <option value="Superior">Superior</option>
          <option value="Pós Graduação">Pós Graduação</option>
          <option value="Outros">Outros</option>
        </select>
    </div>
    
    <div class="col-md-3 ">
        <label class="">
        Telefone
        </label>
        <input type="text" name="guarantor_phone_fixed" data-mask="(99) 9999-9999" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        Celular
        </label>
        <input type="text" name="guarantor_phone1" id="guarantor_cel1" onkeyup="mascara( this, mtel );" maxlength="15" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        Celular
        </label>
        <input type="text" name="guarantor_phone2" id="guarantor_cel2" onkeyup="mascara( this, mtel );" maxlength="15" class="form-control">
    </div>
    <div class="col-md-6 ">
        <label class="">
        E-Mail*
        </label>
        @if(isset($proposal))
            @if(!empty($proposal[0]->guarantor_email)) 

                <input type="email" name="guarantor_email" id="guarantor_email" value="{{$proposal[0]->guarantor_email}}" class="form-control"> 

           
            @elseif(!empty($proposal[0]->legal_guarantor_email))
                <input type="text" name="guarantor_name" id="guarantor_name" value="{{$proposal[0]->legal_guarantor_email}}" class="form-control"> 
            @endif 
        
        @else
            <input type="email" name="guarantor_email" id="guarantor_email" value="" class="form-control">   
        @endif 
        
    </div>
    
    <!-- area residencial -->
    <div class="col-md-12">
        <div class="clear">
            <hr/>
        </div>
        <div class="row">
            <label class="col-md-12 pull-left text-primary">Endereço residencial Atual</label>

        </div>
    </div>
    <div class="col-md-2 ">
        <label class="" for="input-demo-cep">
        CEP
        </label>
        <input type="text" name="guarantor_cep" id="input-demo-cep"  class="cep form-control">
    </div>
    <div class="col-md-5 ">
        <label class="" for="input-demo-logradouro">
        Endereço
        </label>
        <input type="text" name="guarantor_address"  class="form-control" data-cep="logradouro">
    </div>
    <div class="col-md-2 ">
        <label class="">
        Número
        </label>
        <input type="text" name="guarantor_number" id="input-numero" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="" for="">
        Complemento
        </label>
        <input type="text" name="guarantor_address_complement"  class="form-control">
    </div>
    <div class="col-md-4">
        <label class="" for="input-demo-bairro">
        Bairro
        </label>
        <input type="text" name="guarantor_district" id="input-demo-bairro" class="form-control"
            data-cep="bairro">
    </div>
    <div class="col-md-4">
        <label class="" for="input-demo-cidade">
        Cidade
        </label>
        <input type="text" name="guarantor_city" id="input-demo-cidade" class="form-control"
            data-cep="cidade">
    </div>
    <div class="col-md-3 ">
        <label class="" for="input-demo-uf">
        UF
        </label>
        <select name="guarantor_uf" class="selectpicker show-tick form-control">
        <option value="">{{(!empty($proposals->proposal_natural_uf) ? $proposals->proposal_natural_uf : ' -- Selecione --')}}</option>
        @include('proposal.uf')
        </select>
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Tempo que reside
        </label>
        <select name="guarantor_time_home" class="selectpicker show-tick form-control">
             <option value=""selected> -- Selecione -- </option>
            <option value="Menos que 1 ano">
                Menos que 1 ano
            </option>
            <option value="1 a 2 anos">
                1 a 2 anos
            </option>
            <option value="3 a 4 anos">
                3 a 4 anos
            </option>
            <option value="Acima de 5 anos">
               Acima de 5 anos
            </option>
            
        </select>
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Tipo de Residência
        </label>
        <select name="guarantor_type_residence" class="selectpicker show-tick form-control">
             <option value=""selected> -- Selecione -- </option>
            <option value="Alugada">Alugada</option>
              <option value="Financiada">Financiada</option>
              <option value="Hotel ou flat">Hotel ou flat</option>]
              <option value="Mora com os pais">Mora com os pais</option>    
              <option value="Própria">Própria</option>            
              <option value="Outros">Outros</option>
        </select>
    </div>
</div>
<!-- DADOS PROFISSIONAIS
    TERCEIRA PARTE -->
<div class="col-md-12 box">
    <div class="col-md-12">
        <label class="pull-left label_titulo">
        Dados Profissionais
        </label>
    </div>
    <div class="col-md-5 ">
        <label class="" for="inputSuccess1">
        Profissão
        </label>
        <input type="text" name="guarantor_profission" class="form-control">
    </div>
    <div class="col-md-6 ">
        <label class="" for="">
        Atividade (em caso de autônomo)
        </label>
        <input type="text" name="guarantor_profission_activity" class="form-control">
    </div>
    <div class="col-md-8 ">
        <label class="" for="">
        Empresa onde trabalha
        </label>
        <input type="text" name="guarantor_profission_business" class="form-control">
    </div>
    <div class="col-md-4 ">
        <label class="" for="">
        CNPJ
        </label>
        <input type="text" name="guarantor_profission_cnpj" data-mask="99.999.999-9999/99"
            onBlur="ValidarCNPJ(form1.proposal_cnpj);" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="" for="inputSuccess1">
        Vínculo Empregatício
        </label>
        <select name="guarantor_profission_link" class="selectpicker show-tick form-control">
            <option value=""selected> -- Selecione -- </option>
            <option value="Aposentado/Pensionista">
                Aposentado/Pensionista
            </option>
            <option value="Autônomo">
                Autônomo
            </option>
            <option value="Empresário">
                Empresário
            </option>
            <option value="Estudante">
                Estudante
            </option>
            <option value="Funcionário Público">
                Funcionário Público
            </option>
            <option value="Registro CLT">
                Registro CLT
            </option>
            <option value="Profisional Liberal">
                Profisional Liberal
            </option>
            <option value="Outros">
                Outros
            </option>
        </select>
    </div>
    <div class="col-md-3 ">
        <label class="" for="dtnadm">
        Data de admissão
        </label>
        <input type="text" name="guarantor_profission_date_admission"  onKeyPress="MascaraData(form_guarantor_one.guarantor_profission_date_admission);" id="fiador_dt_admissao" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        Cargo/Função
        </label>
        <input type="text" name="guarantor_profission_function" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        Pessoa para contato
        </label>
        <input type="text" name="guarantor_profission_contact" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        Telefone(RH)
        </label>
        <input type="text" name="guarantor_profission_phone" id="fone_rh_fiador"  onkeyup="mascara( this, mtel );" maxlength="14"  class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        Ramal
        </label>
        <input type="text" name="guarantor_profission_ramal" class="form-control">
    </div>
    <div class="col-md-6 ">
        <label class="">
        E-mail
        </label>
        <input type="email" name="guarantor_profission_email" class="form-control">
    </div>
    <div class="col-md-3">
        <label class="">
        Salário(R$)
        </label>
        <input type="text" name="guarantor_profission_salary" id="guarantor_profission_salary" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        Outras Rendas(R$)
        </label>
        <input type="text" name="guarantor_profission_other_rent" id="guarantor_profission_other_rent" class="form-control">
    </div>
    <div class="col-md-6">
        <label class="">
        Origem outras rendas
        </label>
        <input type="text" name="guarantor_profission_origin_other_rent" class="form-control">
    </div>
    <!-- area endereço profissional -->
    <label class="col-md-12 pull-left text-primary">
    Endereço profissional
    </label>
    <div class="col-md-3 ">
        <label class="" for="input-cep">
        CEP
        </label>
        <input type="text" id="input-cep" name="guarantor_profission_cep" type="text"
            maxlength="9" placeholder="Informe o CEP" class="cep2 form-control">
    </div>
    <div class="col-md-4 ">
        <label class="" for="input-cep-logradouro">
        Endereço
        </label>
        <input type="text" id="guarantor_address" name="guarantor_profission_address" placeholder="Nome da Rua / Logradouro" class="form-control">
    </div>
    <div class="col-md-2 ">
        <label class="" for="input-number2">
        Numero
        </label>
        <input type="text" id="input-number2" name="guarantor_profission_number"
            class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        Complemento
        </label>
        <input type="text" name="guarantor_profission_complement" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="" for="input-cep-bairro">
        Bairro
        </label>
        <input type="text" name="guarantor_profission_district" id="guarantor_district" class="form-control">
    </div>
    <div class="col-md-4">
        <label class="">
        Cidade
        </label>
        <input type="text" name="guarantor_profission_city" id="guarantor_city" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="">
        UF
        </label>
        <select name="guarantor_profission_uf" class="selectpicker show-tick form-control">
            <option value="AC">
                Acre
            </option>
            <option value="AL">
                Alagoas
            </option>
            <option value="AP">
                Amapá
            </option>
            <option value="AM">
                Amazonas
            </option>
            <option value="BA">
                Bahia
            </option>
            <option value="CE" selected>
                Ceará
            </option>
            <option value="DF">
                Distrito Federal
            </option>
            <option value="ES">
                Espirito Santo
            </option>
            <option value="GO">
                Goiás
            </option>
            <option value="MA">
                Maranhão
            </option>
            <option value="MS">
                Mato Grosso do Sul
            </option>
            <option value="MT">
                Mato Grosso
            </option>
            <option value="MG">
                Minas Gerais
            </option>
            <option value="PA">
                Pará
            </option>
            <option value="PB">
                Paraíba
            </option>
            <option value="PR">
                Paraná
            </option>
            <option value="PE">
                Pernambuco
            </option>
            <option value="PI">
                Piauí
            </option>
            <option value="RJ">
                Rio de Janeiro
            </option>
            <option value="RN">
                Rio Grande do Norte
            </option>
            <option value="RS">
                Rio Grande do Sul
            </option>
            <option value="RO">
                Rondônia
            </option>
            <option value="RR">
                Roraima
            </option>
            <option value="SC">
                Santa Catarina
            </option>
            <option value="SP">
                São Paulo
            </option>
            <option value="SE">
                Sergipe
            </option>
            <option value="TO">
                Tocantins
            </option>
        </select>
    </div>
   
    <div class="col-md-12">
   
    	 <hr />
        <div class="col-sm-6">
            <p class="text-primary pull-left">
                Página 1 de 2
            </p>
        </div>
         <div class="col-md-6">
       
        <p class="text-danger pull-right">
            *Indica um campo obrigatório
        </p>
    </div>
    </div>
</div>