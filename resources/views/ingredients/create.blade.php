<x-app-layout>
    <x-slot name="header">
        {{ __('Add Ingredient') }} <i class = "fas fa-carrot ml-1"></i>
    </x-slot>

    <form method = "post" action = "{{ route('ingredients.store') }}">
        @csrf

        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <div>
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
        </div>

        <div class = "mt-4">
            <x-label for="price" :value="__('Price (MXN)')" />
            <x-input id="price" class="block mt-1 w-full" type="text" name="price" :value="old('price')" required />
        </div>

        <div class="mt-4">
            <x-label for="unit" :value="__('Unit')" />
            <x-select id="unit" class="block mt-1 w-full" name="unit" :value="old('unit')" required :options="$unitOptions" />
        </div>

        <div class = "mt-4">
            <x-label for="stock" :value="__('Stock')" />
            <x-input id="stock" class="block mt-1 w-full" type="text" name="stock" :value="old('stock')" required />
        </div>

        <div class="mt-4">
            <x-button class="w-full text-center justify-center py-3">
                {{ __('Add Ingredient') }} <i class = "ml-1 fas fa-carrot"></i>
            </x-button>
        </div>
    </form>

</x-app-layout>
