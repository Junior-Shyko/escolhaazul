
<div id="fiador_ec">
@include('proposal.pf.guarantor.spouse_guarantor')
</div>
  <div class="col-md-12 box">
		<div class="col-md-12">
			<label class="pull-left label_titulo">Referências e Recomendações</label> 	  						
		</div>
		
    	<div class="col-md-1">
    	
    	</div>
    	<div class="col-md-10 alert alert-info">
    		<strong>Selecione</strong> o campo desejado para adicionar suas referências
    	</div>


	<div class="row">
		<div class="clearfix"></div>
	</div>
	<div class="col-md-12">
		<div class="funkyradio pull-left">
	        <div class="funkyradio-primary">
	            <input type="checkbox"  id="ref_imobiliaria" onclick="optRefImobiliaria()" />
	            <label for="ref_imobiliaria">Imobiliárias </label><small class="text-danger"> (Administradores ou particulares onde alugou imóvel)</small>
	        </div>       
		</div>
		
	</div>
	
<div id="referencia_imob">
	<div class="col-md-12 form-group">
		<label class="control-label">(1) Nome</label>
		<input type="text" name="guarantor_name_immobile" class="form-control">
	</div>
	
	<div class="col-md-3">
		<label class="control-label" for="inputSuccess1">CPF / CNPJ</label>
		<input type="text" name="guarantor_immobile_cnpj" class="form-control" >
	</div>
		<div class="col-md-3">
		<label class="control-label" >CRECI</label>
		<input type="text" name="guarantor_creci" class="form-control">
	</div>

	<div class="col-md-3">
		<label class="control-label">Telefone</label>
		<input type="text" name="guarantor_phone_immobile" data-mask="(99) 9999-9999 " class="form-control">
	</div>
	
	<div class="col-md-3">
		<label class="control-label" >Celular</label>
		<input type="text" name="guarantor_phone_mobile" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control">
	</div>	
	<div class="col-md-5 form-group">
		<label class="control-label">E-mail</label>
		<input type="email" name="guarantor_email_immobile" class="form-control">
	</div>
	<!--SEGUNDO -->
	
	<div class="col-md-12">
	  	<div class="panel panel-default">
		    <div class="panel-heading">
				<h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseImobiliaria"><span class="glyphicon glyphicon-plus">
                    </span>Adicionar</a>
                </h4>
			</div>
		    <div id="collapseImobiliaria" class="panel-collapse collapse panel-body">
		    	<div class="col-md-12 form-group">
					<label class="control-label">(2) Nome</label>
					<input type="text" name="guarantor_name_immobile2" class="form-control">
				</div>
				
				<div class="col-md-3">
					<label class="control-label">CPF / CNPJ</label>
					<input type="text" name="guarantor_immobile_cnpj2" class="form-control">
				</div>
					<div class="col-md-3">
					<label class="control-label" >CRECI</label>
					<input type="text" name="guarantor_creci2" id="dtn" class="form-control">
				</div>
			
				<div class="col-md-3">
					<label class="control-label">Telefone</label>
					<input type="text" name="guarantor_phone_immobile2" data-mask="(99) 9999-9999 " class="form-control">
				</div>
				
				<div class="col-md-3">
					<label class="control-label" >Celular</label>
					<input type="text" name="guarantor_phone_mobile" onkeyup="mascara( this, mtel );" maxlength="15" class="form-control">
				</div>	
				<div class="col-md-5 form-group">
					<label class="control-label">E-mail</label>
					<input type="email" name="guarantor_email_immobile2" class="form-control">
					
				</div>
	
		    </div>
	    </div>
	</div> 
</div><!--fim ref imob -->	

<!--========COMERCIAIS============-->
	<div class="col-md-12">
		<div class="funkyradio pull-left">
	        <div class="funkyradio-primary">
	            <input type="checkbox" id="ref_comerciais" onclick="optRefComerciais()" />
	            <label for="ref_comerciais">Comerciais </label> <small class="text-danger"> (Empresa onde costuma comprar a prazo)</small>
	        </div>       
		</div>
		
	</div>
	
