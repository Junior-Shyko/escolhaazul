<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div>
        {{ $getAction('resetStars') }}
        <ul class="session-guarantor-rental-infolist">
            @foreach ($getState() as $item)
            <li>
                <div class="px-4 py-5 sm:px-6">
                    <div class="flex items-center justify-between">
                        <h3 class="session-guarantor-name text-lg "> {{$item->name}}</h3>
                        <p class="session-guarantor-email"> {{$item->email}}</p>
                    </div>
                    <div class="mt-4 flex items-center justify-between">
                        <p class="text-sm font-medium text-gray-500">Situação: <span class="session-guarantor-status">Iniciou</span></p>
                        <a href="#" class="session-guarantor-btn-edit">Editar</a>
                        <a href="#" class="session-guarantor-btn-delete">Excluir</a>
                    </div>
                </div>
            </li>
            @endforeach
        </ul>
    </div>
</x-dynamic-component>
