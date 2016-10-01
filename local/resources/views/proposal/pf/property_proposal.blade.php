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
		<input type="text" name="proposal_immobile_cep" id="cep-bens" value="{{$proposals->proposal_immobile_cep}}" class="cep4 form-control">
	</div>
	<div class="col-md-4 ">
		<label class="control-label">Endereço</label>
		<input type="text" id="bens_rua" name="proposal_immobile_address" class="form-control" value="{{$proposals->proposal_immobile_address}}">
	</div>
	<div class="col-md-2 ">
		<label class="control-label">Número</label>
		<input type="text" name="proposal_immobile_address_number" id="bens_number_address" class="form-control" value="{{$proposals->proposal_immobile_address_number}}">
	</div>
	<div class="col-md-3 ">
		<label class="control-label">Complemento</label>
		<input type="text" name="proposal_immobile_address_complement" class="form-control" value="{{$proposals->proposal_immobile_address_complement}}">
	</div>
	
		<div class="col-md-5 ">
		<label class="control-label">Bairro</label>
		<input type="text" id="bens_bairro" name="proposal_immobile_district"  class="form-control" value="{{$proposals->proposal_immobile_district}}">
	</div>
	<div class="col-md-5 ">
		<label class="control-label">Cidade</label>
		<input type="text" id="bens_cidade" name="proposal_immobile_city" class="form-control" value="{{$proposals->proposal_immobile_city}}">
	</div>
	<div class="col-md-2 ">
		<label class="control-label">UF</label>					
        <select name="proposal_immobile_uf" class="selectpicker show-tick form-control">
        <option value="">{{(!empty($proposals->proposal_immobile_uf) ? $proposals->proposal_immobile_uf : ' -- Selecione --')}}</option>
 			@include('proposal.uf')
        </select>	     
	</div>
		<div class="col-md-3  form-group ">
		<label class="control-label">Valor</label>
		<div class="input-group">
		  <span class="input-group-addon">R$</span>
		  <input type="text" name="proposal_immobile_value" id="valor_bens" class="form-control" value="{{$proposals->proposal_immobile_value}}">
		</div>
	</div>
	<div class="col-md-2 ">
		<label class="control-label">Financiado?</label>					
        <select name="proposal_immobile_finance" class="selectpicker show-tick form-control">
          <option value="">{{(!empty($proposals->proposal_immobile_finance) ? $proposals->proposal_immobile_finance : ' -- Selecione --')}}</option>
          <option value="Sim">Sim</option>
          <option value="Não">Não</option>
        </select>	     
	</div>
	<div class="col-md-3 ">
		<label class="control-label">Matrícula</label>
		<input type="text" name="proposal_immobile_mat" maxlength="12" class="form-control" value="{{$proposals->proposal_immobile_mat}}">
	</div>
	<div class="col-md-3">
		<label class="control-label">Cartório</label>
		<input type="text" name="proposal_immobile_car" class="form-control" value="{{$proposals->proposal_immobile_car}}">
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
					<input type="text" name="proposal_immobile_cep2" id="cep-bens2" class="cep5 form-control" value="{{$proposals->proposal_immobile_cep2}}">
				</div>
				<div class="col-md-4 ">
					<label class="control-label">Endereço</label>
					<input type="text" id="bens_rua2" name="proposal_immobile_address2" class="form-control" value="{{$proposals->proposal_immobile_address2}}">
				</div>
				<div class="col-md-2 ">
					<label class="control-label">Número</label>
					<input type="text" name="proposal_immobile_address_number2" class="form-control" value="{{$proposals->proposal_immobile_address_number2}}">
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Complemento</label>
					<input type="text" name="proposal_immobile_address_complement2" class="form-control" value="{{$proposals->proposal_immobile_address_complement2}}">
				</div>
				
					<div class="col-md-5 ">
					<label class="control-label">Bairro</label>
					<input type="text" id="bens_bairro2" name="proposal_immobile_district2"  class="form-control" value="{{$proposals->proposal_immobile_district2}}">
				</div>
				<div class="col-md-5 ">
					<label class="control-label">Cidade</label>
					<input type="text" id="bens_cidade2" name="proposal_immobile_city2" class="form-control" value="{{$proposals->proposal_immobile_city2}}">
				</div>
				<div class="col-md-2 ">
					<label class="control-label">UF</label>					
			        <select name="proposal_immobile_uf2" class="selectpicker show-tick form-control">
			        <option value="">{{(!empty($proposals->proposal_immobile_uf2) ? $proposals->proposal_immobile_uf2 : ' -- Selecione --')}}</option>
			 			@include('proposal.uf')
			        </select>	     
				</div>
					<div class="col-md-3  form-group ">
					<label class="control-label">Valor</label>
					<div class="input-group">
					  <span class="input-group-addon">R$</span>
					  <input type="text" name="proposal_immobile_value2" id="valor_bens2" class="form-control" value="{{$proposals->proposal_immobile_value2}}">
					</div>
				</div>
				<div class="col-md-2 ">
					<label class="control-label">Financiado?</label>					
			        <select name="proposal_immobile_finance2" class="selectpicker show-tick form-control">
			           
			           <option value="">{{(!empty($proposals->proposal_immobile_finance2) ? $proposals->proposal_immobile_finance2 : ' -- Selecione --')}}</option>
			          <option value="Sim">Sim</option>
			          <option value="Não">Não</option>
			        </select>	     
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Matrícula</label>
					<input type="text" name="proposal_immobile_mat2" maxlength="12" class="form-control" value="{{$proposals->proposal_immobile_mat2}}">
				</div>
				<div class="col-md-3">
					<label class="control-label">Cartório</label>
					<input type="text" name="proposal_immobile_car2" class="form-control" value="{{$proposals->proposal_immobile_car2}}">
				</div>
		    </div>
	    </div>
	</div>
</div>	<!-- fim imoveis -->