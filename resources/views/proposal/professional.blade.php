<table style="width:100%;">
    {{$carbon}}
    @foreach($professionals as $professional)

    <tr>
        <td colspan="2">
            <strong>Empresa onde trabalha: </strong>
            <span>{{$professional['name_bussiness']}}</span>
        </td>

    </tr>
    <tr>
        <td><strong>CNPJ: </strong> <span>{{$professional['cnpj']}}</span></td>
        <td><strong>Profissão: </strong> <span>{{$professional['profession']}}</span></td>
    </tr>
    <tr>
        <td><strong>Vínculo Empregatício: </strong>
            <span>{{$professional['employment_relationship']}}</span></td>
        <td><strong>Atividade: </strong> <span>{{$professional['activity']}}</span></td>
    </tr>
    <tr>
        <td><strong>Data de admissão: </strong> <span>{{$carbon->parse($professional['admission_date'])->format('d/m/Y')}}</span></td>
        <td><strong>Cargo/Função: </strong> <span>{{$professional['function']}}</span></td>
    </tr>
    <tr>
        <td><strong>Pessoa para contato: </strong> <span>{{$professional['contact_person']}}</span></td>

    </tr>

    <tr>
        <td><strong>E-mail: </strong> <span>{{$professional['email']}}</span></td>
        <td><strong>Salário(R$): </strong>
            <span>{{number_format($professional['salary'],'2',',','.')}}</span></td>
    </tr>
    <tr>
        <td>
            <strong>Outras Rendas(R$):</strong>
            <span>{{number_format($professional['other_rents'],'2',',','.')}}</span>
        </td>
        <td>
            <strong>Origem outras rendas:</strong> <span>{{$professional['other_income_source']}}</span>
        </td>
    </tr>

    @endforeach
    <tr>
        @foreach($phones as $phone)
            @if($phone['object_type'] == 'professional')
                <td><strong>Telefone: </strong> <span>{{$phone['number']}}</span></td>
            @endif
        @endforeach
    </tr>
</table>
