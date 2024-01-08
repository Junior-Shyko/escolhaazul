
<div class="container w-full md:max-w-5xl mx-auto pt-20 px-4">
    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">


        <table class="border-collapse table-auto w-full text-sm">
            <thead>
            <tr class="border-b-2 border-2 mb-3 bg-midnight">
                <th class="py-4">Nome do arquivo</th>
                <th class="py-4">Arquivo</th>
                <th class="py-4 p-4">Download</th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
            @foreach($file as $files)
                <tr>
                    <td class="border-b border-slate-100 dark:border-slate-700 p-4 pl-8 text-slate-500 dark:text-slate-400">{{$files->name}}</td>
                    <td class="flex justify-center mt-2">
                        <img src="{{url('upload/'.$files->name)}}" alt="" srcset="" width="50%">
                    </td>
                    <td>
                        <button
                            class="block w-full select-none rounded-lg bg-gray-700"
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
