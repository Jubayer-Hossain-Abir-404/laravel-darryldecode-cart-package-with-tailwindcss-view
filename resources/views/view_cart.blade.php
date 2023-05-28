<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart Items') }}
        </h2>
    </x-slot>

    <div class="my-8 py-6 px-6 bg-white w-10/12 mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Carts</h1>
        <table class="table-auto w-full">
            <thead>
                <tr>
                    <th class="w-[20%] py-6"></th>
                    <th class="uppercase w-[40%]">Name</th>
                    <th class="uppercase w-[20%]">Quantity</th>
                    <th class="uppercase w-[10%]">Price</th>
                    <th class="uppercase w-[10%]">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($carts as $cart)
                    <tr>
                        <td class="text-left py-6">
                            <img src="{{ $cart->attributes->image }}" class="w-full h-40">
                        </td>
                        <td class="text-center">{{ $cart->name }}</td>
                        <td class="text-center">
                            <form method="POST" action="{{ route('update-cart') }}" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $cart->id }}">
                                <input type="number" id="quantity" name="quantity" min="1"
                                    value="{{ $cart->quantity }}" class="rounded w-3/5 my-1">
                                <button class="bg-cyan-900 w-3/5 py-2 text-white rounded">Update</button>
                            </form>

                        </td>
                        <td class="text-center">{{ $cart->price }}</td>
                        <td  class="text-center">
                            <a class="bg-cyan-900 w-2/5 py-3 px-4 text-white rounded-full" href="{{ route('remove-item', $cart->id) }}">X</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

            <tfoot>
                <tr class="">
                    <th colspan="4" class="text-2xl font-base text-gray-500 text-left">
                        Total: <span>${{ Cart::getTotal() }}</span>
                    </th>
                    <td class="">
                        <a class="bg-cyan-900  py-3 px-2 text-white rounded" style="{{ Cart::isEmpty() ? 'pointer-events:none;' : '' }}" href="{{ route('clear-item') }}">Clear Carts</a>
                    </td>
                </tr>
            </tfoot>

        </table>
    </div>

</x-app-layout>
