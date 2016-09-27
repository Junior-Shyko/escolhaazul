<div class="col-md-12 ">
	
	<!--inicio box -->
<div class="col-md-12 box">	
	<div class="col-md-12">
		<label class="pull-left label_titulo">Referências</label> 	  						
	</div>
	<div class="alert-info col-md-12 form-group">
    	<strong>Selecione</strong> o campo desejado para adicionar suas referências
  	</div>
	<div class="col-md-12">
		<div class="pull-left">
	        <div class="">
	            <input type="checkbox"  id="ref_imobiliaria" onclick="optRefImobiliaria()" />
	            <label for="ref_imobiliaria">Imobiliárias </label>
	        </div>       
		</div>
		<p class="span_p"> ( Administradores ou particulares onde alugou imóvel)</p>
	</div>

<div id="referencia_imob">
	<div class="col-md-12 ">
		<label class="control-label">(1) Nome</label>
		<input type="text" name="legal_location_immobile_name" class="form-control">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label" for="inputSuccess1">CPF / CNPJ</label>
		<input type="text" name="legal_location_immobile_cnpj" class="form-control" >
	</div>
	<div class="col-md-3 ">
		<label class="control-label" >CRECI</label>
		<input type="text" name="legal_location_immobile_creci" class="form-control">
	</div>
	<div class="col-md-3 ">
		<label class="control-label">Telefone</label>
		<input type="text" name="legal_location_immobile_phone_fixed" data-mask="(99) 9999-9999" class="form-control">
	</div>	
	<div class="col-md-3 ">
		<label class="control-label" >Celular</label>
		<input type="text" name="legal_location_immobile_mobile" id="juridico_celular_imobiliaria" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control">

	</div>	
	<div class="col-md-5 form-group">
		<label class="control-label">E-mail</label>
		<input type="email" name="legal_location_immobile_email" class="form-control">
	</div>
	<div class="col-md-12">
	  	<div class="panel panel-default">
		    <div class="panel-heading">
				<h4 class="panel-title">
                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseImobiliaria"><span class="glyphicon glyphicon-plus">
                    </span>Adicionar</a>
                </h4>
			</div>
		    <div id="collapseImobiliaria" class="panel-collapse collapse panel-body">
		    	<div class="col-md-12 ">
					<label class="control-label">(2) Nome</label>
					<input type="text" name="legal_location_immobile_name2" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label" for="inputSuccess1">CPF / CNPJ</label>
					<input type="text" name="legal_location_immobile_cnpj2" class="form-control" >
				</div>
				<div class="col-md-3 ">
					<label class="control-label" >CRECI</label>
					<input type="text" name="legal_location_immobile_creci2" class="form-control">
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Telefone</label>
					<input type="text" name="legal_location_immobile_phone_fixed2" data-mask="(99) 9999-9999 " class="form-control">
				</div>	
				<div class="col-md-3 ">
					<label class="control-label" >Celular</label>
					<input type="text" name="legal_location_immobile_mobile2" id="juridico_celular2_imobiliaria" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control">
		
				</div>	
				<div class="col-md-5 ">
					<label class="control-label">E-mail</label>
					<input type="email" name="legal_location_immobile_email2" class="form-control">
				</div>
	
		    </div>
	    </div>
	</div> 
	
</div><!--fim ref imob -->


	<!--========COMERCIAIS============-->
	<div class="col-md-12">
		<div class="pull-left">
	        <div class="">
	            <input type="checkbox" id="ref_comerciais" onclick="optRefComerciais()" />
	            <label for="ref_comerciais">Comerciais </label>
	        </div>       
		</div>
		<p class="span_p">( Empresa onde costuma comprar a prazo)</p>
	</div>
	
<div id="referencia_com">
<div class="col-md-9 ">
		<label class="control-label">(1) Nome</label>
		<input type="text" name="legal_location_commercial_name" class="form-control">
