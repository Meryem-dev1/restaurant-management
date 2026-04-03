<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="flex m-2 p-2">
            <a href="{{route('admin.orders.index')}}" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                Go Back!</a>
        </div>

        <div class="m-2 p-2 bg-slate-100 rounded">
            <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">
                <form method="POST" action="{{ route('admin.orders.update',$order->id) }}" >
                @csrf
                @method('PUT')

                <div class="sm:col-span-6">
                    <label for="user_id" class="block text-sm font-medium text-gray-700"> Custommer Name </label>
                    <div class="mt-1">
                        <input type="text" id="user_id"  name="user_id" value="{{$order->user_id}}" disabled  class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                    </div>
                    @error('user_id')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                    @enderror
                </div>
                
                    
                
                    <div class="sm:col-span-6">
                        <label for="date" class="block text-sm font-medium text-gray-700"> Date </label>
                        <div class="mt-1">
                            <input type="date" id="date"  name="date" value="{{$order->date}}" disabled  class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('date')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="sm:col-span-6">
                        <label for="hour" class="block text-sm font-medium text-gray-700"> Time </label>
                        <div class="mt-1">
                            <input type="time" id="hour"  name="hour" value="{{$order->hour}}"  disabled class="block w-full transition duration-150 ease-in-out appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" />
                        </div>
                        @error('hour')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="sm:col-span-6 pt-5">
                        <label for="status" class="block text-sm font-medium text-gray-700">Status</label>
                        <div class="mt-1">
                            <select id="status" name="status" class="form-multiselect block w-full mt-1">
                                    @foreach(App\Enums\OrderStatus::cases() as $status)
                                        <option value="{{$status->value}}" @selected($order->status == $status->value)>
                                            {{$status->name}}
                                        </option>
                                    @endforeach
                            </select>
                        </div>
                        @error('status')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                    </div>
                
                    <div class="mt-6 p-3">
                        <button type="submit" class="px-4 py-2 bg-indigo-500 hover:bg-indigo-700 rounded-lg text-white">
                            Update
                        </button>
                    </div>
                </form>
                </div>
        </div>
        </div>
    </div>
</x-admin-layout>

















