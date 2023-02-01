<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center ">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight  dark:text-white">
            {{ __('Dashboard') }}
        </h2>
        @if (Auth::user()->masteruser_id == 2 || Auth::user()->masteruser_id == 3 )
        <button class="px-3 py-2 bg-blue-500 rounded font-bold  text-white"><i class="fa-solid fa-clock"></i> Time in</button>
        @endif
    
    </div>
    </x-slot>
{{-- 
    <div class="py-12 bg-slate-200">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('sendData') }}" method="post">
                @csrf
                <input type="hidden" name="user_id" id="id" value="{{ Auth::user()->id }}">
                <input type="text" name="productName" id="productName" placeholder="Product Name">
                <input type="text" name="productPrize" id="productPrize" placeholder="Product Prize">
                <input type="date" name="productDateExpected" id="productDateExpected">
                <x-primary-button type="submit">
                    Submit
                </x-primary-button>
            </form>

  
             
          
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
               

                
                    
                    <table class="w-full  border-2">
                        <tr class="border-2">
                        
                            <th class="border=2 bg-slate-500 text-white">Order Name</th>
                            <th class="border=2 bg-slate-200">Order Prize</th>
                            <th class="border=2 bg-slate-500 text-white">Date  Ordered</th>
                            <th class="border=2 bg-slate-200">Expected Arrival</th>
                         
                    @foreach ($data as $val )
                        @if (Auth::user()->id == $val->user_id)
                            
                        <tr class="text-center">
                            <td class="border-2">{{ $val->productName }}</td>
                            <td class="border-2">{{ $val->productPrize }}</td>
                            <td class="border-2">{{ $val->created_at }}</td>
                            <td class="border-2">{{ $val->productDateExpected }}</td>
                        </tr>

                        
                        @endif

                        @endforeach
                    </table>
               

            
            </div>
        </div>
    </div> --}}

    {{-- @foreach ($data as $val )

    <div class="bg-red-400 w-full p-5 ">
        <h1>{{ $val->header }}</h1>
        <h1>{{ $val->sub_header }}</h1>
        <h1>{{ $val->description }}</h1>
    </div>
    @endforeach --}}


    <!-- Carousel -->
<div id="demo" class="carousel slide" data-bs-ride="carousel">

  <!-- Indicators/dots -->
  {{-- <div class="carousel-indicators">
    <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
    <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
  </div> --}}
  
  <!-- The slideshow/carousel -->

    
  <div class="bg-red-600 carousel-inner lg:h-96 lg:px-32 dark:bg-red-900">

    @foreach ($data as $key => $val )
    <div class="carousel-item {{ $key  == 0 ? 'active' : '' }} h-full ">
        <div  class="py-5 lg:py-0 w-full px-5 h-full flex flex-col justify-center items-center lg:justify-between dark:bg-red-900 lg:flex-row">
            <div class="">
        <h1 class="text-white text-center text-3xl lg:text-6xl  font-bold  lg:text-start">{{ $val->header }}</h1>
            <h2 class="lg:text-4xl text-center font-thin text-white mb-10 lg:text-start">{{ $val->sub_header }}</h2>
            <p class="text-white text-center ;g:text-start">{{ $val->description }}</p>
            </div>
        <div class="h-full w-full sm:w-96 bg-red-500 dark:bg-red-800 lg:w-50 flex justify-center p-2">
            <img class="" src="{{ 'storage/'.$val->image }}" alt="">
            </div>
                
        </div>
    </div>
    @endforeach 


  </div>
  
  <!-- Left and right controls/icons -->
  <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
    <span class="carousel-control-next-icon"></span>
  </button>
</div>




<livewire:dashboard-products/>



</x-app-layout>
