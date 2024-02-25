<div>
    <div class="grid grid-flow-col gap-2">
        <div>
            <ul class="session-guarantor-rental-infolist">
                @foreach ($guarantor as $item)
                    <li>
                        <div class="px-4 py-5">
                            <div class="flex items-center justify-between">
                                <h3 class="session-guarantor-name text-lg "> {{$item['name']}}</h3>
                                <p class="session-guarantor-email"> {{$item['email']}}</p>
                            </div>
                            <div class="items-center">
                                <p class="text-sm font-medium text-gray-500">Situação:
                                    @if($item['isset'])
                                        <span class="session-guarantor-status">Iniciou</span></p>
                                {{--                                <a href="#" class="session-guarantor-btn-edit">Editar</a>--}}
                                <a
                                    href="{{ url('proposta/analise/'.$item['idGuarantor'].'/proposal/'.$item['idRental']) }}"
                                    class="session-guarantor-btn-edit"
                                    title="Visualiza a proposta do fiador"
                                    target="_blank"
                                >Ver Proposta</a>
                                {{--                                <a href="#" class="session-guarantor-btn-delete">Excluir</a>--}}
                                @else
                                    <span class="session-guarantor-status">Não Iniciou</span></p>
                                @endif

                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="">

            <ul class="session-guarantor-rental-infolist">
<li class="p-2 rounded-lg shadow-lg"><label for="">Observação</label></li>
                    <li>
                        <div class="px-4 py-5">
                            <div class="flex items-center justify-between">
                                <h3 class="session-guarantor-name text-lg "> Aluguel Anunciado: R$ 1.234,90</h3>
                            </div>
                        </div>
                    </li>
                <li>
                    <div class="px-4">
                        <div class="flex items-center justify-between">
                            <h3 class="session-guarantor-name text-lg "> Condomínio: R$ 1.234,90</h3>
                        </div>
                    </div>
                </li>

            </ul>
        </div>
    </div>

</div>