<div id="referencia_com">
<div class="col-md-8 form-group">
		<label class="control-label">(1) Nome</label>
		<input type="text" name="guarantor_commercial_name" class="form-control">
	</div>
	
	<div class="col-md-4 form-group">
		<label class="control-label" for="inputSuccess1">CNPJ</label>
		<input type="text" name="guarantor_commercial_cpf" data-mask="99.999.999-9999/99" class="form-control">
	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">Qual a relação?</label>					
        <select name="guarantor_commercial_relation" class="selectpicker show-tick form-control">
          <option value=""selected>--Selecione--</option>	
          <option value="Amigo">Amigo</option>
          <option value="Profissional">Profissional</option> 
          <option value="Parente">Parente</option>
          <option value="Outros">Outros</option>           
        </select>	     
	</div>

	<div class="col-md-3 form-group">
		<label class="control-label">Telefone</label>
		<input type="text" name="guarantor_commercial_fixed_phone" data-mask="(99) 9999-9999" class="form-control">
	</div>
	
	<div class="col-md-3 form-group">
		<label class="control-label">Celular</label>
		<input type="text" name="guarantor_commercial_phone" onkeyup="mascara( this, mtel );" maxlength="15"   class="form-control">
	</div>	
	<div class="col-md-5 form-group">
		<label class="control-label">E-mail</label>
		<input type="email" name="guarantor_commercial_email"  class="form-control">
	</div>
	<div class="col-md-12">
	  	<div class="panel panel-default">
		    <div class="panel-heading">
				<h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseComercio"><span class="glyphicon glyphicon-plus">
                    </span>Adicionar</a>
                </h4>
			</div>
		    <div id="collapseComercio" class="panel-collapse collapse panel-body">
		    	<div class="col-md-7 ">
					<label class="control-label">(2) Nome</label>
					<input type="text" name="guarantor_commercial_name2" class="form-control">
				</div>
				
				<div class="col-md-5 ">
					<label class="control-label" for="inputSuccess1">CNPJ</label>
					<input type="text" name="guarantor_commercial_cpf2" data-mask="99.999.999-9999/99" class="form-control">
				</div>
							
				<div class="col-md-3 ">
					<label class="control-label">Telefone</label>
					<input type="text" name="guarantor_commercial_fixed_phone2" data-mask="(99) 9999-9999" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label">Celular</label>
					<input type="text" name="guarantor_commercial_phone2" onkeyup="mascara( this, mtel );" maxlength="15"   class="form-control">
				</div>	
				<div class="col-md-5 ">
					<label class="control-label">E-mail</label>
					<input type="email" name="guarantor_commercial_email2"  class="form-control">
				</div>
	
		    </div>
	    </div>
	</div>
</div>	
	<!--========FIM COMERCIAIS============-->
	
<!--========COMERCIAIS============-->
	<div class="col-md-12">
		<div class="funkyradio pull-left">
	        <div class="funkyradio-primary">
	            <input type="checkbox" id="ref_pessoais" onclick="optRefPessoais()" />
	            <label for="ref_pessoais">Pessoais</label>
	        </div>       
		</div>
	</div>
	
