<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex m-2 p-2">
            <a href="{{route('admin.menus.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                Go Back!</a>
        </div>

        <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="POST" action="{{ route('admin.menus.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="sm:col-span-6">
                        <label for="name" class="block text-sm font-medium text-gray-700"> Name </label>
                        <div class="mt-1">
                            <input type="text" id="name"  name="name" value="{{ old('name')}}" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('name')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="image" class="block text-sm font-medium text-gray-700"> Image </label>
                        <div class="mt-1">
                            <input type="file" id="image" name="image" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('image')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6">
                        <label for="price" class="block text-sm font-medium text-gray-700"> Price </label>
                        <div class="mt-1">
                            <input type="number" min="0.00" max="10000.00" step="0.01" id="price" name="price" value="{{ old('price')}}"
                                class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('price')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6 pt-5">
                        <label for="ingredients"  class="block text-sm font-medium text-gray-700">Ingredients</label>
                        <div class="mt-1">
                            <textarea type="text" id="ingredients"  name="ingredients" value="{{ old('ingredients')}}" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ old('ingredients','')}}</textarea>
                        </div>
                        @error('ingredients')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6 pt-5">
                        <label for="description"  class="block text-sm font-medium text-gray-700">Description</label>
                        <div class="mt-1">
                            <textarea type="text" id="description"  name="description" value="{{ old('description')}}" class="block w-full  appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ old('description','')}}</textarea>
                        </div>
                        @error('description')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="sm:col-span-6 pt-5">
                        <label for="body" class="block text-sm font-medium text-gray-700">Chef</label>
                        <div class="mt-1">
                            <select id="chef" name="chef_id"  class="form-select block w-full mt-1" >
                                @foreach($chefs as $chef)
                                    <option value="{{$chef->id}}" @selected(old('chef_id') == $chef->id)>
                                        {{$chef->name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                        </div>

                    <div class="sm:col-span-6 pt-5">
                        <label for="body" class="block text-sm font-medium text-gray-700">Categories</label>
                        <div class="mt-1">
                            <select id="category" name="category_id" class="form-multiselect block w-full mt-1" >
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}" @selected(old('category_id') == $category->id)>
                                        {{$category->name}}
                                    </option>
                                @endforeach

                            </select>
                        </div>
                    </div>


                    <div class="mt-6 p-3">
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">Store</button>
                    </div>
                </form>
                </div>
        </div>
        </div>
    </div>
</x-admin-layout>

