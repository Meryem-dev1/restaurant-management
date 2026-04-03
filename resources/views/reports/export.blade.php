<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Menus</th>
            <th>Tables</th>
            <th>Sérveur</th>
            <th>Quantity</th>
            <th>Total</th>
            <th>Mode of payment</th>
            <th>Payment status</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sales as $sale)
            <tr>
                <td>
                    {{ $sale->id }}
                </td>
                <td>
                    @foreach($sale->menus()->where("order_id",$sale->id)->get() as $menu)
                        <h5>
                            {{ $menu->name }}
                        </h5>
                        <h5>
                            {{ $menu->price }} DH
                        </h5>
                    @endforeach
                </td>
                <td>
                    @foreach($sale->tables()->where("order_id",$sale->id)->get() as $table)
                        <h5>
                            {{ $table->name }}
                        </h5>
                    @endforeach
                </td>
                <td>
                    {{ $sale->server_id}}
                </td>
                <td>
                    {{ $sale->quantity}}
                </td>
                <td>
                    {{ $sale->total_price}}
                </td>
                <td>
                    {{ $sale->payment_type === "cash" ? "Espéce" : "Carte bancaire"}}
                </td>
                <td>
                    {{ $sale->payment_status === "paid" ? "Payé" : "Impayé"}}
                </td>
            </tr>
        @endforeach
        <tr>
            <td colspan="5">
                Rapport de {{ $from }} à {{ $to }}
            </td>
            <td>
                {{ $total }} dh
            </td>
        </tr>
    </tbody>
</table>
