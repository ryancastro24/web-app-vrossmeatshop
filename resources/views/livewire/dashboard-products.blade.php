<div class="p-10">

   

    <!-- Your content goes here -->

    <h1 class="text-4xl font-bold mb-10 text-center md:text-start">Best Sellers</h1>
    <div class="flex justify-between  items-center lg:gap-0 gap-10 w-full flex-wrap">
    @foreach ($displayProducts as $dProducts )
       
    
    <div class="w-full sm:w-80  p-10   h-96 shadow-lg flex flex-col dark:bg-slate-800 items-center justify-between rounded-lg">
        <div class="">
        <img class="w-full h-40" src="{{ 'storage/'.$dProducts->image }}" alt="">
        </div>
        <form action="{{ route("savedata") }}" method="post">
            @csrf
        <div class="w-full flex items-center justify-center flex-col">
        <h1 class="text-xl font-bold mt-3 text-center ">{{ $dProducts->productName }}</h1>
        <span class="mt-2">PhP {{ $dProducts->productPrize }}.00</span>
        <input name="orderproductid" type="hidden" value="{{ $dProducts->id }}">
        <input name="orderproductname" type="hidden" value="{{ $dProducts->productName }}">
        <input name="orderproductprize" type="hidden" value="{{  $dProducts->productPrize }}">
        <input name="orderproductimage" type="hidden" value="{{ $dProducts->image }}">
        <input name="orderuserid" type="hidden" value="{{ Auth::user()->id }}">
        <button type="submit" class="bg-blue-500 text-white border-none rounded font-bold py-2 px-3 mt-4">Add to Cart</button>
        </div>
        </form>

     </div>
     @endforeach


    </div>
  

        







{{-- all products section --}}


    <div>
        <h1 class="text-3xl font-bold mb-10 mt-20 text-center">All products</h1>
        <div class="flex justify-between  items-center  w-full flex-wrap">
            @foreach ($allproducts as $product )
               
            
            <div class="w-full mt-10 sm:mt-0 sm:w-auto p-4 h-70 shadow-lg flex flex-col items-center justify-between rounded-lg dark:bg-slate-800">
                <div class="">
                <img class="w-48 h-48 sm:w-32 sm:h-24 " src="{{ 'storage/'.$product->image }}" alt="">
                </div>
                <form action="{{ route("savedata") }}" method="post">
                    @csrf
                <div class="w-full flex items-center justify-center flex-col">
                <h1 class=" font-bold mt-3 text-center">{{ $product->productName }}</h1>
                <span class="mt-2">PhP {{ $product->productPrize }}.00</span>
                <input name="orderproductid" type="hidden" value="{{ $product->id }}">
                <input name="orderproductname" type="hidden" value="{{ $product->productName }}">
                <input name="orderproductprize" type="hidden" value="{{  $product->productPrize }}">
                <input name="orderproductimage" type="hidden" value="{{ $product->image }}">
                <input name="orderuserid" type="hidden" value="{{ Auth::user()->id }}">
                <button type="submit" class="bg-blue-500 text-white border-none rounded font-bold py-2 px-3 mt-4"><i class="fa-solid fa-cart-plus"></i></button>
                </div>
                </form>
        
             </div>
             @endforeach
        
        
            </div>
            <div class="mt-10">
            {{ $allproducts->links() }}
            </div>
    </div>
    
 
   


</div>
