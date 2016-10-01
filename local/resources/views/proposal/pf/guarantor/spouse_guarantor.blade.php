<div class="col-md-12  box">
	<h1><label class="pull-left label_titulo">Dados do cônjuge</label></h1>
	
	<p class="text-primary pull-right">Página 2 de 2</p> 	
<hr />
  <div class="col-md-3 form-group required-field-block">
		<label class="control-label" for="inputSuccess1">CPF*</label>
		<input type="text" name="guarantor_conjuge_cpf"   class="form-control" id="cpf" onBlur="javascript:validaCPF(this);">
		<div class="required-icon">
            <div class="text">*</div>
        </div>
    </div>	
    <div class="col-md-3 renda_conjuge">
		<label style="margin-left: 39pt;padding: 15px;">Compõe renda?</label>
      
            <input type="radio" id="rendaConjugeFiador" name="rendaConjugeFiador" onclick="rendaFiadorConjuge()"  style="  margin-left: 20px;"/>
            <label for="rendaConjugeFiador">Sim</label>
       
            <input type="radio" id="rendaConjugeFiador"  name="rendaConjugeFiador" onclick="rendaFiadorConjuge()"  style="  margin-left: 20px;"/>
            <label for="rendaConjugeFiador">Não</label>
       	        
	</div>
  <div class="clearfix">
		    	<div class="row"></div>
		    </div>
			<div class="col-md-12 form-group required-field-block">
				<label class="control-label" for="inputSuccess1">Nome completo*</label>
				<input type="text" name="guarantor_conjuge_name"   class="form-control">
				<div class="required-icon">
		            <div class="text">*</div>
		        </div>
		    </div>

			<div class="col-md-3 form-group">
				<label class="control-label">Sexo</label>					
		        <select name="guarantor_conjuge_sex" class="selectpicker show-tick form-control">
		         <option value="">-- Selecione --</option>
          		 <option value="Masculino">Masculino</option>
          		 <option value="Feminino">Feminino</option>			        
		        </select>	     
			</div>
			<div class="col-md-3 form-group">
				<label class="control-label" for="dtn">Data de nascimento</label>
				<input type="text" name="guarantor_conjuge_date_brith" id="dtn_conjuge" onKeyPress="MascaraData(form1.guarantor_conjuge_date_brith);" class="form-control">
			</div>

			<div class="col-md-3 form-group">
				<label class="control-label" for="">Identidade</label>
				<input type="text" name="guarantor_conjuge_identity" class="form-control">
			</div>
			
			<div class="col-md-3 form-group">
				<label class="control-label" for="">Órgão expediDor</label>
		
				 <input type="text" name="guarantor_conjuge_organ_issuing" class="form-control" maxlength="8" value="{{(empty($proposals->guarantor_conjuge_organ_issuing) ? "SSP-CE" : $proposals->guarantor_conjuge_organ_issuing)}}">
			</div>
			<div class="col-md-3 form-group">
					<label class="control-label"  for="inputSuccess1">Nacionalidade</label>

					<input type="text" name="guarantor_conjuge_nationality"  value="{{empty($proposals->guarantor_conjuge_nationality) ? "Brasileiro" : $proposals->guarantor_conjuge_nationality}}" class="form-control">
					
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">Grau de instrução</label>
					<select name="guarantor_conjuge_degree_education" class="selectpicker show-tick form-control">
			           <option value="">-- Selecione --</option>
			          <option value="Fundamental">Fundamental</option>
			          <option value="Ensino Médio">Ensino Médio</option>
			          <option value="Superior">Superior</option>
			          <option value="Outros">Outros</option>
			        </select>	
				</div>	
				<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">Naturalidade</label>
					<input type="text" name="guarantor_conjuge_natural" class="form-control">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">UF</label>
					<select name="guarantor_conjuge_uf" class="selectpicker show-tick form-control">
			          <option value="">{{(!empty($proposals->proposal_natural_uf) ? $proposals->proposal_natural_uf : '-- Selecione --')}}</option>
        	@include('proposal.uf')

			        </select>	
				</div>
				             
            	<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">Telefone</label>
					<input type="text" name="guarantor_conjuge_phone_fixed" id="telefone_residencial"class="form-control">
				</div>	
            	
            	<div class="col-md-3 form-group">
						<label class="control-label" for="inputSuccess1">Celular</label>
						<input type="text" name="guarantor_conjuge_phone_cel1" id="celular1" maxlength="15" class="form-control">
				</div>	
            	
            	<div class="col-md-3 form-group">
						<label class="control-label" for="inputSuccess1">Celular</label>
						<input type="text" name="guarantor_conjuge_phone_cel2" id="celular2" maxlength="15" class="form-control">
				</div>	
            	
            	<div class="col-md-6 form-group">
						<label class="control-label" for="inputSuccess1">E-mail</label>
						<input type="email" name="guarantor_conjuge_email"  class="form-control">
				</div>
			<div class="col-md-9 form-group">
					<label class="control-label" for="inputSuccess1">Filiação* (nome completo da mãe)</label>
					<input type="text" name="guarantor_conjuge_filiation"  class="form-control" placeholder="Nome Completo">
				</div>	   
  			<!-- DADOS PROFISSIONAIS DO CONJUGE-->
			<div class="col-md-12">
				<div class="row">
					<hr class="separete_division"/>
				</div>
			</div>
			
			<!-- ======================
				DIV OCULTA - COMPOE RENDA
			==========================-->
	
			<div id="rendaFiadorEsposa" class="col-md-12">
			<div class="col-md-12">
				<label class="pull-left label_titulo">Dados profissionais do cônjuge fiador</label> 
				
			</div>
				<div class="col-md-6 form-group">
					<label class="control-label" for="inputSuccess1">Profissão</label>
					<input type="text" name="guarantor_conjuge_profission" class="form-control">
				</div>
				
				<div class="col-md-6 form-group">
					<label class="control-label" for="inputSuccess1">Atividade (em caso de autônomo)</label>
					<input type="text" name="guarantor_conjuge_activity" class="form-control">	
				</div>
				
				<div class="col-md-8 form-group">
					<label class="control-label" for="inputSuccess1">Empresa onde trabalha</label>
					<input type="text" name="guarantor_conjuge_business" class="form-control">
				</div>
				
				<div class="col-md-4 form-group">
					<label class="control-label" for="inputSuccess1">CNPJ</label>
					
					<input type="text" name="guarantor_conjuge_cnpj" data-mask="99.999.999-9999/99" onBlur="ValidarCNPJ(form1.guarantor_cnpj);" class="form-control">	
				</div>
				
				<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">Vínculo empregatício</label>
					<select name="guarantor_conjuge_clt"  class="selectpicker show-tick form-control">
				      <option value="">--Selecione--</option>
			          <option value="Aposentado/Pensionista">Aposentado/Pensionista</option>
			          <option value="Autônomo">Autônomo</option>
			          <option value="Empresário">Empresário</option>
			          <option value="Estudante">Estudante</option>
			          <option value="Funcionário Publico">Funcionário Público</option>							          							          							          
			          <option value="Registro CLT">Registro CLT</option>
			          <option value="Profisional Liberal">Profisional Liberal</option>
			          <option value="Outros">Outros</option>
			        </select>	
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" for="dtnadm">Data de admissão</label>
					<input type="text" name="guarantor_conjuge_admission_date" id="dtadmconjugefiador" onKeyPress="MascaraData(form1.guarantor_conjuge_admission_date);" class="form-control">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" >Cargo/Função</label>
					<input type="text" name="guarantor_conjuge_function"  class="form-control">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" >Pessoa para contato</label>
					<input type="text" name="guarantor_conjuge_contact_person"  class="form-control">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label">Telefone(RH)</label>
					<input type="text" name="guarantor_conjuge_phone_rh" onkeyup="mascara( this, mtel );" maxlength="14"  class="form-control">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label">Ramal</label>
					<input type="text" name="guarantor_conjuge_branch" class="form-control">
				</div>
				<div class="col-md-6 form-group">
					<label class="control-label">E-mail</label>
					<input type="email" name="guarantor_conjuge_email_business"  class="form-control">
				</div>
				<div class="col-md-2 form-group">
					<label class="control-label">Salário(R$)</label>
					<input type="text" name="guarantor_conjuge_salary" id="salario_conjuge"  class="form-control">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label">Outras rendas(R$)</label>
					<input type="text" name="guarantor_conjuge_rent_other" id="salario_conjuge_outras_rendas" class="form-control">
				</div>
				<div class="col-md-7 form-group">
					<label class="control-label">Origem outras rendas</label>
					<input type="text" name="guarantor_conjuge_origin_other_rent" class="form-control">
				</div>

				<!-- area endereço profissional -->
				<label class="col-md-12 pull-left text-primary">Endereço profissional</label>
				
				<div class="col-md-3 form-group">
					<label class="control-label" for="cep-conjuge">CEP</label>
					<input type="text" id="cep-conjuge" name="guarantor_conjuge_cep_business" type="text" maxlength="9" placeholder="Informe o CEP"   class="cep3 form-control">
				</div>
				<div class="col-md-4 form-group">
					<label class="control-label">Endereço</label>
					<input type="text" id="rua_conjuge" name="guarantor_conjuge_address_business" type="text" placeholder="Nome da Rua / Logradouro" class="form-control">
				</div>
				<div class="col-md-2 form-group">
					<label class="control-label">Número</label>
					<input type="text" name="guarantor_conjuge_number_business" class="form-control">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label">Complemento</label>
					<input type="text" name="guarantor_conjuge_complement_business" class="form-control">
				</div>								
				<div class="col-md-4 form-group">
					<label class="control-label">Bairro</label>
					<input type="text" id="bairro_conjuge" name="guarantor_conjuge_district_business" class="form-control">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" >Cidade</label>
					<input type="text" id="cidade_conjuge" name="guarantor_conjuge_city_business" class="form-control">
				</div>	
				<div class="col-md-3 form-group">
					<label class="control-label">UF</label>
					<select name="guarantor_conjuge_uf_business" class="selectpicker show-tick form-control">
			           <option value="">{{(!empty($proposals->proposal_natural_uf) ? $proposals->proposal_natural_uf : '-- Selecione --')}}</option>
        	@include('proposal.uf')
			        </select>	
				</div>	
	</div>
  </div>	