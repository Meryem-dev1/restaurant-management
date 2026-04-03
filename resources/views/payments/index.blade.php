@extends('layouts.app')

@section('content')

<div class="container">
    <form id="add_sale" action="{{route("orders.store")}}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-groupe">
                            <a href="{{route('admin.welcome')}}" class="btn btn-outline-secondary">
                                <i class="fa fa-chevron-left"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="my-2 col-md-3">
                        <h3 class="text-muted border-bottom">
                            {{Carbon\Carbon::now()}}
                        </h3>
                    </div>
                </div>
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <div class="form-groupe">
                            <a href="{{route("orders.index")}}" class="btn btn-outline-secondary float-right">
                                All the order
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            @foreach ($tables as $table)
                                <div class="col-md-3">
                                    <div class="card p-2 mb-2 d-flex
                                                flex-column justify-content-center
                                                align-items-center
                                                list-group-item-action">
                                            <div class="align-self-end">
                                            <input type="checkbox" name="table_id[]" id="table" value="{{$table->id}}">
                                            </div>
                                            <i class="fa fa-chair fa-5x"></i>
                                            <span class="mt-2 text-muted font-weight-bold">
                                                {{$table->name}}
                                            </span>
                                            <div class="d-flex
                                                flex-column justify-content-between
                                                    align-items-center">
                                                <a href="{{route('tables.edit',$table->id)}}" class="btn btn-sm btn-warning ">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                            </div>
                                            @error('table_id')
                                            <div class="text-sm text-red-400">{{ $message }}</div>
                                            @enderror
                                            <hr>
                                               @foreach ($table->orders as $order)
                                                    @if ($order->created_at >= Carbon\Carbon::today())
                                                        <div style="border : dashed pink" class="mb-2 mt-2 shadow w-100" id="{{ $order->id }}">
                                                            <div class="card">
                                                                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                                                    @foreach ($order->menus()->where("order_id", $order->id)->get() as $menu)
                                                                        <h2 style="font-weight: bold; font-size: 17px;" class=" mt-2">
                                                                            {{ $menu->name }}
                                                                        </h2>
                                                                        <p class="text-muted mt-2">
                                                                            {{ $menu->price }} DH
                                                                        </p>
                                                                    @endforeach

                                                                    <p class="bg-danger text-light mt-3">
                                                                        <span class="">
                                                                            Server : {{ $order->server->name }}
                                                                        </span>
                                                                    </p>
                                                                    <p class=" text-muted mt-3">
                                                                        <span >
                                                                            Price : {{ $order->total_price }} DH
                                                                        </span>
                                                                    </p>
                                                                    <p class="font-weight-bold mt-3">
                                                                        <span class="">
                                                                            Payment type : {{ $order->payment_type === "cash" ? "Espéce" : "Carte bancaire" }}
                                                                        </span>
                                                                    </p>
                                                                    <p class="font-weight-bold mt-4">
                                                                        <span class="">
                                                                            Payment Status : {{ $order->payment_status === "paid" ? "Payé" : "Impayé" }}
                                                                        </span>
                                                                    </p>
                                                                    <hr>
                                                                    <div class="d-flex flex-column justify-content-center align-items-center">
                                                                        <p style="font-weight: bold;font-size: 16px;" class=" mt-5">
                                                                            Restaurant Feliciano
                                                                        </p>
                                                                        <p class="mt-2">Rue Wassil Ben Atiya</p>
                                                                        <p class=" text-muted mt-2">+ 1235 2355 98</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="mt-2 d-flex justify-content-center">
                                                            <a href="{{ route("orders.edit", $order->id) }}" class="btn btn-sm btn-warning mr-1">
                                                                <i class="fa fa-edit"></i>
                                                            </a>
                                                            <a href="#" target="_blank" class="btn btn-sm btn-primary" onclick="print({{ $order->id }})">
                                                                <i class="fas fa-print"></i>
                                                            </a>
                                                        </div>
                                                    @endif
                                                @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="row justify-content-center mt-2">
        <div class="col-md-12 card p-3">
            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                @foreach ($categories as $category)
                <li class="nav-item">
                   <a class="nav-link mr-1 {{ $loop->first ? 'active' : '' }}"
                        data-toggle="pill" href="#category-{{ $category->id }}"
                        role="tab" aria-controls="category-{{ $category->id }}"
                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">
                            {{ $category->name }}
                   </a>
                </li>
                @endforeach
            </ul>
            <div class="tab-content" id="pills-tabcontent">
                @foreach ($categories as $category)
