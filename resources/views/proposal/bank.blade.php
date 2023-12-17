<table class="w-100">
    @foreach($banks as $bank)
        <tr>
            <td>
                <strong>Conta Corrente: </strong>
                <span>{{$bank['number_acoount']}}</span>
            </td>
            <td>
                <strong>Banco: </strong>
                <span>{{$bank['name_bank']}}</span>
            </td>
        </tr>
        <tr>
            <td class="w-50"><strong>Agência: </strong> <span>{{$bank['name_agency']}}</span></td>
            <td class="w-50"><strong>Nome Gerente:</strong><span>{{$bank['name_manager']}}</span></td>
        </tr>
        <tr>
            <td class="w-50"><strong>Telefone Gerente: </strong> <span>{{$bank['phone_manager']}}</span></td>
            <td class="w-50"><strong>Cliente desde: </strong>
                <span>{{ \Carbon\Carbon::parse($bank['client_since'])->format('d/m/Y') }}</span>
            </td>
        </tr>
        <tr>
            <td class="w-50" colspan="2"><strong>E-mail: </strong> <span>{{$bank['email_manager']}}</span></td>
        </tr>
        <tr>
            <td class="w-50"><strong>Cartão de Crédito: </strong> <span>{{$bank['name_credit_card1']}}</span></td>
            <td class="w-50"><strong>Limite: </strong>
                <span>
                    {{ number_format($bank['limit_credit_card1'], 2, ',', '.')  }}
                </span>
            </td>
        </tr>
        <tr>
            <td class="w-50"><strong>Cartão de Crédito: </strong> <span>{{$bank['name_credit_card2']}}</span></td>
            <td class="w-50"><strong>Limite: </strong>
                <span>
                    {{ number_format($bank['limit_credit_card2'], 2, ',', '.')  }}
                </span>
            </td>
        </tr>

    @endforeach
</table>