<div id="referencia_pes">
<div class="col-md-9 form-group">
		<label class="control-label">(1) Nome</label>
		<input type="text" name="guarantor_person_name1" class="form-control">
	</div>
	
	<div class="col-md-3 form-group">
		<label class="control-label" for="inputSuccess1">CPF</label>
		<input type="text" name="guarantor_person_cpf1" class="form-control">
	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">Qual a relação?</label>					
        <select name="guarantor_person_relation1" class="selectpicker show-tick form-control">
		  <option value=""selected>--Selecione--</option>	
          <option value="Amigo">Amigo</option>
          <option value="Profissional">Profissional</option> 
          <option value="Parente">Parente</option>
          <option value="Outros">Outros</option>         
        </select>	     
	</div>

	<div class="col-md-3 form-group">
		<label class="control-label">Telefone</label>
		<input type="text" name="guarantor_person_phone_fixed1" data-mask="(99) 9999-9999" class="form-control">
	</div>
	
	<div class="col-md-3 form-group">
		<label class="control-label" >Celular</label>
		<input type="text" name="guarantor_person_phone1" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control">
	</div>	
	<div class="col-md-5 form-group">
		<label class="control-label" >E-mail</label>
		<input type="email" name="guarantor_person_email1" class="form-control">
	</div>
		<!--***** ACORDION *****-->
	<div class="col-md-12">
	  	<div class="panel panel-default">
		    <div class="panel-heading">
				<h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapsePessoais"><span class="glyphicon glyphicon-plus">
                    </span>Adicionar</a>
                </h4>
			</div>
		    <div id="collapsePessoais" class="panel-collapse collapse panel-body">
		    	<div class="col-md-9 ">
					<label class="control-label">(2) Nome</label>
					<input type="text" name="guarantor_person_name2" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label" for="inputSuccess1">CPF</label>
					<input type="text" name="guarantor_person_cpf2" id="cpf" class="form-control" onBlur="javascript:validaCPF(this);">
				</div>
				<div class="col-md-4">
					<label class="control-label">Qual a relação?</label>					
			        <select name="guarantor_person_relation2" class="selectpicker show-tick form-control">
			          <option value=""selected>--Selecione--</option>	
			          <option value="Amigo">Amigo</option>
			          <option value="Conhecido">Conhecido</option> 
			          <option value="Parente">Parente</option>
			          <option value="Outros">Outros</option>            
			        </select>	     
				</div>
			
				<div class="col-md-3">
					<label class="control-label">Telefone</label>
					<input type="text" name="guarantor_person_phone_fixed2" data-mask="(99) 9999-9999" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label" >Celular</label>
					<input type="text" name="guarantor_person_phone2" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control">
				</div>	
				<div class="col-md-5 form-group">
					<label class="control-label" >E-mail</label>
					<input type="email" name="guarantor_person_email2" class="form-control">
				</div>
		    </div>
	    </div>
	</div>
</div>	
	<!--========FIM COMERCIAIS============-->
		
	<!--========BANCÁRIAS============-->
	<div class="col-md-12">
		<div class="funkyradio pull-left">
	        <div class="funkyradio-primary">
	            <input type="checkbox" id="ref_bancarias" onclick="optRefBancarias()" />
	            <label for="ref_bancarias">Bancárias</label>
	        </div>       
		</div>
	</div>
