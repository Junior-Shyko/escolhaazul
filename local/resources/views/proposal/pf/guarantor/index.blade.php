@extends('layouts.layout_proposal')
@section('content')
<div class="container">
    <div class="col-md-8" style="background: ; height: 70px;">
      <div id="titulo"  class="titulo_proposta">
        <div class="col-md-6">
          <h1>Cadastro de Locação</h1>
        </div>
        <div class="col-md-6 pull-right">
            
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <h3 class="numero_proposta">Nº {{$guarantor->guarantor_id}}</h3>
    </div>
  <div class="col-md-12">

      <!-- Tab panes -->
      <div class="tab-content">
      
        <div class="tab-pane active box container col-md-12"  id="guarantor_one"> 
  
          <!-- INCLUSAO -->
         
      
          {{Form::open(array('url' => '', 'id' => 'form_guarantor_one'))}}
            @include('proposal.pf.guarantor.pf_guarantor_first_step')
            {{Form::hidden('_token' , csrf_token() , ['id' => 'token'])}}
            {{Form::hidden('guarantor_pf' , 'guarantor_pf')}}
            {{Form::hidden('guarantor_id' , $guarantor->guarantor_id )}}
          {{Form::close()}}
      

      
        </div><!-- fim content--> 
        <div class="tab-pane container col-md-12" id="guarantor_two"><br>
          <!-- INCLUSAO -->
           
           {{Form::open(array('url' => '', 'id' => 'form_guarantor_two'))}}
            @include('proposal.pf.guarantor.pf_guarantor_secound_step')
            {{Form::hidden('_token' , csrf_token() , ['id' => 'token'])}}
            {{Form::hidden('guarantor_secound_pf' , 'guarantor_secound_pf')}}
            {{Form::hidden('guarantor_id' , $guarantor->guarantor_id )}}
          {{Form::close()}}
          
          {{ Form::open(array('url' => 'upload-files', 'id' => 'form_upload_guarantor' , 'enctype' => 'multpart/form-data'))  }}
            @include('proposal.pf.guarantor.upload_files_guarantor')
            {{Form::hidden('guarantor_id' , $guarantor->guarantor_id )}}
            {{Form::hidden('type_proposal' , 'cadastro-pf')}} 
          {{ Form::close() }}  

          <section class="col-md-12 box">
              <input type="button" class="btn btn-lg btn-primary pull-right" value="Enviar Cadastro" id="final_proposta_fiador" onmousedown="return validaTermosFiador()" />
          </section>
      
        </div>
        
        
            
        <div class="col-md-12 fundo_marron">
            <!--<a href="#create_user" data-toggle="tab" onmousedown="valida()" class="btn btn-primary pull-right">Etapa 02</a> -->
            <ul class="nav nav-tabs" style="  margin-top: 10px;">
              <li class="active"><a href="#guarantor_one" data-toggle="tab"><i class="fa fa-pencil-square-o"></i>Etapa Inicial </a></li>
              <li><a href="#guarantor_two" data-toggle="tab" id="guarantor_two_step" onmousedown="verifica_fiador()"><i class="fa fa-pencil"></i>Etapa Final</a></li>
              
            </ul>
            <p class="pull-right" style="color: white; font-size: 8pt; font-weight: bold;">
              Uma Solução 
            <img src="{{url('public/img/logo_ea.jpg')}}" width="100" />
            </p>
          </div>
          <div class="col-md-12">
          
        </div>
      </div>

  </div>
</div>

</div>
@endsection
