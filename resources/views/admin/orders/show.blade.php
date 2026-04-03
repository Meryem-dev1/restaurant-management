<x-admin-layout>
    <div class="flex mb-4">
        <a href="{{route('admin.orders.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
            Go Back!
        </a>
    </div>

    <div class="flex mb-5">
        <h2 class="text-2xl font-bold">Show Order</h2>
    </div>

    <div class="grid grid-cols-1 gap-4">
        <div class="flex gap-2">
            <img src="{{Storage::url($order->image)}}" class="rounded h-45 w-52" alt="Order Image">
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex gap-2">
                <strong class="font-bold">Menu:</strong>
                <span>
                    @foreach($order->menus as $menu)
                        {{$menu->name}},
                     @endforeach
                </span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Total Price:</strong>
                <span>{{ $order->total_price }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Server:</strong>
                <span>{{ $order->server->name }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Payment type:</strong>
                <span>{{ $order->payment_type }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Payment ptatus:</strong>
                <span>{{ $order->payment_status }}</span>
            </div>
        </div>
    </div>
</x-admin-layout>
