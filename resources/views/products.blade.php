<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
        <h2 class="text-gray-700 font-bold text-2xl">Latest Products</h2>
        <div class="h-1 w-48 bg-gray-700"></div>

        <div class="grid xl:grid-cols-4 lg:grid-cols-3 md:grid-cols-2 grid-cols-1 gap-6 mt-8">
            @foreach ($products as $key => $product)
                <div class="max-w-sm  overflow-hidden rounded-md bg-white">
                    <div class="w-full max-h-80 border-b border-gray-300">
                        <img src="{{ $product->image }}" class="w-full h-48">
                    </div>
                    <div class="py-4 px-4">
                        <div class="flex justify-between items-center">
                            <h2 class="text-sm text-gray-500 font-semibold">{{ $product->name }}</h2>
                            <h2 class="text-sm text-gray-500 font-semibold">{{ $product->price }}</h2>
                        </div>
                        <div class="flex justify-end  mt-4">
                            <form method="POST" action="{{ route('add_cart') }}" enctype="multipart/form-data">
                                @csrf
                                <input name="id" value="{{ $product->id }}" hidden>
                                <input name="name" value="{{ $product->name }}" hidden>
                                <input name="price" value="{{ $product->price }}" hidden>
                                <input name="description" value="{{ $product->description }}" hidden>  
                                <input name="image" value="{{ $product->image }}" hidden>

                                <button class="bg-blue-950 text-white rounded-md text-sm px-3 py-1 font-bold">Add To Cart</button>
                            </form>
                        </div>
                        
                    </div>


                </div>
            @endforeach
        </div>
    </div>
</x-app-layout>
