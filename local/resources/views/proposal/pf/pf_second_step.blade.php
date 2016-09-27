@include('proposal.conjuge')
    <div class="col-md-12">
        <label class="pull-left label_titulo">Referências</label>                           
    
        <div class="col-md-1">
            
        </div>
        <div class="col-md-11 alert alert-info ">
            <strong>Selecione</strong> o campo desejado para adicionar suas referências
             
        </div>
        
    </div>
    <div class="col-md-12">
        <div class="pull-left">
            <div class="">
                <input type="checkbox"  id="ref_imobiliaria" onclick="optRefImobiliaria()" />
                <label for="ref_imobiliaria" class="space_label">Imobiliárias  </label>
            </div>       
        </div>
        <p>  -( administradores ou particulares onde alugou imóvel)</p>
    </div>
<div id="referencia_imob">
    <div class="col-md-12 ">
        <label class="control-label">(1) Nome</label>
        <input type="text" name="proposal_name_immobile" value="{{$proposals->proposal_name_immobile}}" id="proposal_name_immobile" class="form-control">
    </div>
   
    <div class="col-md-3 ">
        <label class="control-label" >CRECI</label>
        <input type="text" name="proposal_creci" id="proposal_creci" value="{{$proposals->proposal_creci}}" class="form-control">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Telefone</label>
        <input type="text" name="proposal_phone_immobile" value="{{$proposals->proposal_phone_immobile}}" id="proposal_phone_immobile" data-mask="(99) 9999-9999 " class="form-control">
    </div>  
    <div class="col-md-3 ">
        <label class="control-label" >Celular</label>
        <input type="text" name="proposal_phone_mobile" value="{{$proposals->proposal_phone_mobile}}" id="celular_imobiliaria" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control">
    </div>  
    <div class="col-md-5 form-group">
        <label class="control-label">E-mail</label>
        <input type="email" name="proposal_email_immobile" value="{{$proposals->proposal_email_immobile}}" id="proposal_email_immobile" class="form-control">
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
                    <input type="text" name="proposal_name_immobile2" id="proposal_name_immobile2" class="form-control" value="{{$proposals->proposal_name_immobile2}}">
                </div>
                <!--
                <div class="col-md-3 ">
                    <label class="control-label" for="inputSuccess1">CPF / CNPJ</label>
                    <input type="text" name="proposal_cnpj_cpf2" class="form-control" >
                </div>
                -->
                <div class="col-md-3 ">
                    <label class="control-label" >CRECI</label>
                    <input type="text" name="proposal_creci2" id="proposal_creci2" class="form-control" value="{{$proposals->proposal_creci2}}">
                </div>
                <div class="col-md-3 ">
                    <label class="control-label">Telefone</label>
                    <input type="text" name="proposal_phone_immobile2" id="proposal_phone_immobile2" data-mask="(99) 9999-9999" class="form-control" value="{{$proposals->proposal_phone_immobile2}}">
                </div>  
                <div class="col-md-3 ">
                    <label class="control-label" >Celular</label>
                    <input type="text" name="proposal_phone_mobile2" id="celular2_imobiliaria" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->proposal_phone_mobile2}}">
                </div>  
                <div class="col-md-5 ">
                    <label class="control-label">E-mail</label>
                    <input type="email" name="proposal_email_immobile2" id="proposal_email_immobile2" class="form-control" value="{{$proposals->proposal_email_immobile2}}">
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
                <label for="ref_comerciais" class="space_label">Comerciais </label>
            </div>       
        </div>
        <p class="span_p"> -( empresa onde costuma comprar a prazo)</p>
    </div>
    
