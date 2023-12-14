</head>
<body>
    <h2>Facture pour la commande #{{ $order->id }}</h2>

    <p>Cher(e) {{ $order->name }},</p>

    <p>Merci d'avoir passé commande sur notre site. Voici les détails de votre facture :</p>

    <table>
        <thead>
            <tr>
                <th>Produit</th>
                <th>Prix unitaire</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($order->orderItems as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->price }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ $item->price * $item->qty }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Total</td>
                <td>{{ $order->total_price }}</td>
            </tr>
        </tfoot>
    </table>

    <p>Si vous avez des questions ou des préoccupations concernant votre commande, n'hésitez pas à nous contacter.</p>

    <p>Cordialement,<br> Votre équipe {{ config('app.name') }}</p>
</body>
</html>