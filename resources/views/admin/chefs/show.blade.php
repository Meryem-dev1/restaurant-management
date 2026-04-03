<x-admin-layout>
    <div class="flex mb-4">
        <a href="{{route('admin.chefs.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
            Go Back!
        </a>
    </div>

    <div class="flex mb-5">
        <h2 class="text-2xl font-bold">Show Chef</h2>
    </div>

    <div class="grid grid-cols-1 gap-4">
        <div class="flex gap-2">
            <img src="{{Storage::url($chef->image)}}" class="rounded h-45 w-52" alt="Chef Image">
        </div>

        <div class="flex flex-col gap-4">
            <div class="flex gap-2">
                <strong class="font-bold">Name:</strong>
                <span>{{ $chef->name }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Email:</strong>
                <span>{{ $chef->email }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Phone Number:</strong>
                <span>{{ $chef->tel_number }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Speciality:</strong>
                <span>{{ $chef->speciality }}</span>
            </div>
        </div>
    </div>
</x-admin-layout>
