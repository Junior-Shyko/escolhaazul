<table style="width:100%;">
    @foreach($realstate as $real)
        <tr>
            <td colspan="2">
                <strong>Nome: </strong>
                <span>{{$real['name']}}</span>
            </td>
        </tr>
        <tr>
            <td><strong>CRECI: </strong> <span>{{$real['creci']}}</span></td>
            <td><strong>Telefone: </strong> <span>{{$real['phone_fixed']}}</span></td>
        </tr>
        <tr>
            <td><strong>Celular: </strong>
                <span>{{$real['phone_mobile']}}</span></td>
            <td><strong>E-mail: </strong> <span>{{$real['email']}}</span></td>
        </tr>
    @endforeach
</table>
