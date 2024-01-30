<div class="container w-full md:max-w-5xl mx-auto pt-20 px-4">
    <div>
        <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
            Proposta Nº. <strong> {{$rental->id}}</strong> - Proponente: <strong>{{$user}}</strong>
        </p>
        <div class="max-w-2xl mx-auto session-file-rental ">
        <form wire:submit="save">
            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" 
                for="file_input">Upload de arquivos</label>
   
            <input type="file" 
                wire:model="photos" 
                name="file" 
                multiple
                class="input-file-rental"
                >
            <div>@error('photos.*') Arquivo não suportado, tente novamente. @enderror</div>

            <p class="mt-10">
                <button type="submit" class="font-bold rounded-lg p-2 btn-submit-file mt-5">Enviar arquivo</button>
            </p>
        </form>
    </div>

     
        </div>
       

    <div class="relative flex flex-col mt-6 text-gray-700 bg-white shadow-md bg-clip-border rounded-xl w-96">


        <table class="w-full text-center table-auto min-w-max">
            <thead>
            <tr class="" >
                {{-- <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Nome do arquivo
                    </p>
                </th> --}}
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Arquivo
                    </p>
                </th>
                <th class="p-4 border-b border-blue-gray-100 bg-blue-gray-50">
                    <p class="block font-sans text-sm antialiased font-normal leading-none text-blue-gray-900 opacity-70">
                        Ação
                    </p>
                </th>
            </tr>
            </thead>
            <tbody class="bg-white dark:bg-slate-800">
            @foreach($files as $file)
            @php
                $ext = substr($file->name, -4);
            @endphp
                <tr class="border-b hover:bg-gray-100">
                    {{-- <td>
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900
                        flex justify-center">
                            {{$file->name}}
                           
                        </p>
                    </td> --}}
                    <td>
                        <p class="block font-sans text-sm antialiased font-normal leading-normal text-blue-gray-900 flex justify-center">
                            <a href="{{url('upload/'.$file->name)}}" download title="{{$file->name}}">
                                <img src="{{url('storage/upload/'.$file->name)}}" alt="" srcset="" style="max-height: 200px;">
                            </a>
                            @if($ext == '.pdf')                            
                                <object data="{{url('storage/upload/'.$file->name)}}"  type="application/pdf">
                                    <iframe src="https://docs.google.com/viewer?url={{url('storage/upload/'.$file->name)}}&embedded=true" title="{{$file->name}}"></iframe>
                                 </object>
                            @endif
                        </p>
                    </td>
                    <td>
                        <a href="{{url('storage/upload/'.$file->name)}}" download
                           class="btn-download "
                           type="button"
                           title="Baixa o arquivo para você"
                        >
                            Baixar
                        </a>

                        <button
                            class="btn-delete"
                            type="button"
                            wire:click="deletefile({{$file->id}})"
                            wire:confirm="Tem certeza que deseja excluir esse arquivo?"
                        >
                            Excluir
                        </button>
{{--                        {{ ($this->deleteAction)(['file' => $file->id]) }}--}}
                    </td>
                </tr>
            @endforeach
            {{-- <x-filament-actions::modals /> --}}


        </table>
               {{-- {{$this->table}} --}}

    </div>
</div>
@section('scripts')
    <script>
        $(document).ready(function(){
            $("#showEnterCodeModal").on('hidden.bs.modal', function(){
                livewire.emit('onCloseModal');
            });
            console.log('live')
        });
    </script>
@endsection

