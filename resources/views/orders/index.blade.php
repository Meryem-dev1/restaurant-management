
@extends('layouts.app')


@section("content")
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-3">
                <div class="form-groupe">
                    <a href="{{route('payments.index')}}" class="btn btn-outline-secondary">
                        <i class="fa fa-chevron-left"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-credit-card"></i> orders
                                    </h3>
                                    <a href="{{route('payments.index')}}" class="btn btn-primary">
                                        <i class="fas fa-plus fa-x2"></i>
                                    </a>
                                </div>

                                <table class="table table-hover table-responsive-sm">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Menus</th>
                                            <th>Tables</th>
                                            <th>Server</th>
                                            <th>Total</th>
                                            <th>Mode of payment</th>
                                            <th>Payment status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($orders as $order)
                                            <tr>
                                                <td>
                                                    {{ $order->id }}
                                                </td>
                                                <td>
                                                    @foreach($order->menus()->where("order_id",$order->id)->get() as $menu)
                                                        <div class="col-md-4 mb-2">
                                                            <div class="h-100">
                                                                <div class="d-flex
                                                                flex-column justify-content-center
                                                                align-items-center">
                                                                    <img
                                                                    src="{{Storage::url($menu->image)}}" alt="{{ $menu->name}}"
                                                                        class="img-fluid "
                                                                        width="50"
                                                                        height="50"
                                                                    >
                                                                    <h5 class="font-weight-bold mt-2">
                                                                        {{ $menu->name }}
                                                                    </h5>
                                                                    <h5 class="text-muted">
                                                                        {{ $menu->price }} DH
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>
                                                <td>
                                                    @foreach($order->tables()->where("order_id",$order->id)->get() as $table)
                                                        <div class="col-md-4 mb-2">
                                                            <div class="h-100">
                                                                <div class="d-flex
                                                                flex-column justify-content-center
                                                                align-items-center">
                                                                    <i class="fa fa-chair fa-3x"></i>
                                                                    <h5 class="text-muted mt-2">
                                                                        {{ $table->name }}
                                                                    </h5>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </td>

                                                <td>

                                                    {{ $order->server->name }}
                                                </td>

                                                <td>
                                                    {{ $order->total_price}}
                                                </td>
                                                <td>
                                                    {{ $order->payment_type === "cash" ? "Espéce" : "Carte bancaire"}}
                                                </td>
                                                <td>
                                                    {{ $order->payment_status === "paid" ? "Payé" : "Impayé"}}
                                                </td>
                                                <td class="d-flex flex-row justify-content-center align-items-center">
                                                    <a href="{{ route("orders.edit",$order->id) }}" class="btn btn-warning mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <form id="{{ $order->id }}" action="{{ route("orders.destroy",$order->id) }}" method="post">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button
                                                            onclick="
                                                                event.preventDefault();
                                                                if(confirm('Voulez vous supprimer la vente {{ $order->id }} ?'))
                                                                document.getElementById({{ $order->id }}).submit()
                                                            "
                                                            class="btn btn-danger">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="my-3 d-flex justify-content-center align-items-center">
                                    {{ $orders->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
