<table class="w-100">
    @foreach($vehicles as $vehicle)
        <tr>
            <td>
                <strong>Marca: </strong>
                <span>{{$vehicle['branch']}}</span>
            </td>
            <td>
                <strong>Modelo: </strong>
                <span>{{$vehicle['model']}}</span>
            </td>
        </tr>
        <tr>
            <td class="w-50"><strong>Ano: </strong> <span>{{$vehicle['year']}}</span></td>
            <td class="w-50"><strong>Placa: </strong> <span>{{$vehicle['plate']}}</span></td>
        </tr>
        <tr>
            <td class="w-50"><strong>Financiado: </strong>
                <span>{{$vehicle['financed']}}</span></td>
            <td class="w-50"><strong>Financeira: </strong> <span>{{$vehicle['financial']}}</span></td>
        </tr>
        <tr>
            <td class="w-50"><strong>Valor: </strong>
                <span>{{$vehicle['value']}}</span>
            </td>

        </tr>
    @endforeach
</table><?php
