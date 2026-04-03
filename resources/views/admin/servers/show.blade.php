<x-admin-layout>
    <div class="flex mb-8">
        <a href="{{route('admin.servers.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
            Go Back!
        </a>
    </div>

    <div class="flex mb-7">
        <h2 class="text-2xl font-bold">Show Server</h2>
    </div>

    <div class="grid grid-cols-1 gap-4">

        <div class="flex flex-col gap-4">
            <div class="flex gap-2">
                <strong class="font-bold">Name:</strong>
                <span>{{ $server->name }}</span>
            </div>

         

            <div class="flex gap-2">
                <strong class="font-bold">Phone Number:</strong>
                <span>{{ $server->tel_number }}</span>
            </div>

            <div class="flex gap-2">
                <strong class="font-bold">Adress:</strong>
                <span>{{ $server->adress }}</span>
            </div>
        </div>
    </div>
</x-admin-layout>
