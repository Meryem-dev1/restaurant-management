<x-admin-layout>
    <div class="flex mb-4">
        <a href="{{route('admin.menus.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
            Go Back!
        </a>
    </div>

    <div class="flex mb-5">
        <h2 class="text-2xl font-bold">Show Menu</h2>
    </div>

    <div class="grid grid-cols-1 gap-4">
        <div class="flex gap-2">
            <img src="{{Storage::url($menu->image)}}" class="rounded h-45 w-52" alt="Menu Image">
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex gap-2">
                <strong class="font-bold">Name:</strong>
                <span>{{ $menu->name }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Price:</strong>
                <span>{{ $menu->price }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Ingredients:</strong>
                <span>{{ $menu->ingredients }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Description:</strong>
                <span>{{ $menu->description }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Chef:</strong>
                <span>{{ $menu->chef->name }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Category:</strong>
                <span>{{ $menu->category->name }}</span>
            </div>
        </div>
    </div>
</x-admin-layout>
