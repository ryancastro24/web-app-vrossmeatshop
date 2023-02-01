<div>

   <form action="" class=" p-10 rounded-xl shadow-lg dark:bg-slate-800 " wire:submit.prevent="addAnnouncement">
    @csrf
    <div class="flex flex-col md:flex-row gap-10 mb-6">
    <input type="text" class="md:w-80 w-full border-gray-300 dark:bg-slate-700 dark:border-none focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"placeholder="Enter header" wire:model="headerData">
    <input type="text" class="md:w-80 w-full border-gray-300 dark:bg-slate-700 dark:border-none focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm "placeholder="Enter sub-header" wire:model="sub_headerData">
    <select wire:model="user_idData" name="" class="md:w-60 border-gray-300 dark:bg-slate-700 dark:border-none focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="">
        @foreach ($masterusersopt as $masteruserval )
            <option value="{{ $masteruserval->id }}">{{ $masteruserval->masterusers_name }}</option>

        @endforeach
    </select>
    
    </div class="">
    <textarea class="w-full h-28 rounded-md resize-none dark:bg-slate-700 dark:border-none border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 shadow-sm" name="" id="" cols="30" rows="10" placeholder="Enter text" wire:model="desData">
    </textarea>

    <img src="{{ $image }}" alt="" class="sm:w-40 w-full mt-10">
    <div class="mt-10 flex justify-between flex-col gap-10 md:flex-row md:gap-0 ">

    
    <input class="border-gray-300 md:w-70 md:h-8 dark:bg-slate-700 dark:border-none focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="image" type="file" wire:change="$emit('fileChoosen')">
    <button class="px-3 py-2 bg-red-600 dark:bg-blue-500 text-white border-none rounded outline-none font-bold text-lg" type="submit"><i class="fa-solid fa-calendar-plus"></i></button>
    </div>
   </form>
   <div>
    @if (session()->has('message'))
        <div class="flex items-center p-9 bg-green-400 text-white" x-data x-init="setTimeout(() => {
            $el.remove()
          },2000);">
            {{ session('message') }}
        </div>
    @endif


    @if (session()->has('rmmessage'))
        <div class="flex items-center p-9 bg-green-400 text-white" x-data x-init="setTimeout(() => {
            $el.remove()
          },2000);">
            {{ session('rmmessage') }}
        </div>
    @endif


</div>


@forelse ($announcementData  as  $value)


    <div class="rounded md:justify-start md:items-center gap-3  relative p-4 w-full md:flex-row flex-col flex justify-start items-start mt-6 shadow-lg dark:bg-slate-800 "wire:key="{{ $value->id }}"> 
        <div>
        <img class="w-40 h-40 md:w-20 md:h-20   " src="{{ 'storage/'.$value->image }}" alt="">
        </div>
        <div class=" flex flex-col gap-2">
        <h1 class="text-lg font-bold"><Strong>Header: </Strong>{{ $value->header }}</h1>
        <h2 class=" text-md"><strong>Sub Header: </strong>{{ $value->sub_header }}</h2>
        <h3 class=" text-md"><strong>Description: </strong>{{ $value->description }}</h3>
        </div>

        <div class="absolute right-5 top-5">
            <button class="bg-red-500 dark:bg-slate-700 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" wire:click="removeAnnouncement({{ $value->id }})"><i class="fa-sharp fa-solid fa-trash"></i></button>
            <button class="bg-blue-500 dark:bg-slate-700 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" ><i class="fa-solid fa-pen-to-square"></i></button>
        </div>
    </div>
@empty
<div class="w-full bg-slate-200 h-20 mt-10 flex justify-center items-center text-lg rounded-md">
    <h1 class="opacity-75">No Data Available</h1>
</div>
@endforelse


   {{ $announcementData->links() }}
   
</div>

<script>
 
 
 Livewire.on('fileChoosen', () => {
    
              let inputField = document.getElementById('image');
              let file = inputField.files[0];
              let reader = new FileReader();
  
              reader.onloadend = () =>{
                Livewire.emit('fileUpload',reader.result)
              }
  
              reader.readAsDataURL(file);
              
          })

</script>