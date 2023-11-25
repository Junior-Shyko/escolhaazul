<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php echo $titulo_page_pdf; ?></title>
    <style>
        .container {
            padding-right: 15px;
            padding-left: 15px;
            margin-right: auto;
            margin-left: auto;
        }

        .text-info {
            color: #31708f;
        }

        a.text-info:hover,
        a.text-info:focus {
            color: #245269;
        }

        .bottom_div {
            border-bottom: #000000 2px solid;
        }

        .tr_color {
            background: #c4c4c4;
        }
        .font-size-10 {
            font-size: 12px
        }
        .table-border {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .pa-td {
            padding: 4px
        }
    </style>
</head>

<body>
    <div class="container">
        <header>
            <table style="width:100%; border: 1px solid #666666;">
                <tr>
                    <td style=" padding: 5px; margin: 5px; width:250px; ">
                        <div class="">
                            {{-- <img src="<?php //echo $GLOBALS['project_index'].'/view/static/img/logo.jpg';
                            ?>" width="64" height="32" />   --}}
                            <img src="<?php echo 'https://i.imgur.com/3aULwmb.png'; ?>" width="64" height="32" />
                        </div>
                    </td>
                    <td style=" padding: 5px; margin: 5px; text-align: left;">
                        <div class="">
                            <h3><u><?php echo $titulo_page_pdf; ?></u></h3>
                        </div>
                    </td>
                </tr>
            </table>
        </header>
        <div style="clear: both;"><br /></div>
        <div>
            <label class="text-info" style="font-size: 14pt;">INFORMAÇÕES DO IMÓVEL</label>                        
            <div class="bottom_div"></div>
            <table style="width:100%;">
                <tr  class="">
                    <td style="width: 50%;" class="font-size-10 table-border pa-td">
                        <strong>Cod:</strong>  AP0370, Valor mensal: R$ 1.200,00 , Condomínio: R$ 150,00
                        IPTU: R$ 25,46.                       
                    </td>
                    <td class="font-size-10 table-border pa-td">
                        <span><strong>Tipo:</strong> Apartamento</span><br />
                        
                    </td>
                </tr>
                <tr>
                    <td colspan="2" class="font-size-10 table-border pa-td">
                        <span><strong>Endereço:</strong> Rua Carlos Gomes , 95 , José Bonifácio , Fortaleza</span><br />
                    </td>
                   
                </tr>
                <tr>
                    <td colspan="2" class="font-size-10 table-border pa-td">
                        <strong>IMOVEL: </strong> Apartamento no terreo com sala, 03 quartos ( sendo 01 suíte ), WC social, cozinha,
                         lavanderia com área de serviço e quintal. Taxa do lixo: R$ 36,40, CONDOMÍNIO: Sem vaga de garagem, 
                         cond. R$ 150,00. água incluso e energia individualizado. Localização privilegiada, próximo a Av. 
                         Aguanambi, Instituto Pequeno Príncipe e a Econômica Auto Center. Espíndola Imobiliária não tem 
                         nenhuma responsabilidade sobre a informação do valor da taxa condominial, pois esta é fornecida
                          pela administração do condomínio. Ao entrar com o processo de locação, sugerimos conferir os
                           valores.
                    </td>
                </tr>
            </table>
        </div>
        <br>
       
        <div class="col-md-12">
            <label class="text-info" style="font-size: 14pt; ">
                DADOS DE LOCAÇÃO - Atendente responsável:
            </label>
            <label style="float: right; margin-left: 20px; font-size: 14pt"> >
                P.Nº: <strong> {{ $proposal->id }}</strong>
            </label>
        </div>
        <div class="bottom_div"></div>
        <table style="width:100%;">
            <tr>
                <td colspan="2">
                    <b>Endereço ou código do Imóvel: </b>
                    <span>{{ $proposal->refImmobile }} </span>
                </td>

            </tr>
            <tr>
                <td><b>Finalidade: </b> <span>{{ $proposal->finality }}</span></td>
                <td></td>
            </tr>
            <tr>
                <td><strong>Tipo de garantia: </strong> <span>{{ $proposal->warrantyType }}</span></td>
                <td><strong>Motivo da Locação: </strong> <span>{{ $proposal->term }}</span></td>
                {{-- <td><strong>Condomínio: </strong> <span>{{ $proposal->currentCondominiumValue }}</span></td> --}}
            </tr>

            <tr>
                
                {{-- <td><strong>Tipo do Imóvel:</strong> <span>{{$proposal->currentCondominiumValue}}</span></td> --}}
            </tr>
            <tr>
                <td><strong>Prazo do contrato:</strong> <span>{{ $proposal->term }}</span></td>
                <td><strong>Aluguel Proposto:</strong>
                    <span>{{ number_format($proposal->proposedValue, '2', ',', '.') }}</span>
                </td>
            </tr>
            
            <tr>
                <td colspan="2">
                    <strong>Observações:</strong>
                    <span>{{ $proposal->ps }}</span>
                </td>
            </tr>
        </table>
        <br>
        <table width="100%">
            <tr class="tr_color">
                <td width="50%">
                    <label for=""> <strong> Aluguel e Encargos: </strong> <?php
                    $total_encargos = $proposal->currentCondominiumValue + 100 + 150;
                    echo 'R$ ' . number_format($total_encargos, 2, ',', '.');
                    ?> </label>
                </td>
                <td>
                    <label> <strong>Renda mínima desejada: </strong>R$
                        <?php
                        $total_desejado = 0;
                        if ($proposal->warrantyType == 'Sem garantia') {
                            $total_desejado = $total_encargos * 4;
                            echo number_format($total_desejado, 2, ',', '.') . '</label>';
                        } else {
                            $total_desejado = $total_encargos * 3;
                            echo number_format($total_desejado, 2, ',', '.') . '</label>';
                        }
                        ?>
                </td>
            </tr>
        </table>
        <br>
       
        <div>
            <label class="text-info" style="font-size: 14pt;">DADOS PESSOAIS PROPONENTE</label>                        
            <div class="bottom_div"></div>
            <table style="width:100%;">
                <tr>
                    <td style="width: 50%;">
                        <strong>Nome Completo: </strong> 
                        <span>{{$user->name}}</span><br />
                    </td>
                    <td><strong>Data nascimento: </strong> 
                        <span>{{ \Carbon\Carbon::parse($user->dataPersonal()->first()->brithDate)->format('d/m/Y')}}</span></td>
                </tr>
                <tr>
                    <td><strong>Órgão expeditor: </strong> 
                        <span>{{$user->dataPersonal()->first()->organConsignor}}</span>
                    </td>
                    <td><strong>Nacionalidade: </strong> 
                        <span> {{$user->dataPersonal()->first()->nationality}} </span>
                    </td>
                </tr>
                <tr>
                    <td><strong>Endereço: </strong> 
                        <span>
                            CEP: {{$user->address()->first()->cep}},
                            {{$user->address()->first()->address}},
                            Nº. {{isset($user->address()->first()->number)}},
                            {{$user->address()->first()->complement}},
                            {{$user->address()->first()->neighborhood}},
                            {{$user->address()->first()->city}},
                            {{$user->address()->first()->UF}},                           
                        </span>
                    </td>
                    <td><strong>Telefone: </strong> <span>{{$user->dataPersonal()->first()->nationality}}</span></td>
                </tr>
                <tr>
                    <td><strong>Celular: </strong> <span>'proposal_phone_cel2</span></td>
                    <td><strong>Nº de dependentes: </strong> <span>{{$user->dataPersonal()->first()->number_dependents}}</span></td>
                </tr>
                <tr>
                    <td><strong>CEP: </strong> <span>{{$user->address()->first()->cep}}</span></td>
                    <td><strong>Tempo que reside: </strong> <span>{{$user->address()->first()->neighborhood}}</span></td>
                </tr>
                <tr>
                   
                    
                </tr>
                <tr>
                    <td> 
                        <strong>Sexo: </strong><span>{{$user->dataPersonal()->first()->sex}}</span>
                    </td>
                    <td><strong>Identidade: </strong><span>{{$user->dataPersonal()->first()->identity}}</span></td>
                </tr>
                <tr>
                    <td><strong>CPF: </strong><span>{{$user->dataPersonal()->first()->cpf}}
                    <input type="checkbox"> SPC
                    </span>
    
                    </td>
                    <td><strong>Naturalidade: </strong> <span>{{$user->dataPersonal()->first()->naturality}}</span></td>
                </tr>
                <tr>
                    <td><strong>Filiação: </strong>  <span>'proposal_filiation</span></td>
                    <td><strong>Celular: </strong> <span>'proposal_phone_cel1</span></td>
                </tr>
                <tr>
                    <td><strong>Estado civil: </strong>  <span>{{$user->dataPersonal()->first()->maritalStatus}}</span></td>
                    <td><strong>Grau de Instrução: </strong><span>{{$user->dataPersonal()->first()->EducationLevel}}</span></td>
                </tr>
                <tr>
                    <td><strong>E-Mail: </strong><span>{{$user->email}}</span></td>
                    <td><strong>Endereço: </strong> 
                        <span>
                            CEP: {{$user->address()->first()->cep}},
                            {{$user->address()->first()->address}},
                            Nº. {{isset($user->address()->first()->number)}},
                            {{$user->address()->first()->complement}},
                            {{$user->address()->first()->neighborhood}},
                            {{$user->address()->first()->city}},
                            {{$user->address()->first()->UF}},                           
                        </span>
                    </td>
                </tr>
                <tr>
                    <td> 
                        <strong>Complemento: </strong><span>'proposal_complement</span>
                    </td>
                    <td><strong>Cidade: </strong><span>'proposal_city</span></td>
                </tr>
                <tr>
                    <td><strong> Tipo de Residência:</strong> <span>'proposal_type_residence</span></td>
                </tr>
            </table>
            <br />
        </div>

        <div>
            <label class="text-info" style="font-size: 14pt;">DADOS PROFISSIONAIS</label>                        
            <div class="bottom_div"></div>

        </div>

        <div>
            <label class="text-info" style="font-size: 14pt;">DADOS DO CÔNJUGE</label>                        
            <div class="bottom_div"></div>

        </div>
        <div>
            <label class="text-info" style="font-size: 14pt;">DADOS PROFISSIONAIS DO CONJUGE</label>                        
            <div class="bottom_div"></div>
        </div>
        <div>
            <label class="text-info" style="font-size: 14pt;">REFERÊNCIAS IMOBILIÁRIAS</label>                        
            <div class="bottom_div"></div>
        </div>
        <div>
            <label class="text-info" style="font-size: 14pt;">REFERÊNCIAS COMERCIAIS</label>                        
            <div class="bottom_div"></div>
        </div>
        <div>
            <label class="text-info" style="font-size: 14pt;">REFERÊNCIAS PESSOAIS</label>                        
            <div class="bottom_div"></div>
        </div>
        <div>
            <label class="text-info" style="font-size: 14pt;">REFERÊNCIAS BANCÁRIAS</label>                        
            <div class="bottom_div"></div>
        </div>
        <div>
            <label class="text-info" style="font-size: 14pt;">REFERÊNCIAS DE BENS DE IMÓVEIS</label>                        
            <div class="bottom_div"></div>
        </div>
        <div>
            <label class="text-info" style="font-size: 14pt;">REFERÊNCIAS DE BENS DE VEÍCULOS</label>                        
            <div class="bottom_div"></div>
        </div>

<div>
    <br/>
    <label class="text-info">PERGUNTAS ELIMINATÓRIAS</label>
    <div class="bottom_div"></div>
</div>
<div id="analise_cadastral">
    <table width="100%" >
        <tr class="tr_color">
            <td width="70%">
                a) Possuem registro no SPC?
            </td>
            <td width="30%" >(   )SIM  -  (   )NÃO </td>
        </tr>
        <tr>
            <td>Justifica, se houver:</td>
        </tr>
        <tr>
            <td width="70%" class="tr_color">
                a) Possuem processo judiciais que questionem sua idoneidade?
            </td>
            <td width="30%" class="tr_color">(   )SIM  -  (   )NÃO </td>
        </tr>
        <tr>
            <td>Justifica, se houver:</td>
        </tr>
        <tr>
            <td width="70%" class="tr_color">
                c) Possuem renda familiar líquida igual a 3 vezes o valor do aluguel?
            </td>
            <td width="30%" class="tr_color">(   )SIM  -  (   )NÃO </td>
        </tr>
        <tr>
            <td>Justifica, se houver:</td>
        </tr>
        <tr >
            <td colspan="2" class="tr_color">
                RESULTADO ELIMINATÓRIAS:    (   ) Aprovado  -  (   ) Aprovado com ressalvas  -  (   ) Reprovado 
            </td>
        </tr>
        <tr>
            <td>Observações, se houver:</td>
        </tr>
    </table>
    <!--PERGUNTAS CLASSIFICATÓRIAS -->
    <div class="text-center">
        <br/>
        <label class="text-info">PERGUNTAS CLASSIFICATÓRIAS</label>
        <div class="bottom_div"></div>
    </div>
    <table width="100%">
        <tr>
            <td width="60%"><strong>d) As despesas com aluguel e encargos cabe no orçamento dos interessados?</strong></td>
            <td width="20%">SIM |</td>
            <td width="18%">TALVEZ |</td>
            <td width="22%">NÃO</td>
        </tr>
        <tr>
            <td colspan="2" class="tr_color"><strong>e) Qual o valor total da renda comprovada? R$</strong></td>
            <td colspan="2" class="tr_color"><strong>E ela é:</strong></td>
        </tr>
        <tr>
            <td colspan="4">inferior a renda mínima desejada ou não conseguiram comprovar a renda mínima desejável</td>
        </tr>
        <tr>
            <td colspan="4" class="tr_color">Possui renda mínima desejável comprovada, mas não conseguiu comprovar outras rendas</td>
        </tr>
        <tr>
            <td colspan="4">Igual ou superior a mínima desejável, e comprovou a renda declarada.</td>
        </tr>
        <tr>
            <td colspan="4" class="tr_color">
                <strong>f) Qual a sua avaliação quanto as referências fornecidas pelo interessado?</strong>
            </td>
        </tr>
        <tr>
            <td>Ruim (não possui referências ou são fracas)</td>
        </tr>
        <tr>
            <td colspan="4" class="tr_color"> Boa </td>
        </tr>
        <tr>
            <td>Ótima (imobiliárias e informações bancárias podem ser ótimas referências)</td>
        </tr>
        <tr>
            <td colspan="4" class="tr_color">Observações, se houver:</td>
        </tr>
        <tr>
          <td><strong>g) Qual a relação dos bens do proponente ao AL.&EN.?</strong></td>
        </tr>
        <tr>
          <td colspan="4" class="tr_color">Ruim (BENS < 18 X AL.&EN.)</td>
        </tr>
        <tr>
          <td>Razoável (BENS > 18 X AL.&EN. , com alta liquidez)</td>
        </tr>
        <tr>
          <td colspan="4" class="tr_color">Bom (BENS > 48 x AL.&EN. , com baixa liquidez)</td>
        </tr>
        <tr>
          <td>Ótimo (BENS > 48 x AL.&EN. , com baixa liquidez e variados)</td>
        </tr>
    </table>

     <div class="text-center">
        <br/>
        <label class="text-info"><strong>PENDÊNCIAS</strong></label>
        <div class="bottom_div"></div>
    </div>