</div>
	
	<div class="col-md-3 ">
		<label class="control-label" for="inputSuccess1">CNPJ</label>
		<input type="text" name="legal_location_commercial_cnpj" data-mask="99.999.999-9999/99" class="form-control">
	</div>
	
	<div class="col-md-3 form-group">
		<label class="control-label">Telefone</label>
		<input type="text" name="legal_location_commercial_phone_fixed" data-mask="(99) 9999-9999" class="form-control">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label">Celular</label>
		<input type="text" name="legal_location_commercial_mobile" id="juridico_celular_comercial" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control">
	
	</div>	
	<div class="col-md-5 ">
		<label class="control-label">E-mail</label>
		<input type="email" name="legal_location_commercial_email"  class="form-control">
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
		    	<div class="col-md-9 ">
					<label class="control-label">(2) Nome</label>
					<input type="text" name="legal_location_commercial_name2" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label" for="inputSuccess1">CNPJ</label>
					<input type="text" name="legal_location_commercial_cnpj2" data-mask="99.999.999-9999/99" class="form-control">
				</div>
							
				<div class="col-md-3 ">
					<label class="control-label">Telefone</label>
					<input type="text" name="legal_location_commercial_phone_fixed2" data-mask="(99) 9999-9999" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label">Celular</label>
					<input type="text" name="legal_location_commercial_mobile2" id="juridico_celular2_comercial" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control">
	
				</div>	
				<div class="col-md-5 ">
					<label class="control-label">E-mail</label>
					<input type="email" name="legal_location_commercial_emai2"  class="form-control">
				</div>
	
		    </div>
	    </div>
	</div>
</div>	
	<!--========FIM COMERCIAIS============-->
	
<!--========Pessoais============-->
	<div class="col-md-12">
		<div class="fpull-left">
	        <div class="">
	            <input type="checkbox" id="ref_pessoais" onclick="optRefPessoais()" />
	            <label for="ref_pessoais">Pessoais</label>
	        </div>       
		</div>
	</div>
	
<div id="referencia_pes">
<div class="col-md-9 ">
		<label class="control-label">(1) Nome</label>
		<input type="text" name="legal_reference_personl_name" class="form-control">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label" for="inputSuccess1">CPF</label>
		<input type="text" name="legal_reference_person_cpf" class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Qual a relação?</label>					
        <select name="legal_reference_personl_relation" class="selectpicker show-tick form-control">
          <option value=""selected>--Selecione--</option>	
          <option value="Amigo">Amigo</option>
          <option value="colega de trabalho">Conhecido</option> 
          <option value="Parente">Parente</option>
          <option value="Outros">Outros</option>         
        </select>	     
	</div>

	<div class="col-md-3">
		<label class="control-label">Telefone</label>
		<input type="text" name="legal_reference_person_phone_fixed" data-mask="(99) 9999-9999" class="form-control">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label" >Celular</label>
		<input type="text" name="legal_reference_personl_mobile" id="juridico_celular_pessoal" onkeyup="mascara( this, mtel );" maxlength="15"   class="form-control">
			
	</div>	
	<div class="col-md-5 form-group">
		<label class="control-label" >E-mail</label>
		<input type="email" name="legal_reference_person_email" class="form-control">
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
					<input type="text" name="legal_reference_personl_name2" id="juridico_celular2_pessoal" onkeyup="mascara( this, mtel );" maxlength="15"   class="form-control">
			
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label" for="inputSuccess1">CPF</label>
					<input type="text" name="legal_reference_person_cpf2" id="cpf" class="form-control" onBlur="javascript:validaCPF(this);">
				</div>
				<div class="col-md-4">
					<label class="control-label">Qual a relação?</label>					
			        <select name="legal_reference_personl_relation2" class="selectpicker show-tick form-control">
			           <option value=""selected>--Selecione--</option>	
			           <option value="Amigo">Amigo</option>
			          <option value="Conhecido">Conhecido</option> 
			          <option value="Parente">Parente</option>
			          <option value="Outros">Outros</option>        
			        </select>	     
				</div>
			
				<div class="col-md-3">
					<label class="control-label">Telefone</label>
					<input type="text" name="legal_reference_person_phone_fixed2" data-mask="(99) 9999-9999" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label" >Celular</label>
					<input type="text" name="legal_reference_personl_mobile2" data-mask="(99) 9999-9999 "class="form-control">
				</div>	
				<div class="col-md-5 form-group">
					<label class="control-label" >E-mail</label>
					<input type="email" name="legal_reference_person_email2" class="form-control">
				</div>
		    </div>
	    </div>
	</div>
