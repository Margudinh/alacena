<x-app-layout>
    <x-slot name="header">
        {{ __('Ingredients') }} <i class = "fas fa-carrot ml-1"></i>
    </x-slot>

    <div class="grid gap-3 xs:grid-cols-2 md:grid-cols-3">
        @forelse ($ingredients as $i)
            <div>
                <h3 class = "font-bold text-lg">{{$i->name}}</h3>
                <p>{{ __('Stock') }}: {{ $i->stock }} {{$i->unit}}</p>
                <div class = "pt-2">
                    <a href="{{ route('ingredients.edit', ['id' => $i->id] )}}" class="py-1 px-3 text-sm bg-gray-800 hover:bg-gray-900 text-white rounded"><i class = "fas fa-edit mr-1"></i>{{ __('Edit') }}</a>
                </div>
            </div>
        @empty
            There are no ingredients yet
        @endforelse
    </div>

    <div class = "pt-5">
        <a class="py-1 px-3 bg-gray-800 text-white rounded hover:bg-gray-900" href ="{{ route('ingredients.create') }}">Add Ingredients</a>
    </div>
</x-app-layout>
