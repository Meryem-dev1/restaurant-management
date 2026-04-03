<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex justify-end m-2 p-2">
                <a href="{{route('admin.categories.create')}}" style="background-color:#359dab;" class="px-4 py-2  rounded-lg text-white">
                    New Category</a>
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
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)

                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category -> id}}
                            </td>

                            <td  class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{$category -> name}}
                            </td>
                            <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <div class="flex space-x-2">
                                   
                                        <a href="{{route('admin.categories.edit',$category->id)}}" style="color: #1ea561;font-size:20px;"  class="px-4 py-2  rounded-lg ">
                                            <i class="fas fa-edit"></i></a>

                                         <form style="color: #e21919;font-size:20px;"  class="px-4 py-2 b rounded-lg "
                                         method="POST"
                                         action={{route('admin.categories.destroy',$category->id)}}
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
                <div class='mt-1'>
                     {{$categories->links() }}
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
