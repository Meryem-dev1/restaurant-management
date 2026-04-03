@extends('layouts.app')

@section('content')

<div class="container text-center mt-4">

    <div class="row">
        <div class="my-2 col-md-2 mb-4">
            <h3 class="text-muted border-bottom">
                {{ \Carbon\Carbon::now() }}
            </h3>
        </div>
    </div>
    <table class="table table-bordered">
        <thead class="text-center">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Menu</th>
                <th scope="col">Quantity</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @foreach($orders as $order)
                @if ($order->created_at >= \Carbon\Carbon::today())
                    <tr>
                        <th scope="row">{{ $order->id }}</th>
                        <td>
                            <!-- Utilisez la relation 'menu' pour accéder aux menus de la commande via la table pivot menu_order -->
                            @foreach($order->menu as $menu)
                                {{ $menu->name }},
                            @endforeach
                        </td>
                        <td>{{ $order->quantity }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
</div>
@endsection
