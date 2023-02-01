<div>
   
  

    <form class="shadow-lg flex w-full flex-col gap-5  md:flex-row md:items-end  lg:w-3/4 p-4 rounded-lg  justify-between items-center dark:bg-slate-800 "  wire:submit.prevent="addproducts">
        <div class="flex w-full md:w-   auto justify-center flex-col gap-4">
        <input class="md:w-80 w-full border-gray-300 dark:bg-slate-700 dark:border-none focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="text" placeholder="Product Name" wire:model="productname" >
        <input class="md:w-80 w-full border-gray-300 dark:bg-slate-700 dark:border-none focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="number" placeholder="Product Prize" wire:model="productprize">
        </div>
        <div>
        <img class="w-20 " src="{{ $productimage }}" alt="">
        <input id="image" class="w-60 cursor-pointer dark:bg-slate-700 dark:border-none border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" type="file" wire:change="$emit('fileChoosen')">
        </div>
        <button class="bg-blue-600 text-white border-none rounded px-3 py-2 font-bold   " type="submit"><i class="fa-solid fa-plus"></i></button>
        
    </form>
    <h1 class="mt-10 text-2xl font-bold text-center">List of Products</h1>
    @foreach ($products as $product )
    <div class="rounded relative p-4 w-full flex-col gap-4 sm:flex-row flex justify-start items-start mt-6 shadow-lg dark:bg-slate-800 "wire:key="{{ $product->id }}"> 
        <div>
        <img class="w-40 h-40 sm:w-20 sm:h-20" src="{{ 'storage/'.$product->image }}" alt="">
        </div>
        <div class=" flex flex-col gap-2">
        <h1 class="text-lg font-bold"><Strong>Product Name: </Strong>{{ $product->prodcutName }}</h1>
        <h2 class=" text-md"><strong>Product Prize: </strong>{{ $product->productPrize }}</h2>
        </div>

        <div class="absolute right-5 top-5">
            <button class="bg-red-500 dark:bg-slate-700 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" wire:click="remove({{ $product->id }})"><i class="fa-sharp fa-solid fa-trash"></i></button>
            <button class="bg-blue-500 dark:bg-slate-700 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" wire:click="remove({{ $product->id }})"><i class="fa-solid fa-pen-to-square"></i></button>
        </div>
    </div>
    @endforeach

    {{-- <table class="table-auto w-full border-5 overflow-hidden shadow-lg rounded-md mt-4 dark:bg-slate-800">
        <tr>
            <th class="border text-center dark:border-2  bg-slate-500 dark:bg-slate-900 text-white py-2">Product Name</th>
            <th class="border text-center dark:border-2  dark:bg-slate-900 bg-slate-500 text-white py-2">Product Prize</th>
            <th class="border text-center dark:border-2  dark:bg-slate-900 bg-slate-500 text-white py-2">Product Image</th>
            <th class="border text-center dark:border-2  dark:bg-slate-900 bg-slate-500 text-white py-2">Delete</th>
            <th class="border text-center dark:border-2  dark:bg-slate-900 bg-slate-500 text-white py-2">Update</th>
        </tr>
        @foreach ($products as $product )
            <tr>
                <td class="dark:border-slate-900 dark:border-2 text-center  dark:bg-slate-700 py-2">{{ $product->productName }}</td>
                <td class="dark:border-slate-900 dark:border-2  text-center  dark:bg-slate-700  py-2">{{ $product->productPrize }}</td>
                <td class="dark:border-slate-900 dark:border-2 text-center  dark:bg-slate-700  text-white grid place-items-center"><img class="w-20 border-none" src="{{ 'storage/'.$product->image }}" alt=""></td>
                <td class="dark:border-slate-900 dark:border-2  text-center  dark:bg-slate-700  py-2"><button class="bg-red-500 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" wire:click="remove({{ $product->id }})"><i class="fa-sharp fa-solid fa-trash"></i></button></td>
                <td class="dark:border-slate-900 dark:border-2  text-center  dark:bg-slate-700  py-2"><button class="bg-blue-500 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" ><i class="fa-solid fa-pen-to-square"></i></button></td>
            </tr>
        @endforeach
    </table> --}}


    <div class="mt-10">    
        {{ $products->links() }}
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
</div>