</div>	
<!--========FIM Pessoais============-->
		
	<!--========BANCÁRIAS============-->
	<div class="col-md-12">
		<div class="pull-left">
	        <div class="">
	            <input type="checkbox" id="ref_bancarias" onclick="optRefBancarias()" />
	            <label for="ref_bancarias">Bancárias</label>
	        </div>       
		</div>
	</div>
<div id="referencia_banco">
	<div class="col-md-4">
		<label class="control-label">Conta Corrente</label>					
        <input type="text" name="legal_reference_banking_account" class="form-control">	     
	</div>
	<div class="col-md-5">
		<label class="control-label">Banco</label>
		<input type="text" name="legal_reference_banking_bank" class="form-control">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label" >Agência</label>
		<input type="text" name="legal_reference_banking_agency" class="form-control">
	</div>	
	
	<div class="col-md-6 ">
		<label class="control-label">Nome Gerente</label>
		<input type="text" name="legal_reference_banking_manager" class="form-control">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label" >Telefone</label>
		<input type="text" name="legal_reference_banking_phone_fixed" data-mask="(99) 9999-9999" class="form-control">
	</div>	
	<div class="col-md-10">
		<label class="control-label">E-mail</label>
		<input type="email" name="legal_reference_banking_email" class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Cliente desde</label>
		<input type="text" name="legal_reference_banking_client_begin" id="cliente_desde" data-mask="99/99/9999"class="form-control">
	</div>
	
	<div class="col-md-4">
		<label class="control-label" >Crédito pré-aprovado</label>
		<input type="text" name="legal_reference_banking_credit_aproved" id="juridico_credito_aprovado" class="form-control">
	</div>	
		
	<div class="col-md-4">
		<label class="control-label">Cartão de Crédito 01</label>					
        <select name="legal_reference_banking_card_credit1" class="selectpicker show-tick form-control">
          <option value=""selected>--Selecione--</option>	
          <option value="MasterCard">MasterCard</option>
          <option value="Visa">Visa</option> 
          <option value="American Express">American Express</option> 
          <option value="Diners Club‎">Diners Club‎ </option>
         
          <option value="Bancos">Bancos</option>                           
        </select>	     
	</div>
	<div class="col-md-4">
		<label class="control-label" >Limite 01</label>
		<input type="text" name="legal_reference_banking_limit1" id="limite1_banco" class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Cartão de Crédito 02</label>					
        <select name="legal_reference_banking_card_credit2" class="selectpicker show-tick form-control">
         <option value=""selected>--Selecione--</option>	
          <option value="MasterCard">MasterCard</option>
          <option value="Visa">Visa</option> 
          <option value="American Express">American Express</option> 
          <option value="Diners Club‎">Diners Club‎ </option> 
         
          <option value="Bancos">Bancos</option>      
        </select>	     
	</div>
	<div class="col-md-4">
		<label class="control-label" >Limite 02</label>
		<input type="text" name="legal_reference_banking_limit2" id="limite2_banco" class="form-control">
	</div>
	
	<div class="col-md-12 ">
		<div class="row">
			<hr />
		</div>
	</div>
	<div class="col-md-5">
		<label class="control-label">1.Poupança/Aplicação(R$)</label>		
		  <input type="text" name="legal_reference_banking_app1" id="juridico_app1" class="form-control">		
	</div>
	<div class="col-md-7">
		<label class="control-label">Banco</label>
		<input type="text" name="legal_reference_banking_app_bank1"  class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Agência</label>
		<input type="text" name="legal_reference_banking_app_agency1" class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Ref. (nº)</label>
		<input type="text" name="legal_reference_banking_app_ref1"  class="form-control">
	</div>
	<div class="col-md-5">
		<label class="control-label">1.Poupança/Aplicação(R$)</label>
		
		
		  <input type="text" name="legal_reference_banking_app2" id="juridico_app2" class="form-control">
		
	</div>
	<div class="col-md-7">
		<label class="control-label">Banco</label>
		<input type="text" name="legal_reference_banking_app_bank2"  class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Agência</label>
		<input type="text" name="legal_reference_banking_app_agency2"  class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Ref. (nº)</label>
		<input type="text" name="legal_reference_banking_app_ref2" class="form-control">
	</div>			
