<div>
    <div class="p-6 bg-{{$type}}-500 border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-{{$type}} dark:text-{{$type}}-500">{{$messageTitle}}</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
            {{$message}}
        </p>
        <a href="{{url('admin')}}" class="btn-alternative">
            Voltar para Home
        </a>
    </div>
</div>
