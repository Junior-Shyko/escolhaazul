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
		<input type="text" name="proposal_vehicle_mark"  class="form-control" value="{{$proposals->proposal_vehicle_mark}}">	
	</div>

	<div class="col-md-3 ">
		<label class="control-label">Modelo</label>
		<input type="text" name="proposal_vehicle_model"  class="form-control" value="{{$proposals->proposal_vehicle_model}}">
	</div>
	<div class="col-md-2 ">
		<label class="control-label" >Ano</label>
		<input type="text" name="proposal_vehicle_year" maxlength="4" class="form-control" value="{{$proposals->proposal_vehicle_year}}">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label">Placa</label>
		<input type="text" name="proposal_vehicle_plaque"  maxlength="10" class="form-control" value="{{$proposals->proposal_vehicle_plaque}}">
	</div>
	
	<div class="col-md-3 ">
		<label class="control-label">Financiado?</label>					
        <select name="proposal_vehicle_finance" class="selectpicker show-tick form-control">
          <option value="">{{(!empty($proposals->proposal_vehicle_finance) ? $proposals->proposal_vehicle_finance : ' -- Selecione --')}}</option>	
          <option value="Sim" >Sim</option>
          <option value="Não" >Não</option>
        
        </select>	     
	</div>
	<div class="col-md-5 form-group">
		<label class="control-label">Financeira</label>
		<input type="text" name="proposal_vehicle_financial" class="form-control" value="{{$proposals->proposal_vehicle_financial}}">
	</div>
	<div class="col-md-3 ">
		<label class="control-label">Valor</label>
		<div class="input-group">
		  <span class="input-group-addon">R$</span>
		  <input type="text" name="proposal_vehicle_value" id="valor_veiculos" class="form-control" value="{{number_format($proposals->proposal_vehicle_value, 2, ',', ' ')}}">
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
					<input type="text" name="proposal_vehicle_mark2"  class="form-control" value="{{$proposals->proposal_vehicle_mark2}}">	
				</div>
			
				<div class="col-md-3 ">
					<label class="control-label">Modelo</label>
					<input type="text" name="proposal_vehicle_model2"  class="form-control" value="{{$proposals->proposal_vehicle_model2}}">
				</div>
				<div class="col-md-2 ">
					<label class="control-label" >Ano</label>
					<input type="text" name="proposal_vehicle_year2" class="form-control" maxlength="4" value="{{$proposals->proposal_vehicle_year2}}">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label">Placa</label>
					<input type="text" name="proposal_vehicle_plaque2" class="form-control" maxlength="10" value="{{$proposals->proposal_vehicle_plaque2}}">
				</div>
				
				<div class="col-md-3 ">
					<label class="control-label">Financiado?</label>					
			        <select name="proposal_vehicle_finance2" class="selectpicker show-tick form-control">
			          <option value="">{{(!empty($proposals->proposal_vehicle_finance) ? $proposals->proposal_vehicle_finance : ' -- Selecione --')}}</option>	
			          <option value="Sim" >Sim</option>
			          <option value="Não" >Não</option>
			        
			        </select>	     
				</div>
				<div class="col-md-5 form-group">
					<label class="control-label">Financeira</label>
					<input type="text" name="proposal_vehicle_financial2" class="form-control" value="{{$proposals->proposal_vehicle_financial2}}">
				</div>
				<div class="col-md-3 ">
					<label class="control-label">Valor</label>
					<div class="input-group">
					  <span class="input-group-addon">R$</span>
					  <input type="text" name="proposal_vehicle_value2" id="valor_veiculos2" class="form-control" value="{{number_format($proposals->proposal_vehicle_value2, 2, ',', ' ')}}">
					</div>
				</div>
		    </div>
	    </div>
	</div>
</div>		
	<!--========FIM BENS============-->