
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12 h-full py-100">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
          <livewire:products/>
        </div>
    </div>
   
</x-app-layout>