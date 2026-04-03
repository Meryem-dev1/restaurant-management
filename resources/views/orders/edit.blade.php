@extends('layouts.app')

@section("content")
    <div class="container">
        <form id="add-sale" action="{{ route("orders.update",$orders->id) }}" method="post">
            @csrf
            @method("PUT")
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <a href="/payments" class="btn btn-outline-secondary">
                                    <i class="fa fa-chevron-left"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
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
                                                <input type="checkbox" name="table_id[]"
                                                    id="table"
                                                    checked
                                                    value="{{ $table->id }}"
                                                >
                                            </div>
                                            <i class="fa fa-chair fa-5x"></i>
                                            <span class="mt-2 text-muted font-weight-bold">
                                                {{ $table->name }}
                                            </span>
                                            <hr>
                                        </div>
                                    </div>
                                    @error('table_id')
                                    <div class="text-sm text-red-400">{{ $message }}</div>
                                    @enderror
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
                            <a class="nav-link mr-1 {{ $loop->first ? 'active' : '' }}"  data-toggle="pill" href="#category-{{ $category->id }}" role="tab" aria-controls="category-{{ $category->id }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->name }}</a>
                        </li>
                        @endforeach
                    </ul>
                    <div class="tab-content" id="v-pills-tabContent">
                        @foreach ($categories as $category)
                        <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"  id="category-{{ $category->id }}" role="tabpanel" aria-labelledby="category-{{ $category->id }}-tab">
                    <div class="row">
                        @foreach($category->menus as $menu)
                            <div class="col-md-4 mb-2">
                                <div class="card h-100">
                                    <div class="card-body d-flex
                                    flex-column justify-content-center
                                    align-items-center">
                                        <div class="align-self-end">
                                            <input type="checkbox" name="menu_id[]"
                                                id="menu_id"
                                                {{ in_array($menu->id, $orders->menus->pluck('id')->toArray()) ? 'checked' : '' }}
                                                value="{{ $menu->id }}"
                                            >
                                        </div>
                                        <img
                                            src="{{Storage::url($menu->image)}}" alt="{{ $menu->title}}"
                                            class="img-fluid rounded-circle"
                                            width="100"
                                            height="100"
                                        >
                                        <h5 class="font-weight-bold mt-2">
                                            {{ $menu->name }}
                                        </h5>
                                        <h5 class="text-muted">
                                            {{ $menu->price }} DH
                                        </h5>

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
                </div>
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="form-group">
                                <select name="server_id" class="form-control">
                                    <option value="" selected disabled>
                                        Server
                                    </option>
                                    @foreach ($servants as $servant)
                                        <option
                                            {{ $servant->id === $orders->server_id ? "selected" : "" }}
                                            value="{{ $servant->id }}">
                                            {{ $servant->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            @error('server_id')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                            <br>

                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">Total price</div>
                                </div>
                                <input type="number" value="{{$orders->total_price}}"  name="total_price" class="form-control" placeholder="total price" id="total_price" readonly>
                            </div>

                            @error('total_price')
                            <div class="text-sm text-red-400">{{ $message }}</div>
                            @enderror
                            <div class="form-group">
                                <select name="payment_type" class="form-control">
                                    <option value="" selected disabled>
                                        Payment type
                                    </option>
                                    <option value="cash"
                                        {{ $orders->payment_type === "cash" ? "selected" : ""}}
                                        >
                                        species
                                    </option>
                                    <option value="card"
                                    {{ $orders->payment_type === "card" ? "selected" : ""}}
                                    >
                                    bank card
                                    </option>
                                </select>
                            </div>
                            @error("payment_type")
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                            <br>
                            <div class="form-group">
                                <select name="payment_status" class="form-control">
                                    <option value="" selected disabled>
                                        Payment status
                                    </option>
                                    <option value="paid" {{ $orders->payment_status === "paid" ? "selected" : ""}}>
                                        Paid
                                    </option>
                                    <option value="unpaid" {{ $orders->payment_status === "unpaid" ? "selected" : ""}}>
                                        Unpaid
                                    </option>
                                </select>
                            </div>
                            @error('payment_status')
                            <div class="text-sm text-red-400">{{$message}}</div>
                            @enderror
                            <br>
                            <div class="form-group">
                                <button
                                    onclick="event.preventDefault();
                                        document.getElementById("add-sale").submit();
                                    "
                                    class="btn btn-primary"
                                >
                                validate
                                </button>
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
</script>
@endsection
