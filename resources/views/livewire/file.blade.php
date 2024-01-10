@php
    if(!is_null($idProposal)):
@endphp
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
            @foreach($file as $files)
                <tr class="border-b hover:bg-gray-100">
                    <td>
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900
                        flex justify-center">
                            {{$files->name}}
                            @php
                                $ext = substr($files->name, -4);
                            @endphp
                        </p>
                    </td>
                    <td>
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 flex justify-center">
                            <a href="{{url('upload/'.$files->name)}}" download>
                                <img src="{{url('upload/'.$files->name)}}" alt="" srcset="" style="max-height: 200px;">
                            </a>
                            @if($ext == '.pdf')
                                <object data="{{url('upload/'.$files->name)}}" type="application/pdf">
                                    <iframe src="https://docs.google.com/viewer?url="{{url('upload/'.$files->name)}}"&embedded=true"></iframe>
                                </object>

                            @endif
                        </p>
                    </td>
                    <td>
                        <a href="{{url('upload/'.$files->name)}}" download
                            class="btn-download "
                            type="button">
                           Baixar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
@else
    <div class="container w-full md:max-w-5xl mx-auto pt-20 px-4">
        <div>
            <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
              Sem arquivos
            </p>
        </div>
    </div>

@endif
