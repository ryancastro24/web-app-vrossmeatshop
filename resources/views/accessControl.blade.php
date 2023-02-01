
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight dark:text-white">
            {{ __('User Access Control') }}
        </h2>
    </x-slot>

    <div class="w-full sm:px-40  py-12 h-full py-100">

        @foreach ($data as $val )
    
        <div class="rounded flex-col gap-3 sm:flex-row relative p-4 w-full   flex justify-start items-start mt-6 shadow-lg dark:bg-slate-800 "wire:key="{{ $val->id }}"> 
            <div>
                <button class="bg-slate-200 dark:bg-slate-700 w-28 h-28 text-7xl dark:text-slate-100"><i class="fa-solid fa-user-tie"></i></button>
           
            </div>
            <div class=" flex flex-col gap-2">
            <h1 class="text-lg font-bold"><Strong>User ID: </Strong>{{ $val->my_id }}</h1>
            <h1 class=" text-md"><strong>Name: </strong>{{ $val->name }}</h1>
            <h3 class=" text-md"><strong>Email: </strong>{{ $val->email}}</h3>
            <h3 class=" text-md"><strong>Position: </strong>{{ $val->masterusers_name }}</h3>
            </div>
    
            <div class="absolute right-5 top-5">
                <button class="bg-red-500 dark:bg-slate-700 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" wire:click="remove({{ $val->id }})"><i class="fa-solid fa-user-xmark"></i></button>
                <button class="bg-blue-500 dark:bg-slate-700 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" wire:click="remove({{ $val->id }})"><i class="fa-solid fa-user-pen"></i></button>
            </div>
        </div>

        @endforeach
    {{-- <table class="table-auto w-full border-5 overflow-hidden shadow-lg rounded-xl">
        <tr class="">
            <th class="border text-center bg-slate-500 text-white py-2">User ID</th>
            <th class="border text-center bg-slate-500 text-white py-2">Name</th>
            <th class="border text-center bg-slate-500 text-white py-2">Email</th>
            <th class="border text-center bg-slate-500 text-white py-2">Position</th>
            <th class="border text-center bg-slate-500 text-white py-2">Delete</th>
            <th class="border text-center bg-slate-500 text-white py-2">Update</th>
        </tr>

        @foreach ($data as $val )
            <tr class="">
                <td class="border text-center py-2">{{ $val->my_id }}</td>
                <td class="border text-center py-2">{{ $val->name }}</td>
                <td class="border text-center py-2">{{ $val->email }}</td>
                <td class="border text-center py-2">{{ $val->masterusers_name }}</td>
                <td class="border text-center py-2"><button class="bg-red-500 text-white font-bold border-none outline-none px-5 py-2 rounded shadow-md"><i class="fa-solid fa-user-xmark"></i></button></td>
                <td class="border text-center py-2"><button class="bg-blue-500 text-white font-bold border-none outline-none px-5 py-2 rounded shadow-md"><i class="fa-solid fa-user-pen"></i></button></td>
            </tr>
        @endforeach
    </table> --}}


    
    </div>
   
</x-app-layout>