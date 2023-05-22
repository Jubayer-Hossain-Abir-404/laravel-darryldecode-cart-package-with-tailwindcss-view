<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Cart Items') }}
        </h2>
    </x-slot>

    <div class="my-8 py-6 px-6 bg-white w-10/12 mx-auto">
        <h1 class="text-2xl font-bold text-gray-700 mb-4">Carts</h1>
        <table class="table-auto">
            <tr>
                <td class="mr-8"></td>
                <td class="uppercase">Name</td>
                <td class="uppercase">Quantity</td>
                <td class="uppercase">Price</td>
                <td class="uppercase">Remove</td>
            </tr>
            @foreach ($carts as $cart)
                <tr>
                    <td class="max-h-80 w-60">
                        <img src="{{ $cart->attributes->image }}" class="w-full h-40">
                    </td>
                    <td class="w-2/5">{{ $cart->name }}</td>
                    <td>{{ $cart->quantity }}</td>
                    <td>{{ $cart->price }}</td>
                </tr>
            @endforeach
        </table>
    </div>

</x-app-layout>