<div id="referencia_banco">
	<div class="col-md-3 form-group">
		<label class="control-label">Conta Corrente</label>					
        <input type="text" name="guarantor_banking_current" class="form-control">	     
	</div>
	<div class="col-md-6 form-group">
		<label class="control-label">Banco</label>
		<input type="text" name="guarantor_banking_name" class="form-control">
	</div>
	
	<div class="col-md-3 form-group">
		<label class="control-label" >Agência</label>
		<input type="text" name="guarantor_banking_agency" class="form-control">
	</div>	

	<div class="col-md-4 form-group">
		<label class="control-label">Nome Gerente</label>
		<input type="text" name="guarantor_banking_name_manager" class="form-control">
	</div>
	
	<div class="col-md-3 form-group">
		<label class="control-label" >Telefone</label>
		<input type="text" name="guarantor_banking_name_phone" onkeyup="mascara( this, mtel );" maxlength="14" class="form-control">
	</div>	
	<div class="col-md-5 form-group">
		<label class="control-label" >E-mail</label>
		<input type="email" name="guarantor_banking_email" class="form-control">
	</div>
	<div class="col-md-3 form-group">
		<label class="control-label">Cliente desde</label>
		<input type="text" name="guarantor_banking_client_begin" id="cliente_desde" onKeyPress="MascaraData(form1.guarantor_banking_client_begin);" class="form-control">
	</div>
	
	<div class="col-md-4 form-group">
		<label class="control-label" >Crédito pré-aprovado</label>
		<input type="text" name="guarantor_banking_pre_aproved" id="fiador_pre_aprovado" class="form-control">
	</div>	
	<div class="col-md-5 form-group">
		<label class="control-label" >Origem outras rendas</label>
		<input type="text" name="guarantor_banking_origin_rent"  class="form-control">
	</div>	
	<div class="col-md-3 form-group">
		<label class="control-label">Cartão de Crédito</label>					
        <select name="guarantor_banking_card_credit" class="selectpicker show-tick form-control">
          <option value=""selected> -- Selecione -- </option>
          <option value="MasterCard">MasterCard</option>
          <option value="Visa">Visa</option> 
          <option value="American Express">American Express</option> 
          <option value="Diners Club‎">Diners Club‎ </option>
          <option value="Outros">Outros</option>                        
        </select>	     
	</div>
	<div class="col-md-3 form-group">
		<label class="control-label" >Limite (R$)</label>
		<input type="text" name="guarantor_banking_limit1" id="limite1_banco" class="form-control">
	</div>
	<div class="col-md-3 form-group">
		<label class="control-label">Cartão de Crédito</label>					
        <select name="guarantor_banking_card_credit2" class="selectpicker show-tick form-control">
          <option value=""selected> -- Selecione -- </option>
          <option value="MasterCard">MasterCard</option>
          <option value="Visa">Visa</option> 
          <option value="American Express">American Express</option> 
          <option value="Diners Club‎">Diners Club‎ </option>      
          <option value="Outros">Outros</option>      
        </select>	     
	</div>
	<div class="col-md-3 form-group">
		<label class="control-label" >Limite (R$)</label>
		<input type="text" name="guarantor_banking_limit2" id="limite2_banco" class="form-control">
	</div>

	<div class="col-md-12 form-group">
		<div class="row">
			<hr />
		</div>
	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">1 - Poupança / Aplicações (R$)</label>
		<input type="text" name="guarantor_banking_app" id="aplicacao1" class="form-control">
	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">Banco</label>
		<input type="text" name="guarantor_banking_app_bank"  class="form-control">
	</div>
	<div class="col-md-2 form-group">
		<label class="control-label">Agência</label>
		<input type="text" name="guarantor_banking_app_agency" class="form-control">
	</div>
	<div class="col-md-2 form-group">
		<label class="control-label">Conta (nº)</label>
		<input type="text" name="guarantor_banking_app_ref"  class="form-control">
	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">2 - Poupança / Aplicações (R$)</label>
		<input type="text" name="guarantor_banking_app2" id="aplicacao2"  class="form-control">
	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">Banco</label>
		<input type="text" name="guarantor_banking_app_bank2"  class="form-control">
	</div>
	<div class="col-md-2 form-group">
		<label class="control-label">Agência</label>
		<input type="text" name="guarantor_banking_app_agency2"  class="form-control">
	</div>
	<div class="col-md-2 form-group">
		<label class="control-label">Conta (nº)</label>
		<input type="text" name="guarantor_banking_app_ref2" class="form-control">
	</div>			
</div>		
	<!--========FIM BANCÁRIAS============-->	
	
	
	<!--========OS BENS============-->
<div class="col-md-12">
	<div class="row">
		<hr class="separete_division"/>
	</div>
</div>
<div class="col-md-12">
	<label class="pull-left label_titulo">Bens</label> 	  						
</div>

	<div class="col-md-12">
		<div class="funkyradio pull-left">
	        <div class="funkyradio-primary">
	            <input type="checkbox" id="ref_imoveis" onclick="optRefImoveis()" />
	            <label for="ref_imoveis">Imóveis</label>
	        </div>       
		</div>
	</div>
