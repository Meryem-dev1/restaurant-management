@extends('layouts.app')

@section("content")
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="{{ route("admin.welcome") }}" class="btn btn-outline-secondary mb-2">
                    <i class="fa fa-chevron-left fa-x2"></i>
                </a>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="d-flex flex-row justify-content-between align-items-center border-bottom pb-1">
                                    <h3 class="text-secondary">
                                        <i class="fas fa-bars"></i> Reports
                                    </h3>

                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-3 shadow mx-auto p-2">
                                                <form action="{{ route("reports.generate") }}" method="post">
                                                    @csrf
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">From</div>
                                                        </div>
                                                        <input type="date" name="from" class="form-control">

                                                    </div>

                                                    @error('from')
                                                    <div class="text-sm text-red-400">{{$message}}</div>
                                                    @enderror
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <div class="input-group-text">To</div>
                                                        </div>
                                                        <input type="date" name="to" class="form-control" >

                                                    </div>

                                                    @error('to')
                                                    <div class="text-sm text-red-400">{{$message}}</div>
                                                    @enderror
                                                    <div class="form-group">
                                                        <button class="btn btn-primary">
                                                            View report
                                                        </button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @isset($total)
                                    <h4 class="text-primary mt-4 mb-2 font-weight-bold">
                                        Report of {{ $startDate  }} à {{ $endDate }}
                                    </h4>
                                    <table class="table table-hover table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Menus</th>
                                                <th>Tables</th>
                                                <th>Sérveur</th>
                                                <th>Total</th>
                                                <th>Type de paiement</th>
                                                <th>Etat de paiement</th>
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
                                                        {{ $order->server->name}}
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
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <p class="text-success text-center font-weight-bold">
                                        <span class="border border-success p-2">
                                            Total : {{ $total }} DH
                                        </span>
                                    </p>
                                    <form action="{{ route("reports.export") }}" method="post">
                                        @csrf
                                        <div class="form-group">
                                            <input type="hidden" name="from" value="{{ $startDate }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="to" value="{{ $endDate }}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-danger">
                                                Generate the excel report
                                            </button>
                                        </div>
                                    </form>
                                @endisset
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
