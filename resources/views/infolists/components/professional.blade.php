<x-dynamic-component :component="$getEntryWrapperView()" :entry="$entry">
    <div>
        {{-- {{$getRecord()->professional}} --}}
       
    </div>


    @foreach ($getRecord()->professional as $item)
    <div class="bg-blue-700">       
        <div class="">
            <a href="#" class="">
                <p class="text-grey-darker mb-2 group-hover:text-white text-center">
                    {{$item->profession}}
                </p>
            </a>
        </div>
      
    </div>
    @endforeach
    

</x-dynamic-component>