</div>		
	<!--========FIM BANCÁRIAS============-->	
</div>	
<!--========Inicio Ônus============-->
<div class="col-md-12 box">
<div class="col-md-12">
	<div class="col-md-4">
		<label class="pull-left label_titulo">Dívidas e Ônus Reais</label> 	
		  					
	</div>	
	<div class="col-md-8">
		<span class="glyphicon glyphicon-info-sign info_bonus" data-toggle="tooltip" data-placement="top" title="Devem ser informadas neste campo, por exemplo, empréstimos, financiamentos,  saldo devedor de cheque especial, entre outros."> </span> 
	</div>	
</div>
	
	<div class="col-md-4">
		<label class="control-label">Espécie</label>	
		<input type="text" name="legal_reference_charge_species" class="form-control">				
       
	</div>
	<div class="col-md-4">
		<label class="control-label" >Objeto / Bem</label>
		<input type="text" name="legal_reference_charge_object" class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Início contrato</label>
		<input type="text" name="legal_reference_charge_begin_contract" id="inicio_contrato_juridico" data-mask="99/99/9999" class="form-control">
	</div>	
	<div class="col-md-4">
		<label class="control-label">Qtd. Parcelas</label>
		<input type="text" name="legal_reference_charge_qde_quota" class="form-control">
	</div>	
	<div class="col-md-4">
		<label class="control-label">Valor parcelas</label>
		<div class="input-group">
		  <span class="input-group-addon">R$</span>
		  <input type="text" name="legal_reference_charge_value_quota" id="valor_parcela_onus" class="form-control">
		</div>
	</div>
	<div class="col-md-10">		
		<hr />
	</div>
	<div class="col-md-4">
		<label class="control-label">Espécie</label>	
		<input type="text" name="legal_reference_charge_species2" class="form-control">								
        	     
	</div>
	<div class="col-md-4">
		<label class="control-label" >Objeto / Bem</label>
		<input type="text" name="legal_reference_charge_object2"  class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label" >Início contrato</label>
		<input type="text" name="legal_reference_charge_begin_contract2" id="inicio_contrato_juridico2" class="form-control">
	</div>	
	<div class="col-md-4">
		<label class="control-label" >Qtd. Parcelas</label>
		<input type="text" name="legal_reference_charge_qde_quota2" class="form-control">
	</div>	
	<div class="col-md-4">
		<label class="control-label" >Valor parcelas</label>
		<div class="input-group">
		  <span class="input-group-addon">R$</span>
		  <input type="text" name="legal_reference_charge_value_quota2" id="valor_parcela_onus2" class="form-control">
		</div>
	</div>		
</div>
<!--========FIM ÔNUS============-->

	
	<!--========OS BENS============-->
<div class="col-md-12 box">

<div class="col-md-12">
	<label class="pull-left label_titulo">Bens</label> 	  						