<div id="referencia_com">
<div class="col-md-9 ">
        <label class="control-label">(1) Nome</label>
        <input type="text" name="proposal_commercial_name" id="proposal_commercial_name" class="form-control" value="{{$proposals->proposal_commercial_name}}">
    </div>
    
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">CNPJ</label>
        <input type="text" name="proposal_commercial_cpf" id="proposal_commercial_cpf" data-mask="99.999.999-9999/99" class="form-control" value="{{$proposals->proposal_commercial_cpf}}">
    </div>
    
    <div class="col-md-3 form-group">
        <label class="control-label">Telefone</label>
        <input type="text" name="proposal_commercial_fixed_phone" id="proposal_commercial_fixed_phone" data-mask="(99) 9999-9999" class="form-control" value="{{$proposals->proposal_commercial_fixed_phone}}">
    </div>
    
    <div class="col-md-3 ">
        <label class="control-label">Celular</label>
        <input type="text" name="proposal_commercial_phone" id="celular_comercial" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->proposal_commercial_phone}}">
    </div>  
    <div class="col-md-5 ">
        <label class="control-label">E-mail</label>
        <input type="email" name="proposal_commercial_email" id="proposal_commercial_email" class="form-control" value="{{$proposals->proposal_commercial_email}}">
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
                    <input type="text" name="proposal_commercial_name2" id="proposal_commercial_name2" class="form-control" value="{{$proposals->proposal_commercial_name2}}">
                </div>
                
                <div class="col-md-3 ">
                    <label class="control-label" for="inputSuccess1">CNPJ</label>
                    <input type="text" name="proposal_commercial_cpf2" id="proposal_commercial_cpf2" data-mask="99.999.999-9999/99" class="form-control" value="{{$proposals->proposal_commercial_cpf2}}">
                </div>
                            
                <div class="col-md-3 ">
                    <label class="control-label">Telefone</label>
                    <input type="text" name="proposal_commercial_fixed_phone2" id="proposal_commercial_fixed_phone2" data-mask="(99) 9999-9999" class="form-control" value="{{$proposals->proposal_commercial_fixed_phone2}}">
                </div>
                
                <div class="col-md-3 ">
                    <label class="control-label">Celular</label>
                    <input type="text" name="proposal_commercial_phone2" id="celular2_comercial" onkeyup="mascara( this, mtel );" maxlength="15"   class="form-control" value="{{$proposals->proposal_commercial_phone2}}">
                </div>  
                <div class="col-md-5 ">
                    <label class="control-label">E-mail</label>
                    <input type="email" name="proposal_commercial_email2" id="proposal_commercial_email2"  class="form-control" value="{{$proposals->proposal_commercial_email2}}">
                </div>
    
            </div>
        </div>
    </div>
</div>  
    <!--========FIM COMERCIAIS============-->
    
<!--========COMERCIAIS============-->
    <div class="col-md-12">
        <div class="fpull-left">
            <div class="">
                <input type="checkbox" id="ref_pessoais" onclick="optRefPessoais()" />
                <label for="ref_pessoais" class="space_label">Pessoais</label>
            </div>       
        </div>
    </div>
    
<div id="referencia_pes">
<div class="col-md-9 ">
        <label class="control-label">(1) Nome</label>
        <input type="text" name="proposal_person_name1" id="proposal_person_name1" class="form-control" value="{{$proposals->proposal_person_name1}}">
    </div>
    
    <div class="col-md-3 ">
        <label class="control-label" for="inputSuccess1">CPF</label>
        <input type="text" name="proposal_person_cpf1" id="proposal_person_cpf1" class="form-control" value="{{$proposals->proposal_person_cpf1}}">
    </div>
    <div class="col-md-4">
        <label class="control-label">Qual a relação?</label>                    
        <select name="proposal_person_relation1" id="proposal_person_relation1" class="selectpicker show-tick form-control">
          <option value=""selected>--Selecione--</option>   
          <option value="Amigo">Amigo</option>
          <option value="colega de trabalho">Conhecido</option> 
          <option value="Parente">Parente</option>
          <option value="Outros">Outros</option> 
        </select>        
    </div>

    <div class="col-md-3">
        <label class="control-label">Telefone</label>
        <input type="text" name="proposal_person_phone_fixed1" id="proposal_person_phone_fixed1" data-mask="(99) 9999-9999" class="form-control" value="{{$proposals->proposal_person_phone_fixed1}}">
    </div>
    
    <div class="col-md-3 ">
        <label class="control-label" >Celular</label>
        <input type="text" name="proposal_person_phone1" id="celular_pessoal" onkeyup="mascara( this, mtel );" maxlength="15" class="form-control" value="{{$proposals->proposal_person_phone1}}">
    </div>  
    <div class="col-md-5 form-group">
        <label class="control-label" >E-mail</label>
        <input type="email" name="proposal_person_email1" id="proposal_person_email1" class="form-control" value="{{$proposals->proposal_person_email1}}">
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
                    <input type="text" name="proposal_person_name2" id="proposal_person_name2" class="form-control" value="{{$proposals->proposal_person_name2}}">
                </div>
                
                <div class="col-md-3 ">
                    <label class="control-label" for="inputSuccess1">CPF</label>
                    <input type="text" name="proposal_person_cpf2" id="proposal_person_cpf2" class="form-control" value="{{$proposals->proposal_person_cpf2}}" onBlur="javascript:validaCPF(this);">
                </div>
                <div class="col-md-4">
                    <label class="control-label">Qual a relação?</label>                    
                    <select name="proposal_person_relation2" id="proposal_person_relation2" class="selectpicker show-tick form-control">
                      <option value="" selected>--Selecione--</option>  
                      <option value="Amigo">Amigo</option>
                       <option value="colega de trabalho">Conhecido</option> 
                        <option value="Parente">Parente</option>
                        <option value="Outros">Outros</option> 
                    </select>        
                </div>
            
                <div class="col-md-3">
                    <label class="control-label">Telefone</label>
                    <input type="text" name="proposal_person_phone_fixed2" id="proposal_person_phone_fixed2" data-mask="(99) 9999-9999" class="form-control" value="{{$proposals->proposal_person_phone_fixed2}}">
                </div>
                
                <div class="col-md-3 ">
                    <label class="control-label" >Celular</label>
                    <input type="text" name="proposal_person_phone2" id="celular2_pessoal" onkeyup="mascara( this, mtel );" maxlength="15"  class="form-control" value="{{$proposals->proposal_person_phone2}}">
                </div>  
                <div class="col-md-5 form-group">
                    <label class="control-label" >E-mail</label>
                    <input type="email" name="proposal_person_email2" id="proposal_person_email2"  class="form-control" value="{{$proposals->proposal_person_email2}}">
                </div>
            </div>
        </div>
    </div>
