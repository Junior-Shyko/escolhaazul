<table class="w-100">
    @foreach($personals as $personal)
        <tr class="">
            <td colspan="2">
                <strong>Nome: </strong>
                <span>{{$personal['name']}}</span>
            </td>
        </tr>
        <tr>
            <td class="w-50"><strong>CPF: </strong> <span>{{$personal['cpf']}}</span></td>
            <td class="w-50"><strong>Qual a relação: </strong> <span>{{$personal['relationship']}}</span></td>
        </tr>
        <tr>
            <td class="w-50"><strong>Telefone: </strong>
                <span>{{$personal['phone_fixed']}}</span></td>
            <td class="w-50"><strong>Celular: </strong> <span>{{$personal['phone_mobile']}}</span></td>
        </tr>
    @endforeach
</table>
