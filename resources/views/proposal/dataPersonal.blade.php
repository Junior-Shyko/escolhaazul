
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
    <td colspan="2"><strong>Endereço: </strong>
        @if( isset($user->address()->first()->cep))
            <span>
                            CEP: {{ $user->address()->first()->cep }},
                            {{$user->address()->first()->address}},
                            Nº. {{isset($user->address()->first()->number)}},
                            {{$user->address()->first()->complement}},
                            {{$user->address()->first()->neighborhood}},
                            {{$user->address()->first()->city}},
                            {{$user->address()->first()->UF}},
                        </span>
        @endif

    </td>

</tr>
<tr>
    <td><strong>Celular: </strong> <span>'proposal_phone_cel2</span></td>
    <td><strong>Nacionalidade: </strong> <span>{{$user->dataPersonal()->first()->nationality}}</span></td>

</tr>
<tr>
    <td><strong>Nº de dependentes: </strong> <span>{{$user->dataPersonal()->first()->number_dependents}}</span></td>
    {{--                    <td><strong>Tempo que reside: </strong> <span>{{ isset($user->address()->first()->neighborhood) }}</span></td>--}}
    <td><strong> Tipo de Residência:</strong> <span>'proposal_type_residence</span></td>
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
    {{--                    <td><strong>Filiação: </strong>  <span>'proposal_filiation</span></td>--}}
    <td><strong>Celular: </strong> <span>'proposal_phone_cel1</span></td>
</tr>
<tr>
    <td><strong>Estado civil: </strong>  <span>{{$user->dataPersonal()->first()->maritalStatus}}</span></td>
    <td><strong>Grau de Instrução: </strong><span>{{$user->dataPersonal()->first()->EducationLevel}}</span></td>
</tr>
<tr>
    <td colspan="2"><strong>E-Mail: </strong><span>{{$user->email}}</span></td>
</tr>


</table>
<br />
