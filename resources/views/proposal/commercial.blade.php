<table class="w-100">
    @foreach($commercials as $commercial)
        <tr>
            <td colspan="2">
                <strong>Nome: </strong>
                <span>{{$commercial['name']}}</span>
            </td>
        </tr>
        <tr>
            <td class="w-50"><strong>CNPJ: </strong> <span>{{$commercial['cnpj']}}</span></td>
            <td class="w-50"><strong>Telefone: </strong> <span>{{$commercial['phone_fixed']}}</span></td>
        </tr>
        <tr>
            <td class="w-50"><strong>Celular: </strong>
                <span>{{$commercial['phone_mobile']}}</span></td>
            <td class="w-50"><strong>E-mail: </strong> <span>{{$commercial['email']}}</span></td>
        </tr>
    @endforeach
</table>
