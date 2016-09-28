@extends('layouts.layout_site')
@section('content')
@if($type == "Pessoa Física")
    <?php $type_proposal = "proposta-pf"; ?>
@elseif($type == "Pessoa Jurídica")
    <?php $type_proposal = "proposta-pj";?>
@endif
<div id="tf-home" class="text-center">
    <div class="">
        <a class="navbar-brand" href="http://espindola.imb.br/"  target="_blank">
        <img src="{{url('public/img/logobranca_ei.png')}}" class="xs-espindola" alt="Logo Espindola">
        </a>
    </div>
    <div class="">
        <a href="http://www.alugaemfortaleza.com/" target="_blank">
        <img src="{{url('public/img/logoalugabranca.png')}}" class="pull-right xs-aluga aluga" alt="Logo Aluga em Fortaleza">
        </a>    
    </div>
    <div class="overlay">
        <div class="content">
            <section class="main style1 dark fullscreen" style="height: 1040px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12" >
                            <div class="col-md-1">
                            </div>
                            <div class="col-md-7 col-xs-12 ">
                                <u>
                                    <h3 class="nome_acesso">Olá {{$name}}</h3>
                                </u>
                            </div>
                            <div class="col-md-4">
                            </div>
                        </div>
                    </div>
                    <div id="info_list_resposive" class="row" >
                        <div class="col-md-12 col-xs-12" >
                            <h1 class="h1_list_proposal">Você já possui uma proposta salva. </h1>
                            <h1 class="h1_list_proposal">O que você deseja fazer?</h1>
                        </div>
                    </div>
                </div>
                <div id="intro_form"  class="container">
                    <div class="container">
                        <div class="col-md-3 col-xs-12 ">
                        </div>
                        <div class="col-md-6 col-xs-12 container_list color_border_top">
                            @include('msg.message_success')
                            <div class="col-md-12">
                                <div class="col-md-3 col-xs-12 icon_list_new" >
                                    <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                </div>
                                <div class="col-md-9 icon_list_new">
                                    {{Form::open(array('url' => 'fazer-proposta', 'method' => 'GET'))}}
                                    <div class="col-xs-12" >                                         
                                        {{Form::hidden('type',  $type)}}
                                        {{Form::hidden('email', $email)}}
                                        {{Form::hidden('phone', $phone)}}
                                        {{Form::hidden('name',  $name)}}
                                        {{Form::button('Fazer uma nova proposta', ['type' => 'submit'])}}
                                    </div>
                                    {{Form::close()}}
                                </div>
                                @foreach($proposal as $proposals)
                                <div class="col-md-12 col-xs-12">
                                    <div class="col-md-3 col-xs-12 icone_proposta ">
                                        @if($proposals->proposal_send == 1)
                                        <i class="fa fa-file-pdf-o" aria-hidden="true"></i>
                                        <a href="{{$resource_pdf.'/?action=view-proposal&id='.base64_encode($proposals->proposal_id)}}" target="_blank" title="Visualizar Proposta">
                                        <strong>Visualizar</strong>
                                        </a>
                                        @else
                                        <i class="fa fa-file-o fa-2x" aria-hidden="true"></i>
                                        @endif
                                    </div>
                                    <div class="col-md-9">
                                        @if($proposals->proposal_send == 0)
                                        <a href="{{ url('nova-proposta/'.base64_encode($proposals->proposal_id).'/tipo/'.$type_proposal) }}" class="continue-proposal">
                                            <p>
                                                Continuar Proposta:{{$proposals->proposal_id}} 
                                        </a>
                                        <span>
                                        <span>Enviada em: {{ (empty($proposals->date_cadastre)) ? 'Incompleta' : date("d/m/Y" , strtotime($proposals->date_cadastre)) }} ou <a href="#" data-toggle="modal" data-target="#modal_conf_delete_proposal_{{ $proposals->proposal_id }}" class="delete-proposal"> Excluir</a></span>
                                        <div class="modal fade" id="modal_conf_delete_proposal_{{ $proposals->proposal_id }}" tabindex="-1" role="dialog">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Excluir Proposta de Número: {{ $proposals->proposal_id }}</h4>
                                        </div>
                                        <div class="modal-body">
                                        <div class="form-group col-md-12">
                                        <label for="" style="color: #333333;">Deseja realmente excluir a proposta de Número: {{ $proposals->proposal_id }} ?</label>
                                        </div>
                                        <div class="form-group">
                                        {{ Form::open(array('url' => 'destroy/')) }}
                                        <input type="submit" class="btn btn-danger pull-left" name="excluir_proposta" value="Sim">
                                        {{Form::hidden('type',  $type)}}
                                        {{Form::hidden('email', $email)}}
                                        {{Form::hidden('phone', $phone)}}
                                        {{Form::hidden('name',  $name)}}
                                        {{ Form::hidden('proposal_id' , $proposals->proposal_id) }}
                                        {{ Form::close() }}    
                                        <button type="button" class="btn btn-default " data-dismiss="modal">Não</button>
                                        </div>
                                        </div>
                                        </div><!-- /.modal-content -->
                                        </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                        </span>
                                        </p>
                                        @elseif(!empty($proposals->date_cadastre))
                                        <p>Proposta: {{$proposals->proposal_id}} <small>({{$proposals->proposal_status}})</small>
                                            <span>Proposta enviada em: {{ (empty($proposals->date_cadastre)) ? 'Pendente' : date("d/m/Y" , strtotime($proposals->date_cadastre)) }} </span>
                                        </p>
                                        @endif
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        
                    </div>
                    <div class="col-md-3 col-xs-12">
                    </div>
                    <div style="margin-top:-30px; position: static;">
                        {{ $proposal->setPath('ver-proposta?tipo='.$type.'&user_name='.$name.'&user_email='.$email.'&user_phone='.$phone) }}
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
 
<div id="footer-top">
    <div class="container">
        <div class="col-md-12">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <div class="col-xs-6">
                    <img src="{{url('public/img/logobranca_ei.png')}}" class="footer-espindola" alt="Logo Espindola" >
                </div>
                <div class="col-xs-6">
                    <img src="{{url('public/img/logoalugabranca.png')}}" class="pull-right footer-xs-aluga aluga" alt="Logo Aluga em Fortaleza">
                </div>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
</div>
<nav id="footer">
    <div class="container">
        <div class="text-center fnav">
            <p>© Todos Direitos Reservados. Uma Solução <a href="#">Escolha Azul</a></p>
        </div>
    </div>
</nav>

@endsection