</div>

	<div class="col-md-12">
		<div class="pull-left">
	        <div class="">
	            <input type="checkbox" id="ref_imoveis" onclick="optRefImoveis()" />
	            <label for="ref_imoveis">Imóveis</label>
	        </div>       
		</div>
	</div>
<div id="referencia_imoveis">	
	<div class="col-md-3 ">
		<label class="control-label" for="cep-bens">CEP</label>
		<input type="text" name="legal_reference_bens_cep" id="cep-bens" class="cep4 form-control">
	</div>
	<div class="col-md-4 ">
		<label class="control-label">Endereço</label>
		<input type="text" id="bens_rua" name="legal_reference_bens_address" class="form-control">
	</div>
	<div class="col-md-2 ">
		<label class="control-label">Número</label>
		<input type="text" name="legal_reference_bens_number" class="form-control">
	</div>
	<div class="col-md-3 ">
		<label class="control-label">Complemento</label>
		<input type="text" name="legal_reference_bens_complement" class="form-control">
	</div>
	
		<div class="col-md-4">
		<label class="control-label">Bairro</label>
		<input type="text" id="bens_bairro" name="legal_reference_bens_district"  class="form-control">
	</div>
	<div class="col-md-5">
		<label class="control-label">Cidade</label>
		<input type="text" id="bens_cidade" name="legal_reference_bens_city" class="form-control">
	</div>
	<div class="col-md-3">
		<label class="control-label">UF</label>					
        <select name="legal_reference_bens_uf" class="selectpicker show-tick form-control">
 			@include('proposal.uf')        
        </select>	     
	</div>
		<div class="col-md-4">
		<label class="control-label">Valor</label>
		<div class="input-group">
		  <span class="input-group-addon">R$</span>
		  <input type="text" name="legal_reference_bens_value" id="bens_juridico_valor1" class="form-control">
		</div>
	</div>
	<div class="col-md-2 ">
		<label class="control-label">Financiado?</label>					
        <select name="legal_reference_bens_finance" class="selectpicker show-tick form-control">
          <option value=""selected>--Selecione--</option>	
          <option >Sim</option>
          <option>Não</option>
        
        </select>	     
	</div>
	<div class="col-md-3 ">
		<label class="control-label">Matrícula</label>
		<input type="text" name="legal_reference_bens_mat" class="form-control">
	</div>
	<div class="col-md-8  form-group ">
		<label class="control-label">Cartório</label>
		<input type="text" name="legal_reference_bens_cat" class="form-control">
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
					<input type="text" name="legal_reference_bens_cep2" id="cep-bens2" class="cep5 form-control">
				</div>
				<div class="col-md-4 ">
					<label class="control-label">Endereço</label>
					<input type="text" id="bens_rua2" name="legal_reference_bens_address2" class="form-control">
				</div>
				<div class="col-md-2 ">
					<label class="control-label">Número</label>
					<input type="text" name="legal_reference_bens_number2" class="form-control">
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Complemento</label>
					<input type="text" name="legal_reference_bens_complement2" class="form-control">
				</div>
				
					<div class="col-md-6">
					<label class="control-label">Bairro</label>
					<input type="text" id="bens_bairro2" name="legal_reference_bens_district2"  class="form-control">
				</div>
				<div class="col-md-6">
					<label class="control-label">Cidade</label>
					<input type="text" id="bens_cidade2" name="legal_reference_bens_city2" class="form-control">
				</div>
				<div class="col-md-4">
					<label class="control-label">UF</label>					
			        <select name="legal_reference_bens_uf2" class="selectpicker show-tick form-control">
			 			@include('proposal.uf')			        
			        </select>	   
				</div>
					<div class="col-md-5">
					<label class="control-label">Valor</label>
					<div class="input-group">
					  <span class="input-group-addon">R$</span>
					  <input type="text" name="legal_reference_bens_value2" id="bens_juridico_valor2" class="form-control">
					</div>
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Financiado?</label>					
			        <select name="legal_reference_bens_finance2" class="selectpicker show-tick form-control">
			          <option value=""selected>--Selecione--</option>	
			          <option >Sim</option>
			          <option>Não</option>
			        
			        </select>	     
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Matrícula</label>
					<input type="text" name="legal_reference_bens_mat2" class="form-control">
				</div>
				<div class="col-md-8">
					<label class="control-label">Cartório</label>
					<input type="text" name="legal_reference_bens_cat2" class="form-control">
				</div>
		    </div>
	    </div>
	</div>
