{{--<div class="container w-full md:max-w-5xl mx-auto pt-20 px-4">--}}
{{--    <div>--}}
{{--        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">--}}
{{--            Proposta Nº. <strong>345</strong> - Proponente: <strong>Junior</strong>--}}
{{--        </p>--}}
{{--    </div>--}}
{{--    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">--}}
{{--        <h3>Files</h3>--}}
{{--        {{$this->table}}--}}
{{--    </div>--}}
{{--</div>--}}
<div class="container w-full md:max-w-5xl mx-auto pt-20 px-4">
    <div>
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Proposta Nº. <strong> {{$rental->id}}</strong> - Proponente: <strong>{{$user}}</strong>
        </p>
    </div>
    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">


        <table class="w-full text-center table-auto min-w-max">
            <thead>
            <tr class="" >
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Nome do arquivo
                    </p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Arquivo
                    </p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Download
                    </p>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
            @foreach($files as $file)
                <tr class="border-b hover:bg-gray-100">
                    <td>
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900
                        flex justify-center">
                            {{$file->name}}
                            @php
                                $ext = substr($file->name, -4);
                            @endphp
                        </p>
                    </td>
                    <td>
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 flex justify-center">
                            <a href="{{url('upload/'.$file->name)}}" download>
                                <img src="{{url('upload/'.$file->name)}}" alt="" srcset="" style="max-height: 200px;">
                            </a>
                            @if($ext == '.pdf')
                                <object data="{{url('upload/'.$file->name)}}" type="application/pdf">
                                    <iframe src="https://docs.google.com/viewer?url="{{url('upload/'.$file->name)}}"&embedded=true"></iframe>
                                </object>

                            @endif
                        </p>
                    </td>
                    <td>
                        <a href="{{url('upload/'.$file->name)}}" download
                           class="btn-download "
                           type="button">
                            Baixar
                        </a>

                        <button
                            class="btn-delete"
                            type="button"
                            wire:click="deletefile({{$file->id}})"
                            wire:confirm="Are you sure you want to delete this post?"
                        >
                            Excluir
                        </button>
{{--                        {{ ($this->deleteAction)(['file' => $file->id]) }}--}}
                    </td>
                </tr>
            @endforeach
            <x-filament-actions::modals />


        </table>
{{--                {{$this->table}}--}}

    </div>
</div>

