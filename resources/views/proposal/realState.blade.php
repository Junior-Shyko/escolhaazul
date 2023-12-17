<table class="w-100">
    @foreach($realstate as $real)
        <tr>
            <td colspan="2">
                <strong>Nome: </strong>
                <span>{{$real['name']}}</span>
            </td>
        </tr>
        <tr>
            <td class="w-50"><strong>CRECI: </strong> <span>{{$real['creci']}}</span></td>
            <td class="w-50"><strong>Telefone: </strong> <span>{{$real['phone_fixed']}}</span></td>
        </tr>
        <tr>
            <td class="w-50"><strong>Celular: </strong>
                <span>{{$real['phone_mobile']}}</span></td>
            <td class="w-50"><strong>E-mail: </strong> <span>{{$real['email']}}</span></td>
        </tr>
    @endforeach
</table>
