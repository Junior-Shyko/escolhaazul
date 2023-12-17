<table style="width:100%;">
    <tr>
        <td colspan="2">
            <strong>Empresa onde trabalha: </strong>
            <span>{{$user->professional()->first()->name_bussiness}}</span>
        </td>

    </tr>
    <tr>
        <td><strong>CNPJ: </strong> <span>{{$user->professional()->first()->cnpj}}</span></td>
        <td><strong>Profissão: </strong> <span>{{$user->professional()->first()->profession}}</span></td>
    </tr>
    <tr>
        <td><strong>Vínculo Empregatício: </strong>
            <span>{{$user->professional()->first()->employment_relationship}}</span></td>
        <td><strong>Atividade: </strong> <span>{{$user->professional()->first()->activity}}</span></td>
    </tr>
    <tr>
        <td><strong>Data de admissão: </strong> <span>{{$user->professional()->first()->admission_date}}</span></td>
        <td><strong>Cargo/Função: </strong> <span>{{$user->professional()->first()->function}}</span></td>
    </tr>
    <tr>

        <td><strong>Pessoa para contato: </strong> <span>{{$user->professional()->first()->contact_person}}</span></td>
    </tr>
    <tr>
        <td><strong>Telefone(RH): </strong> <span>{{$user->professional()->first()->contact_person}}</span></td>
        <td><strong>Ramal: </strong> <span>{{$user->professional()->first()->contact_person}}</span></td>
    </tr>
    <tr>
        <td><strong>E-mail: </strong> <span>{{$user->professional()->first()->email}}</span></td>
        <td><strong>Salário(R$): </strong>
            <span>{{number_format($user->professional()->first()->salary,'2',',','.')}}</span></td>
    </tr>
    <tr>
        <td>
            <strong>Outras Rendas(R$):</strong>
            <span>{{number_format($user->professional()->first()->other_rents,'2',',','.')}}</span>
        </td>
        <td>
            <strong>Origem outras rendas:</strong> <span>{{$user->professional()->first()->other_income_source}}</span>
        </td>
    </tr>

</table>