</div>  
    <!--========FIM COMERCIAIS============-->
        
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
    
    <div class="col-md-6">
        <label class="control-label">Banco</label>
        <input type="text" name="proposal_banking_name" id="proposal_banking_name" class="form-control" value="{{$proposals->proposal_banking_name}}">
    </div>
    
    <div class="col-md-3 ">
        <label class="control-label" >Agência</label>
        <input type="text" name="proposal_banking_agency" id="proposal_banking_agency" class="form-control" value="{{$proposals->proposal_banking_agency}}">
    </div>  
    <div class="col-md-3 ">
        <label class="control-label">Conta nº</label>
        <input type="text" name="proposal_banking_current" id="proposal_banking_current" class="form-control" value="{{$proposals->proposal_banking_current}}">
    </div>
    <div class="col-md-6 ">
        <label class="control-label">Nome Gerente</label>
        <input type="text" name="proposal_banking_name_manager" id="proposal_banking_name_manager" class="form-control" value="{{$proposals->proposal_banking_name_manager}}">
    </div>
    
    <div class="col-md-3 ">
        <label class="control-label" >Telefone</label>
        <input type="text" name="proposal_banking_name_phone" id="proposal_banking_name_phone" onKeyPress="MascaraTelefone(form_two.proposal_banking_name_phone);" maxlength="15"  onBlur="ValidaTelefone(form_two.proposal_banking_name_phone);"class="form-control" value="{{$proposals->proposal_banking_name_phone}}">
    </div>  
    <div class="col-md-3 ">
        <label class="control-label" >E-mail</label>
        <input type="email" name="proposal_banking_email" id="proposal_banking_email" class="form-control" value="{{$proposals->proposal_banking_email}}">
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Cliente desde</label>
        <input type="text" name="proposal_banking_client_begin" id="propsota_pf_cliente_desde" onkeypress="MascaraData(form_two.proposal_banking_client_begin)" class="form-control" value="{{(date("d/m/Y" , strtotime($proposals->proposal_banking_client_begin)) )}}">
    </div>
    
    <div class="col-md-3">
        <label class="control-label" >Crédito pré-aprovado</label>
        <input type="text" name="proposal_banking_pre_aproved" id="credito_aprovado1" class="form-control" value="{{$proposals->proposal_banking_pre_aproved}}">
    </div>  
        
    <div class="col-md-3 ">
        <label class="control-label">Cartão de Crédito 01</label>                   
        <select name="proposal_banking_card_credit" id="proposal_banking_card_credit"  class="selectpicker show-tick form-control">
          <option value="" selected>--Selecione--</option>  
          <option value="MasterCard">MasterCard</option>
          <option value="Visa">Visa</option> 
          <option value="American Express">American Express</option> 
          <option value="Outros">Outros</option>                      
        </select>        
    </div>
    <div class="col-md-3 ">
        <label class="control-label" >Limite 01</label>
        <div class="input-group">
          <span class="input-group-addon">R$</span>
          <input type="text" name="proposal_banking_limit1" id="limite1_banco" class="form-control" value="{{number_format($proposals->proposal_banking_limit1, 2, ',', ' ')}}">
        </div>
    </div>
    <div class="col-md-3 ">
        <label class="control-label">Cartão de Crédito 02</label>                   
        <select name="proposal_banking_card_credit2" id="proposal_banking_card_credit2" class="selectpicker show-tick form-control">
          <option value="" selected>--Selecione--</option>  
          <option value="MasterCard">MasterCard</option>
          <option value="Visa">Visa</option> 
          <option value="American Express">American Express</option> 
          <option value="Outros">Outros</option>                      
        </select>        
    </div>
    <div class="col-md-3 ">
        <label class="control-label" >Limite 02</label>
        <div class="input-group">
          <span class="input-group-addon">R$</span>
          <input type="text" name="proposal_banking_limit2" id="limite2_banco" class="form-control" value="{{number_format($proposals->proposal_banking_limit2, 2, ',', ' ')}}">
        </div>
    </div>
    
    <div class="col-md-12 ">
        <div class="row">
            <hr />
        </div>
    </div>
    <div class="col-md-3">
        <label class="control-label">1.Poupança/Aplicação(R$)</label>
        <input type="text" name="proposal_banking_app" id="aplicacao1" class="form-control" value="{{$proposals->proposal_banking_app}}">
    </div>
    <div class="col-md-5">
        <label class="control-label">Banco</label>
        <input type="text" name="proposal_banking_app_bank" id="proposal_banking_app_bank"  class="form-control" value="{{$proposals->proposal_banking_app_bank}}">
    </div>
    <div class="col-md-2 ">
        <label class="control-label">Agência</label>
        <input type="text" name="proposal_banking_app_agency" id="proposal_banking_app_agency" class="form-control" value="{{$proposals->proposal_banking_app_agency}}">
    </div>
    <div class="col-md-2 ">
        <label class="control-label">Conta. (nº)</label>
        <input type="text" name="proposal_banking_app_ref"  id="proposal_banking_app_ref" class="form-control" value="{{$proposals->proposal_banking_app_ref}}">
    </div>
    <div class="col-md-3">
        <label class="control-label">2.Poupança/Aplicação(R$)</label>
        <input type="text" name="proposal_banking_app2" id="aplicacao2" class="form-control" value="{{$proposals->proposal_banking_app2}}">
    </div>
    <div class="col-md-5">
        <label class="control-label">Banco</label>
        <input type="text" name="proposal_banking_app_bank2" id="proposal_banking_app_bank2"  class="form-control" value="{{$proposals->proposal_banking_app_bank2}}">
    </div>
    <div class="col-md-2 ">
        <label class="control-label">Agência</label>
        <input type="text" name="proposal_banking_app_agency2"  id="proposal_banking_app_agency2" class="form-control" value="{{$proposals->proposal_banking_app_agency2}}">
    </div>
    <div class="col-md-2 ">
        <label class="control-label">Conta. (nº)</label>
        <input type="text" name="proposal_banking_app_ref2" id="proposal_banking_app_ref2" class="form-control" value="{{$proposals->proposal_name_immobile}}">
    </div>          
</div>      
    <!--========FIM BANCÁRIAS============-->    
    
    
    <!--========OS BENS============-->
<div class="col-md-12">
    <div class="row">
        <hr class="separete_division"/>
    </div>
</div>
<!-- include-->
@include('proposal.pf.property_proposal')
    
        <!--========VEICULOS============-->
    <div class="col-md-12 ">
        <div class="row">
            <hr />
        </div>
    </div>
<!-- include-->
@include('proposal.pf.vehicle_proposal')

    

<p class="pull-right" style="color: black; font-size: 12pt; font-weight: bold;">Página 2 de 3</p>   