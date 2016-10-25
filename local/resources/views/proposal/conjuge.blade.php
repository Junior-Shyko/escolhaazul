<div id="e_c">
<div class="col-md-12">
	<h1><label class="pull-left label_titulo">Dados do cônjuge</label></h1>
	
	<p class="text-primary pull-right">Página 2 de 3</p> 	
  </div>		
		
			<div class="col-md-3 form-group">
				<label class="control-label" for="inputSuccess1">CPF*</label>
				<input type="text" name="proposal_conjuge_cpf"  class="form-control" value="{{$proposals->proposal_conjuge_cpf}}" id="cpf" onBlur="javascript:validaCPF(this);">
		    </div>
		    <div class="col-md-3 renda_conjuge">
		    	<label style="margin-left: 20px; padding: 15px;font-size: 16pt;">Compõe renda?</label>
		    		
			            <input type="radio" id="compoeRenda_conjuge" name="compoeRenda_conjuge" onclick="optRendaConjuge()" style="  margin-left: 20px;"/>
			            <label for="compoeRenda_conjuge">Sim</label>
			      
			            <input type="radio" id="compoeRenda_conjuge" name="compoeRenda_conjuge" onclick="optRendaConjuge()" style="  margin-left: 20px;"/>
			            <label for="compoeRenda_conjuge">Não</label>			      		        
				
		    </div>
		    <div class="clearfix">
		    	<div class="row"></div>
		    </div>
			<div class="col-md-12 form-group required-field-block">
				<label class="control-label" for="inputSuccess1">Nome completo*</label>
				<input type="text" name="proposal_conjuge_name"  class="form-control" value="{{$proposals->proposal_conjuge_name}}">
				
		    </div>

			<div class="col-md-3 form-group">
				<label class="control-label">Sexo</label>					
		        <select name="proposal_conjuge_sex" class="selectpicker show-tick form-control">
		        <option>{{(!empty($proposals->proposal_conjuge_sex) ? $proposals->proposal_conjuge_sex : '--Selecione--')}}</option> 
		          <option value="">-- Selecione --</option>
          		 <option value="Masculino">Masculino</option>
          		 <option value="Feminino">Feminino</option>		        
		        </select>	     
			</div>
			<div class="col-md-3 form-group">
				<label class="control-label" for="dtn">Data de nascimento</label>
				<input type="text" name="proposal_conjuge_date_brith" onKeyPress="MascaraData(form1.proposal_conjuge_date_brith);" id="dtn_conjuge" maxlength="10"   class="form-control" value="{{ empty($proposals->proposal_conjuge_date_brith) ? "" : (date("d/m/Y" , strtotime($proposals->proposal_conjuge_date_brith)) )}}">

			</div>

			<div class="col-md-3 form-group">
				<label class="control-label" for="">Identidade</label>
				<input type="text" name="proposal_conjuge_identity" id="identidade_conjuge"  class="form-control" value="{{$proposals->proposal_conjuge_identity}}">
			</div>
			
			<div class="col-md-3 form-group">
				<label class="control-label" for="">Órgão expeditor</label>
   			 <input type="text" name="proposal_conjuge_organ_issuing"  class="form-control" maxlength="8" value="{{(empty($proposals->proposal_conjuge_organ_issuing) ? "" : $proposals->proposal_conjuge_organ_issuing)}}">
			</div>
			
			<div class="col-md-3 form-group">
					<label class="control-label"  for="inputSuccess1">Nacionalidade</label>
					
					 <input type="text" name="proposal_conjuge_nationality"  value="{{empty($proposals->proposal_conjuge_nationality) ? "Brasileiro" : $proposals->proposal_conjuge_nationality}}"  class="form-control">
					
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">Grau de instrução</label>
					<select name="proposal_conjuge_degree_education" class="selectpicker show-tick form-control">
					 <option>{{(!empty($proposals->proposal_conjuge_degree_education) ? $proposals->proposal_conjuge_degree_education : '--Selecione--')}}</option> 
			          <option value="Fundamental">Fundamental</option>
			          <option value="Ensino Médi">Ensino médio</option>
			          <option value="Superior">Superior</option>
			          <option value="Outros">Outros</option>
			        </select>	
				</div>	
				<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">Naturalidade</label>
					<input type="text" name="proposal_conjuge_natural"  class="form-control" value="{{$proposals->proposal_conjuge_natural}}">
				</div>
				
				<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">UF</label>
					<select name="proposal_conjuge_uf" class="selectpicker show-tick form-control">
					 <option>{{(!empty($proposals->proposal_conjuge_uf) ? $proposals->proposal_conjuge_uf : '--Selecione--')}}</option> 
			        	@include('proposal.uf')
			        </select>	
				</div>
				             
            	<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">Telefone</label>
					<input type="text" name="proposal_conjuge_phone_fixed" id="telefone_residencial" data-mask="(99)9999-9999"   class="form-control" value="{{$proposals->proposal_conjuge_phone_fixed}}">
				</div>	
            	
            	<div class="col-md-3 form-group">
						<label class="control-label" for="inputSuccess1">Celular</label>
						<input type="text" name="proposal_conjuge_phone_cel1" id="conjuge_celular1" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->proposal_conjuge_phone_cel1s}}">
				</div>	
            	
            	<div class="col-md-3 form-group">
						<label class="control-label" for="inputSuccess1">Celular</label>
						<input type="text" name="proposal_conjuge_phone_cel2" id="conjuge_celular2" onkeyup="mascara( this, mtel );"  maxlength="15"  class="form-control" value="{{$proposals->proposal_conjuge_phone_cel2}}">
				</div>	
            	
            	<div class="col-md-6 form-group">
						<label class="control-label" for="inputSuccess1">E-mail</label>
						<input type="email" name="proposal_conjuge_email"  class="form-control" value="{{$proposals->proposal_conjuge_email}}">
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
	
			<div id="compoe_renda" class="col-md-12">
			<div class="col-md-12">
				<label class="pull-left label_titulo">Dados profissionais do cônjuge</label> 
				
			</div>
				<div class="col-md-6 form-group">
					<label class="control-label" for="inputSuccess1">Profissão</label>
					<input type="text" name="proposal_conjuge_profission"  class="form-control" value="{{$proposals->proposal_conjuge_profission}}">
				</div>
				
				<div class="col-md-6 form-group">
					<label class="control-label" for="inputSuccess1">Atividade (em caso de autônomo)</label>
					<input type="text" name="proposal_conjuge_activity"  class="form-control" value="{{$proposals->proposal_conjuge_activity}}">	
				</div>
				
				<div class="col-md-8 form-group">
					<label class="control-label" for="inputSuccess1">Empresa onde trabalha</label>
					<input type="text" name="proposal_conjuge_business"  class="form-control" value="{{$proposals->proposal_conjuge_business}}">
				</div>
				
				<div class="col-md-4 form-group">
					<label class="control-label" for="inputSuccess1">CNPJ</label>
					
					<input type="text" name="proposal_conjuge_cnpj" data-mask="99.999.999-9999/99" onBlur="ValidarCNPJ(form1.proposal_cnpj);"  class="form-control" value="{{$proposals->proposal_conjuge_cnpj}}">	
				</div>
				
				<div class="col-md-3 form-group">
					<label class="control-label" for="inputSuccess1">Vínculo empregatício</label>
					<select name="proposal_conjuge_clt"  class="selectpicker show-tick form-control">
			          <option>{{(!empty($proposals->proposal_conjuge_clt) ? $proposals->proposal_conjuge_clt : '--Selecione--')}}</option> 
			          <option value="Aposentado/Pensionista">Aposentado/Pensionista</option>
			          <option value="Autônomo">Autônomo</option>
			          <option value="Empresário">Empresário</option>
			          <option value="Estudante">Estudante</option>
			          <option value="Funcionário Publico">Funcionário Público</option>					          							          							          
			          <option value="Registro CLT">Registro CLT</option>
			          <option value="Profisional Liberal">Profisional Liberal</option>
			          <option value="Renda proveniente de aluguéis">Renda proveniente de aluguéis</option>
			        </select>	
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" for="dtnadm">Data de admissão</label>
					<input type="text" name="proposal_conjuge_admission_date" id="dtconjugeadmissao" data-mask="99/99/9999"  class="form-control" value="{{ empty($proposals->proposal_conjuge_admission_date) ? "" : (date("d/m/Y" , strtotime($proposals->proposal_conjuge_admission_date)) )}}">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" >Cargo/Função</label>
					<input type="text" name="proposal_conjuge_function"   class="form-control" value="{{$proposals->proposal_conjuge_function}}">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" >Pessoa para contato</label>
					<input type="text" name="proposal_conjuge_contact_person"   class="form-control" value="{{$proposals->proposal_conjuge_contact_person}}">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label">Telefone(RH)</label>
					<input type="text" name="proposal_conjuge_phone_rh" data-mask="(99) 9999-9999 "  class="form-control" value="{{$proposals->proposal_conjuge_phone_rh}}">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label">Ramal</label>
					<input type="text" name="proposal_conjuge_branch"  class="form-control" value="{{$proposals->proposal_conjuge_branch}}">
				</div>
				<div class="col-md-6 form-group">
					<label class="control-label">E-mail</label>
					<input type="email" name="proposal_conjuge_email_business"   class="form-control" value="{{$proposals->proposal_conjuge_email_business}}">
				</div>
				<div class="col-md-2 form-group">
					<label class="control-label">Salário(R$)</label>
					<input type="text" name="proposal_conjuge_salary" id="salario_conjuge"   class="form-control" value="{{$proposals->proposal_conjuge_salary}}">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label">Outras rendas(R$)</label>
					<input type="text" name="proposal_conjuge_rent_other" id="salario_conjuge_outras_rendas"  class="form-control" value="{{$proposals->proposal_conjuge_rent_other}}">
				</div>
				<div class="col-md-7 form-group">
					<label class="control-label">Origem outras rendas</label>
					<input type="text" name="proposal_conjuge_origin_other_rent"  class="form-control" value="{{$proposals->proposal_conjuge_origin_other_rent}}">
				</div>

				<!-- area endereço profissional -->
				<label class="col-md-12 pull-left text-primary">Endereço profissional</label>
				
				<div class="col-md-3 form-group">
					<label class="control-label" for="cep-conjuge">CEP</label>
					<input type="text" id="cep-conjuge" name="proposal_conjuge_cep_business" type="text" maxlength="9" placeholder="Informe o CEP"   class="cep3 form-control"  value="{{$proposals->proposal_conjuge_cep_business}}" >
				</div>
				<div class="col-md-4 form-group">
					<label class="control-label">Endereço</label>
					<input type="text" id="rua_conjuge" name="proposal_conjuge_address_business" type="text" placeholder="Nome da Rua / Logradouro"  class="form-control" value="{{$proposals->proposal_conjuge_address_business}}">
				</div>
				<div class="col-md-2 form-group">
					<label class="control-label">Número</label>
					<input type="text" name="proposal_conjuge_number_business"  class="form-control" value="{{$proposals->proposal_conjuge_number_business}}">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label">Complemento</label>
					<input type="text" name="proposal_conjuge_complement_business"  class="form-control" value="{{$proposals->proposal_conjuge_complement_business}}">
				</div>								
				<div class="col-md-4 form-group">
					<label class="control-label">Bairro</label>
					<input type="text" id="bairro_conjuge" name="proposal_conjuge_district_business"  class="form-control" value="{{$proposals->proposal_conjuge_district_business}}">
				</div>
				<div class="col-md-3 form-group">
					<label class="control-label" >Cidade</label>
					<input type="text" id="cidade_conjuge" name="proposal_conjuge_city_business"  class="form-control" value="{{$proposals->proposal_conjuge_city_business}}">
				</div>	
				<div class="col-md-3 form-group">
					<label class="control-label">UF</label>
					<select name="proposal_conjuge_uf_business" class="selectpicker show-tick form-control">
					 <option>{{(!empty($proposals->proposal_conjuge_uf_business) ? $proposals->proposal_conjuge_uf_business : '--Selecione--')}}</option>
			           @include('proposal.uf')
			        </select>	
				</div>	
	</div>
</div>	