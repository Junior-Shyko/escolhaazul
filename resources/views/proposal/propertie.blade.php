<table style="width:100%;">
    @foreach($properties as $propertie)

        <tr>
            <td colspan="2">
                <strong>Valor: </strong>
                <span>{{$propertie['value']}}</span>
            </td>
            <td><strong>Financiado: </strong> <span>{{$propertie['financed']}}</span></td>
        </tr>
        <tr>
            <td><strong>Matrícula: </strong>
                <span>{{$propertie['registration']}}</span></td>
            <td><strong>Cartório: </strong> <span>{{$propertie['registry']}}</span></td>
        </tr>

        </tr>

    @endforeach

</table>
