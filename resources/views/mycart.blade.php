<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 leading-tight dark:text-white">
            {{ __('My Cart') }}
        </h2>
    </x-slot>

    <livewire:mycart/>
</x-app-layout>