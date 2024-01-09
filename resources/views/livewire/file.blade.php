
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
                        </p>
                    </td>


                    <td>
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 flex justify-center">
                            <img src="{{url('upload/'.$files->name)}}" alt="" srcset="" style="max-height: 200px;">
                        </p>
                    </td>
                    <td>
                        <button
                            class="btn-download "
                            type="button">
                           Baixar
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
