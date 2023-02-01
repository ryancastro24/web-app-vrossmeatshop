<div>
    <div class="w-full px-10 md:px-40 pb-20 dark:bg-slate-900">
        <h1 class="text-3xl font-bold mt-10">Recent Orders</h1>

        @if (session()->has('rmmessage'))
        <div class="flex items-center p-9 bg-green-400 text-white" x-data x-init="setTimeout(() => {
            $el.remove()
          },2000);">
            {{ session('rmmessage') }}
        </div>
    @endif
        @foreach ($orders as $order )
        
        @if (Auth::user()->id == $order->user_id)
        <div class="rounded relative p-4 w-full sm:flex-row flex flex-col justify-start items-start  mt-6 shadow-lg dark:bg-slate-800 "> 
            <div>
            <img class="w-28 h-28" src="{{ 'storage/'.$order->productimage }}" alt="">
            </div>
            <div class="mt-2 sm:mt-0 sm:ml-5 flex flex-col gap-2">
            <h1 class="text-lg font-bold">{{ $order->productname }}</h1>
            <h2 class=" text-md"><strong>Prize:</strong> PHP {{ $order->productprize }}.00</h2>
            <h3 class=" text-md"><strong>Placed order in: </strong>{{ $order->created_at->diffForHumans() }}</h3>
            </div>

            <div class="absolute right-5 top-5">
                <button class="bg-red-500 dark:bg-slate-700 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" wire:click="remove({{ $order->id }})"><i class="fa-sharp fa-solid fa-trash"></i></button>
                <button class="bg-gray-500 dark:bg-slate-700 text-white font-bold border-none outline-none px-3 py-2 rounded shadow-md" wire:click="remove({{ $order->id }})"><i class="fa-solid fa-circle-exclamation"></i></button>
            </div>
        </div>
    
        @endif
        @endforeach

        {{-- <div class="mt-10">
            {{ $orders->links() }}
        </div> --}}


        <div>
            @if ($paginator->hasPages())
                <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between">
                    <span>
                        {{-- Previous Page Link --}}
                        @if ($paginator->onFirstPage())
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                {!! __('pagination.previous') !!}
                            </span>
                        @else
                            <button wire:click="previousPage" wire:loading.attr="disabled" rel="prev" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                {!! __('pagination.previous') !!}
                            </button>
                        @endif
                    </span>
         
                    <span>
                        {{-- Next Page Link --}}
                        @if ($paginator->hasMorePages())
                            <button wire:click="nextPage" wire:loading.attr="disabled" rel="next" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                {!! __('pagination.next') !!}
                            </button>
                        @else
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                {!! __('pagination.next') !!}
                            </span>
                        @endif
                    </span>
                </nav>
            @endif
        </div>
       
    </div>
    
</div>