<div id="referencia_imoveis">	
	<div class="col-md-3 form-group">
		<label class="control-label">CEP</label>
		<input type="text" name="guarantor_immobile_cep" id="cep-bens" class="cep4 form-control">

	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">Endereço</label>
		<input type="text" name="guarantor_immobile_address"  id="bens_rua" class="form-control">
	</div>
	<div class="col-md-2 form-group">
		<label class="control-label">Número</label>
		<input type="text" name="guarantor_immobile_address_number" class="form-control">
	</div>
	<div class="col-md-3 form-group">
		<label class="control-label">Complemento</label>
		<input type="text" name="guarantor_immobile_address_complement" class="form-control">
	</div>
	
		<div class="col-md-4 form-group">
		<label class="control-label">Bairro</label>
		<input type="text" name="guarantor_immobile_district" id="bens_bairro" class="form-control">
	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">Cidade</label>
		<input type="text" name="guarantor_immobile_city" id="bens_cidade"  class="form-control">
	</div>
	<div class="col-md-4 form-group">
		<label class="control-label">UF</label>					
        <select name="guarantor_immobile_uf" class="selectpicker show-tick form-control">
 			<option value="">{{(!empty($proposals->proposal_natural_uf) ? $proposals->proposal_natural_uf : '-- Selecione --')}}</option>
        	@include('proposal.uf')
        </select>	     
	</div>
	<div class="col-md-3 form-group">
		<label class="control-label">Valor</label>
		<div class="input-group">
		  <span class="input-group-addon">R$</span>
		  <input type="text" name="guarantor_immobile_value" id="valor_bens" class="form-control">
		</div>
	</div>
	<div class="col-md-2 form-group">
		<label class="control-label">Financiado?</label>					
        <select name="guarantor_immobile_finance" class="selectpicker show-tick form-control">
          <option value=""selected>Selecione</option>
          <option>Sim</option>
          <option>Não</option>
        
        </select>	     
	</div>
	<div class="col-md-3 form-group">
		<label class="control-label">Matrícula</label>
		<input type="text" name="guarantor_immobile_mat" class="form-control">
	</div>
	<div class="col-md-8 form-group">
		<label class="control-label">Cartório</label>
		<input type="text" name="guarantor_immobile_car" class="form-control">
	</div>
	<div class="col-md-12">
	  	<div class="panel panel-default">
		    <div class="panel-heading">
				<h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseBens"><span class="glyphicon glyphicon-plus">
                    </span>Adicionar</a>
                </h4>
			</div>
		    <div id="collapseBens" class="panel-collapse collapse panel-body">
		    	<div class="col-md-3 ">
					<label class="control-label" for="cep-bens2">CEP</label>
					<input type="text" name="guarantor_immobile_cep2" id="cep-bens2" class="cep5 form-control">
					
				</div>
				<div class="col-md-4 ">
					<label class="control-label">Endereço</label>
					<input type="text" id="bens_rua2" name="guarantor_immobile_address2" class="form-control">
				</div>
				<div class="col-md-2 ">
					<label class="control-label">Número</label>
					<input type="text" name="guarantor_immobile_address_number2" class="form-control">
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Complemento</label>
					<input type="text" name="guarantor_immobile_address_complement2" class="form-control">
				</div>
				
					<div class="col-md-5 ">
					<label class="control-label">Bairro</label>
					<input type="text" id="bens_bairro2" name="guarantor_immobile_district2"  class="form-control">
				</div>
				<div class="col-md-5 ">
					<label class="control-label">Cidade</label>
					<input type="text" id="bens_cidade2" name="guarantor_immobile_city2" class="form-control">
				</div>
				<div class="col-md-4">
					<label class="control-label">UF</label>					
			        <select name="guarantor_immobile_uf2" class="selectpicker show-tick form-control">
			 			<option value="">{{(!empty($proposals->proposal_natural_uf) ? $proposals->proposal_natural_uf : ' -- Selecione --')}}</option>
        				@include('proposal.uf')
			        </select>	     
				</div>
					<div class="col-md-3">
					<label class="control-label">Valor</label>
					<div class="input-group">
					  <span class="input-group-addon">R$</span>
					  <input type="text" name="guarantor_immobile_value2" id="valor_bens2" class="form-control">
					</div>
				</div>
				<div class="col-md-2 ">
					<label class="control-label">Financiado?</label>					
			        <select name="guarantor_immobile_finance2" class="selectpicker show-tick form-control">
			          <option value=""selected>Selecione</option>
			          <option>Sim</option>
			          <option>Não</option>
			        
			        </select>	     
				</div>
				<div class="col-md-4">
					<label class="control-label">Matrícula</label>
					<input type="text" name="guarantor_immobile_mat2" class="form-control">
				</div>
				<div class="col-md-8">
					<label class="control-label">Cartório</label>
					<input type="text" name="guarantor_immobile_car2" class="form-control">
				</div>
		    </div>
	    </div>
	</div>