<div>
  <textarea name="" id="" cols="41" rows="20">Documentação</textarea>
  <textarea name="" id="" cols="41" rows="20">Outras</textarea>
</div>

    <div class="text-center">
        <br/>
        <label class="text-info"><strong>RESULTADO</strong></label>
        <div class="bottom_div"></div>
    </div>

    <table width="100%">
      <tr>
        <td><strong>Aprovado - </strong> Risco baixo (título 3 à 4x / Fiador regular)</td>
      </tr>
      <tr>
        <td class="tr_color"><strong>Aprovado - </strong> Risco moderado (título de 5 à 7x / Fiador bom)</td>
      </tr>
      <tr>
        <td><strong>Aprovado - </strong> Risco alto (título acima de 7x / Fiador muito bom) - considerar perfil do locador.</td>
      </tr>
      <tr>
        <td  class="tr_color"><strong>Reprovado</strong></td>
      </tr>
       <tr>
        <td>Observações:</td>
      </tr>
    </table>
</div>
<!--fim analise cadatral -->

<div style="width: 700px; height: 80px; background: ;">
  <br>
  <label for="" style="float: right;">Data: ____/____/______ </label>
</div>

<div style="height: 100px;" >
  <br/>
  <br/>
  <p style="background: ;width: 300px; float: left; ">
    ___________________________________<br>
    <label style="margin-left: 30px;"> Consultor Responsável</label>   
  </p>
   <p style="background: ;width: 300px; float: right; margin-top: -2px; ">
    ____________________________________<br>
    <label style="margin-left: 30px;">Revisor</label>
  </p>
   <br/>
</div>

    </div>
</body>

</html>