<div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
     id="category-{{ $category->id }}" role="tabpanel"
     aria-labelledby="category-{{ $category->id }}-tab">
    <div class="row">
        @foreach ($category->menus as $menu)
        <div class="col-md-4 mb-3">
            <div class="card h-100">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <div class="align-self-end">
                        <input type="checkbox" name="menu_id[]" id="menu_id" value="{{$menu->id}}" data-price="{{$menu->price}}" onchange="calculateTotalPrice()">
                    </div>
                    <img src="{{Storage::url($menu->image)}}" class="img-fluid rounded-circle" width="100" height="100">
                    <h5 class="font-weight-bold mt-2">{{$menu->name}}</h5>
                    <h5 class="text-muted">{{$menu->price}} DH</h5>

                    {{-- <div class="quantity d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-outline-secondary btn-sm"  onclick="changeQuantity('decrease', {{$menu->id}}, {{$menu->price}})">-</button>&nbsp;&nbsp;
                        <input type="text" name="menu_quantity[{{$menu->id}}]" id="menu_quantity_{{$menu->id}}" value="1" min="1" class="form-control quantity-input text-center" data-price="{{$menu->price}}" oninput="calculateTotalPrice()"  readonly>
                        <button type="button" class="btn btn-outline-secondary btn-sm" style="order: 2;" onclick="changeQuantity('increase', {{$menu->id}}, {{$menu->price}})">+</button>&nbsp;&nbsp;
                    </div> --}}

                    <div class="quantity d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-outline-secondary btn-sm" onclick="changeQuantity('decrease', {{$menu->id}}, {{$menu->price}})">-</button>&nbsp;&nbsp;
                        <input type="hidden" name="menu_quantity[{{$menu->id}}]" id="menu_quantity_{{$menu->id}}" value="1" min="1" class="form-control quantity-input text-center" data-price="{{$menu->price}}" oninput="calculateTotalPrice()" readonly>
                        <span id="quantity_display_{{$menu->id}}">1</span>&nbsp;&nbsp;
                        <button type="button" class="btn btn-outline-secondary btn-sm" style="order: 2;" onclick="changeQuantity('increase', {{$menu->id}}, {{$menu->price}})">+</button>&nbsp;&nbsp;
                    </div>


                </div>
            </div>
        </div>
        @endforeach
    </div>
    @error('menu_id')
    <div class="text-sm text-red-400">{{ $message }}</div>
    @enderror
</div>
@endforeach

                <div class="row mb-3">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group mb-3">
                            <select name="server_id" class="form-control">
                                <option value="" selected disabled>server</option>
                                @foreach ($servants as $servant)
                                <option value="{{ $servant->id }}">{{ $servant->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        @error('server_id')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror

                       <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <div class="input-group-text">Total price</div>
                            </div>
                            <input type="number" name="total_price" class="form-control" placeholder="total price" id="total_price" readonly>
                        </div>
                         @error('total_price')
                        <div class="text-sm text-red-400">{{ $message }}</div>
                        @enderror
                        <div class="form-group mb-3">
                            <select name="payment_type" class="form-control">
                                <option value="" selected disabled>Payment type</option>
                                <option value="cash">species</option>
                                <option value="card">bank card</option>
                            </select>
                        </div>
                        @error("payment_type")
                        <div class="text-sm text-red-400">{{$message}}</div>
                        @enderror
                        <div class="form-group mb-3">
                            <select name="payment_status" class="form-control">
                                <option value="">Payment status</option>
                                <option value="paid">Paid</option>
                                <option value="unpaid">Unpaid</option>
                            </select>
                        </div>
                        @error('payment_status')
                        <div class="text-sm text-red-400">{{$message}}</div>
                        @enderror
                        <div class="form-group">
                            <button type="submit"
                                class="btn btn-primary">

                                validate
                            </button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection
@section("javascript")
<script>


// function changeQuantity(action, menuId, price) {
//     const quantityInput = document.getElementById('menu_quantity_' + menuId);
//     let quantity = parseInt(quantityInput.value);

//     if (action === 'increase') {
//         quantity += 1;
//     } else if (action === 'decrease' && quantity > 1) {
//         quantity -= 1;
//     }

//     quantityInput.value = quantity;
//     calculateTotalPrice();
// }

function changeQuantity(action, menuId, price) {
    const quantityInput = document.getElementById('menu_quantity_' + menuId);
    const quantityDisplay = document.getElementById('quantity_display_' + menuId);
    let quantity = parseInt(quantityInput.value);

    if (action === 'increase') {
        quantity += 1;
    } else if (action === 'decrease' && quantity > 1) {
        quantity -= 1;
    }

    quantityInput.value = quantity;
    quantityDisplay.textContent = quantity;
    calculateTotalPrice();
}
function calculateTotalPrice() {
    let totalPrice = 0;

    document.querySelectorAll('input[name="menu_id[]"]:checked').forEach(function(menuCheckbox) {
        const menuId = menuCheckbox.value;
        const quantity = document.getElementById('menu_quantity_' + menuId).value;
        const price = menuCheckbox.getAttribute('data-price');

        totalPrice += parseFloat(price) * parseFloat(quantity);
    });

    document.getElementById('total_price').value = totalPrice.toFixed(2);
}

function print(el){
    const page = document.body.innerHTML;
    const content = document.getElementById(el).innerHTML;
    document.body.innerHTML = content;
    window.print();
    document.body.innerHTML = page;
}
</script>
@endsection
