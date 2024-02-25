<table style="width:100%;">
    <tr>
        <td style="width: 50%;">
            <strong>Nome Completo: </strong>
            <span>{{$user->name}}</span><br/>
        </td>
        <td><strong>Data nascimento: </strong>
            @if(isset($user->dataPersonal()->first()->birthDate))
                <span>{{ \Carbon\Carbon::parse($user->dataPersonal()->first()->birthDate)->format('d/m/Y') ?? ''}}</span>
        </td>
        @endif
    </tr>
    <tr>
        <td><strong>Órgão expeditor: </strong>
            <span>{{isset($user->dataPersonal()->first()->organConsignor) ? $user->dataPersonal()->first()->organConsignor : ''}}</span>
        </td>
        <td><strong>Nacionalidade: </strong>
            <span>{{isset($user->dataPersonal()->first()->nationality) ? $user->dataPersonal()->first()->nationality : ''}}</span>
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
        <td>
            <strong>Nº de dependentes: </strong>
            <span>{{isset($user->dataPersonal()->first()->number_dependents) ? $user->dataPersonal()->first()->number_dependents : ''}}</span>
        </td>
        {{--                    <td><strong>Tempo que reside: </strong> <span>{{ isset($user->address()->first()->neighborhood) }}</span></td>--}}
        <td><strong> Tipo de Residência:</strong> <span>'proposal_type_residence</span></td>
    </tr>
    <tr>
    </tr>
    <tr>
        <td>
            <strong>Sexo: </strong>
            <span>{{isset($user->dataPersonal()->first()->sex) ? $user->dataPersonal()->first()->sex : ''}}</span>
        </td>
        <td><strong>Identidade: </strong>
            <span>{{isset($user->dataPersonal()->first()->identity) ? $user->dataPersonal()->first()->identity : ''}}</span>
        </td>
    </tr>
    <tr>
        <td><strong>CPF: </strong>
            <span>{{isset($user->dataPersonal()->first()->cpf) ? $user->dataPersonal()->first()->cpf : ''}}</span>
            <span>
            <input type="checkbox"> SPC
            </span>

        </td>
        <td><strong>Naturalidade: </strong>
            <span>{{isset($user->dataPersonal()->first()->naturality) ? $user->dataPersonal()->first()->naturality : ''}}</span>
        </td>
    </tr>
    <tr>
        <td><strong>Estado civil: </strong>
            <span>{{isset($user->dataPersonal()->first()->maritalStatus) ? $user->dataPersonal()->first()->maritalStatus : ''}}</span>
        </td>
        <td><strong>Grau de Instrução: </strong>
            <span>{{isset($user->dataPersonal()->first()->EducationLevel) ? $user->dataPersonal()->first()->EducationLevel : ''}}</span>
        </td>
    </tr>
    <tr>
        <td colspan="2"><strong>E-Mail: </strong><span>{{$user->email}}</span></td>
    </tr>
    <tr>
        @foreach($phones as $phone)
            @if($phone['object_type'] == 'personal' || $phone['object_type'] == 'User')
                    <td><strong>Telefone: </strong> <span>{{$phone['number']}}</span></td>
            @endif
        @endforeach
    </tr>

</table>
<br/>
