<div>
    <h1 class="ext-3xl font-bold mb-10">All products</h1>
    <div class="flex justify-between  items-center  w-full flex-wrap">
        @foreach ($allproducts as $product )
           
        
        <div class="w-40 p-4 h-70 shadow-lg flex flex-col items-center justify-between rounded-lg">
            <div class="">
            <img class="w-full h-24" src="{{ 'storage/'.$product->image }}" alt="">
            </div>
            <form action="{{ route("savedata") }}" method="post">
                @csrf
            <div class="w-full flex items-center justify-center flex-col">
            <h1 class="text-xl font-bold mt-3 text-center ">{{ $product->productName }}</h1>
            <span class="mt-2">PhP {{ $product->productPrize }}.00</span>
            <input name="orderproductid" type="hidden" value="{{ $product->id }}">
            <input name="orderproductname" type="hidden" value="{{ $product->productName }}">
            <input name="orderproductprize" type="hidden" value="{{  $product->productPrize }}">
            <input name="orderproductimage" type="hidden" value="{{ $product->image }}">
            <input name="orderuserid" type="hidden" value="{{ Auth::user()->id }}">
            <button type="submit" class="bg-blue-500 text-white border-none rounded font-bold py-2 px-3 mt-4">Add to Cart</button>
            </div>
            </form>
    
         </div>
         @endforeach
    
    
        </div>
        <div class="mt-10">
        {{ $allproducts->links() }}
        </div>
</div>
