<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex justify-end m-2 p-2">
                    <a href="{{route('admin.servers.create')}}" style="background-color:#359dab;" class="px-4 py-2  rounded-lg text-white">
                        New Server</a>
            </div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                ID
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Adress
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($servers as $server)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$server->id}}
                            </td>


                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$server->name}}
                            </td>

                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$server->adress}}
                            </td>

                            <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex space-x-2">
                                    <a href="{{route('admin.servers.show',$server->id)}}" style="color: #3b3939;font-size:20px;"  class="px-4 py-2 rounded-lg ">
                                        <i class="fa fa-list-ul" aria-hidden="true"></i></a>
                                         <a href="{{route('admin.servers.edit',$server->id)}}" style="color: #1ea561;font-size:20px;"  class="px-4 py-2  rounded-lg ">
                                            <i class="fas fa-edit"></i></a>

                                            <form style="color: #e21919;font-size:20px;"  class="px-4 py-2 b rounded-lg "
                                            method="POST"
                                            action={{route('admin.servers.destroy',$server->id)}}
                                            onsubmit="return confirm('Are You Sure ?');">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit"> <i class="fas fa-trash"></i></button>

                                        </form>
                                </div>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                </table>
        </div>
    </div>
    <div class="mt-2">
        {{$servers->links() }}
    </div>
</x-admin-layout>