</div>	<!-- fim imoveis -->

	
		<!--========VEICULOS============-->
	<div class="col-md-12 form-group">
		<div class="row">
			<hr />
		</div>
	</div>

	<div class="col-md-12">
		<div class="funkyradio pull-left">
	        <div class="funkyradio-primary">
	            <input type="checkbox" id="ref_veiculos" onclick="optRefVeiculos()" />
	            <label for="ref_veiculos">Veículos</label>
	        </div>       
		</div>
	</div>
<div id="referencia_veiculo">
	<div class="col-md-3 form-group">
		<label class="control-label">Marca</label>	
		<input type="text" name="guarantor_vehicle_mark"  class="form-control">				
             
	</div>

	<div class="col-md-3 form-group">
		<label class="control-label">Modelo</label>
		<input type="text" name="guarantor_vehicle_model"  class="form-control">
	</div>
	<div class="col-md-2 form-group">
		<label class="control-label" >Ano</label>
		<input type="text" name="guarantor_vehicle_year" class="form-control">
	</div>
	
	<div class="col-md-3 form-group">
		<label class="control-label">Placa</label>
		<input type="text" name="guarantor_vehicle_plaque" class="form-control">
	</div>
	
	<div class="col-md-3 form-group">
		<label class="control-label">Financiado?</label>					
        <select name="guarantor_vehicle_finance" class="selectpicker show-tick form-control">
         <option value=""selected> -- Selecione -- </option>
          <option value="Sim">Sim</option>
          <option value="Não">Não</option>
        
        </select>	     
	</div>
	<div class="col-md-5 form-group">
		<label class="control-label">Financeira</label>
		<input type="text" name="guarantor_vehicle_financial" class="form-control">
	</div>
	<div class="col-md-3 form-group">
		<label class="control-label">Valor</label>
		<div class="input-group">
		  <span class="input-group-addon">R$</span>
		  <input type="text" name="guarantor_vehicle_value" id="valor_veiculos" class="form-control">
		</div>
	</div>
	<div class="col-md-12">
	  	<div class="panel panel-default">
		    <div class="panel-heading">
				<h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseVeiculos"><span class="glyphicon glyphicon-plus">
                    </span>Adicionar</a>
                </h4>
			</div>
		    <div id="collapseVeiculos" class="panel-collapse collapse panel-body">
		    	<div class="col-md-3 ">
					<label class="control-label">Marca</label>	
					<input type="text" name="guarantor_vehicle_mark2"  class="form-control">	
				</div>
			
				<div class="col-md-3 ">
					<label class="control-label">Modelo</label>
					<input type="text" name="guarantor_vehicle_model2"  class="form-control">
				</div>
				<div class="col-md-2 ">
					<label class="control-label" >Ano</label>
					<input type="text" name="guarantor_vehicle_year2" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label">Placa</label>
					<input type="text" name="guarantor_vehicle_plaque2" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label">Financiado?</label>					
			        <select name="guarantor_vehicle_finance2" class="selectpicker show-tick form-control">
			           <option value="" selected>--Selecione--</option>
			          <option value="Sim">Sim</option>
			          <option value="Não" >Não</option>
			        
			        </select>	     
				</div>
				<div class="col-md-5 form-group">
					<label class="control-label">Financeira</label>
					<input type="text" name="guarantor_vehicle_financial2" class="form-control">
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Valor</label>
					<div class="input-group">
					  <span class="input-group-addon">R$</span>
					  <input type="text" name="guarantor_vehicle_value2" id="valor_veiculos2" class="form-control">
					</div>
				</div>
		    </div>
	    </div>
	</div>
</div>		
	<!--========FIM BENS============-->
  	</div>