</div>	<!-- fim imoveis -->

		<!--========VEICULOS============-->
	<div class="col-md-12 ">
		<div class="row">
			<hr />
		</div>
	</div>

	<div class="col-md-12">
		<div class="pull-left">
	        <div class="">
	            <input type="checkbox" id="ref_veiculos" onclick="optRefVeiculos()" />
	            <label for="ref_veiculos">Veículos</label>
	        </div>       
		</div>
	</div>
<div id="referencia_veiculo">
	<div class="col-md-3 ">
		<label class="control-label">Marca</label>	
		<input type="text" name="legal_reference_vehicle_mark"  class="form-control">	
	</div>

	<div class="col-md-4">
		<label class="control-label">Modelo</label>
		<input type="text" name="legal_reference_vehicle_model"  class="form-control">
	</div>
	<div class="col-md-2 ">
		<label class="control-label" >Ano</label>
		<input type="text" name="legal_reference_vehicle_year" class="form-control">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label">Placa</label>
		<input type="text" name="legal_reference_vehicle_plaque" class="form-control">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label">Financiado?</label>					
        <select name="legal_reference_vehicle_finance" class="selectpicker show-tick form-control">
          <option value=""selected>--Selecione--</option>	
          <option value="Sim" >Sim</option>
          <option value="Não" >Não</option>
        
        </select>	     
	</div>
	<div class="col-md-5 form-group">
		<label class="control-label">Financeira</label>
		<input type="text" name="legal_reference_vehicle_financial" class="form-control">
	</div>
	<div class="col-md-4">
		<label class="control-label">Valor</label>
		<div class="input-group">
		  <span class="input-group-addon">R$</span>
		  <input type="text" name="legal_reference_vehicle_value" id="valor_veiculos" class="form-control">
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
					<input type="text" name="legal_reference_vehicle_mark2"  class="form-control">	
				</div>
			
				<div class="col-md-4">
					<label class="control-label">Modelo</label>
					<input type="text" name="legal_reference_vehicle_model2"  class="form-control">
				</div>
				<div class="col-md-2 ">
					<label class="control-label" >Ano</label>
					<input type="text" name="legal_reference_vehicle_year2" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label">Placa</label>
					<input type="text" name="legal_reference_vehicle_plaque2" class="form-control">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label">Financiado?</label>					
			        <select name="legal_reference_vehicle_finance2" class="selectpicker show-tick form-control">
			          <option value=""selected>--Selecione--</option>	
			          <option value="Sim">Sim</option>
			          <option value="Não" >Não</option>
			        
			        </select>	     
				</div>
				<div class="col-md-5 form-group">
					<label class="control-label">Financeira</label>
					<input type="text" name="legal_reference_vehicle_financial2" class="form-control">
				</div>
				<div class="col-md-4">
					<label class="control-label">Valor</label>
					<div class="input-group">
					  <span class="input-group-addon">R$</span>
					  <input type="text" name="legal_reference_vehicle_value2" id="valor_veiculos2" class="form-control">
					</div>
				</div>
		    </div>
	    </div>
	</div>
</div>		
</div><!--FIM BOX-->	
<!--========FIM BENS============-->	
	
</div><!-- FIM -->
<p class="pull-right" style="color: black; font-size: 12pt; font-weight: bold;">Página 2 de 3</p>	