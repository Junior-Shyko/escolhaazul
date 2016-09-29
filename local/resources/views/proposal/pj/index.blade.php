@extends('layouts.layout_proposal')
@section('content')
<div class="container">
    <div class="col-md-8" style="background: ; height: 70px;">
        <div id="titulo" class="titulo_proposta">
            <div class="col-md-6">
                <h1 style="font-size: 1.7em; margin-top: 10px;">PROPOSTA PESSOA JURÍDICA</h1>
            </div>
            <div class="col-md-6 pull-right">
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <h3 class="numero_proposta">Nº {{$proposal[0]->legal_id}} </h3>
    </div>
    <div class="col-md-12">
        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane active container box col-md-12"  id="login">
                @foreach($proposal as $proposals)
                <form action="" method="" id="form_one_pj">
                    @include('proposal.pj.pj_first_step')
                    {{Form::hidden('primeira_pj' , 'primeira_pj')}}
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="legal_id" id="legal_id" value="{{$proposals->legal_id}}">
                </form>
                @endforeach
            </div>
            <!-- fim content-->
            <div class="tab-pane container col-md-12" id="create_user">
                <br>
                <!-- INCLUSAO DA SEGUNDA ETAPA-->
                @foreach($proposal as $proposals)
                <form action="" method="" id="form_two_pj">
                    @include('proposal.pj.pj_second_step')
                    {{Form::hidden('segunda_pj' , 'segunda_pj')}}
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="legal_id" id="legal_id" value="{{$proposals->legal_id}}">
                </form>
                @endforeach
            </div>
            <div class="tab-pane box container col-md-10" id="tree">
                <br>
                <!-- INCLUSAO DA TERCEIRA ETAPA-->
                @foreach($proposal as $proposals)
                <form action="" method="" id="form_tree_pj">
                    @include('proposal.pj.pj_third_step')
                    {{Form::hidden('segunda_pj' , 'segunda_pj')}}
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    <input type="hidden" name="legal_id" id="legal_id" value="{{$proposals->legal_id}}">
                </form>
                @endforeach	
                {{-- UPLOAD DE ARQUIVOS --}}
                @include('proposal.pj.upload_files_pj')               
            </div>
            <div class="col-md-10 fundo_marron">
                <!--<a href="#create_user" data-toggle="tab" onmousedown="valida()" class="btn btn-primary pull-right">Etapa 02</a>	-->
                <ul class="nav nav-tabs" style="  margin-top: 10px;">
                    <li class="active"><a href="#login" data-toggle="tab"><i class="fa fa-pencil-square-o"></i>Etapa Inicial </a></li>
                    <li><a href="#create_user" data-toggle="tab" onmousedown="validaCampos()" id="secound_step_pj"><i class="fa fa-pencil"></i>   Segunda Etapa</a></li>
                    <li><a href="#tree" data-toggle="tab" onmousedown="validaCampos()" id="end_step_pj"><i class="fa fa-pencil-square-o"></i>Etapa Final</a></li>
                </ul>
                <p class="pull-right" style="color: white; font-size: 8pt; font-weight: bold;">
                    Uma Solução
                    <img src="{{url('/public/img/logo_ea.jpg')}}" width="100" />
                </p>
            </div>
            <div class="col-md-12">
            </div>
        </div>
    </div>
</div>
</div>
@endsection
