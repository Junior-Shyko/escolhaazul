@extends('layouts.layout_proposal')
@section('content')
<script>
    $(document).ready(function() {
        $("#modal_info").modal("show");
    });


</script>


<div class="container">
    <div class="col-md-8" style="background: ; height: 70px;">
        <div id="titulo" class="titulo_proposta">
            <div class="col-md-6">
                <h1>Proposta de Locação</h1>
            </div>
            <div class="col-md-6 pull-right">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h3 class="numero_proposta" >Nº {{$proposal[0]->proposal_id}}</h3>
    </div>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane active box container col-md-12" id="login">
            @foreach($proposal as $proposals)
            <form action="" method="" id="form_one">
                @include('proposal.pf.pf_first_step')
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                {{Form::hidden('primeira_pf' , 'primeira_pf')}}
                <input type="hidden" name="proposal_id" id="proposal_id" value="{{$proposals->proposal_id}}">
            </form>
            @endforeach
        </div>
        <div role="tabpanel" class="tab-pane box container col-md-12" id="create_user">
            @foreach($proposal as $proposals)
            <form action="" method="" id="form_two">
                @include('proposal.pf.pf_second_step')
                <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                {{Form::hidden('segunda_pf' , 'segunda_pf')}}
                <input type="hidden" name="proposal_id" id="proposal_id" value="{{$proposal[0]->proposal_id}}">
            </form>
            @endforeach
        </div>
        <div role="tabpanel" class="tab-pane box container col-md-12" id="tree">
               
           
                @include('proposal.pf.pf_third_step')
               

        </div>
    </div>
    <div class="col-md-12 fundo_marron">
        <!--<a href="#create_user" data-toggle="tab" onmousedown="valida()" class="btn btn-primary pull-right">Etapa 02</a>	-->
        <ul class="nav nav-tabs" role="tablist" style="margin-top: 10px;">
            <li role="presentation" class="active"><a href="#login" aria-controls="home" role="tab" data-toggle="tab"><i class="fa fa-pencil-square-o"></i>Etapa Inicial</a></li>
            <li role="presentation" ><a href="#create_user" id="segunda_etapa" aria-controls="profile" role="tab" data-toggle="tab" onmousedown="validaCampos()"><i class="fa fa-pencil"></i>   Segunda Etapa</a></li>
            <li role="presentation"><a href="#tree" id="end_step" aria-controls="messages" role="tab" data-toggle="tab" onmousedown="validaCampos()"><i class="fa fa-pencil-square-o"></i>Etapa Final</a></li>
        </ul>
        <p class="pull-right" style="color: white; font-size: 8pt; font-weight: bold;">
            Uma Solução 
        <img src="{{url('public/img/logo_ea.jpg')}}" width="100" />
        </p>
    </div>
</div>
@endsection
