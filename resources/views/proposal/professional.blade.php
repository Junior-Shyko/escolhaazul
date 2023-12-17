<table style="width:100%;">
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
        <td><strong>Data de admissão: </strong> <span>{{$professional['admission_date']}}</span></td>
        <td><strong>Cargo/Função: </strong> <span>{{$professional['function']}}</span></td>
    </tr>
    <tr>

        <td><strong>Pessoa para contato: </strong> <span>{{$professional['contact_person']}}</span></td>
    </tr>
    <tr>
        <td><strong>Telefone(RH): </strong> <span>{{$professional['contact_person']}}</span></td>
        <td><strong>Ramal: </strong> <span>{{$professional['contact_person']}}</span></td>
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
</table>
