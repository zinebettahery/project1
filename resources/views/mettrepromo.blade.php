@extends('layouts.admin')

@section('content')
<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Image</th>
        <th>Name</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($products as $product)
    <tr>
        <td>{{ ++$i }}</td>
        <td><img src="/image/{{ $product->image }}" width="100px"></td>
        <td>{{ $product->name }}</td>
        <td>
            <div>
                <?php if (!$product->promo): ?>
                    <form class="form-promo" action="{{ route('product.promotion', $product->id) }}" method="POST">
                        @csrf
                        <input type="text" name="duree" placeholder="duree">
                        <input type="number" name="prixPromo" placeholder="Prix promotionnel">
                        <button type="submit" class="btn-promo">Mettre en promotion</button>
                    </form>
                <?php else: ?>
                    <span class="promo-label">En promotion</span>
                <?php endif; ?>
            </div>
        </td>
    </tr>
    @endforeach
</table>

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th,
    .table td {
        border: 1px solid #ddd;
        padding: 8px;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table img {
        max-width: 100px;
    }

    .form-promo {
        display: inline-block;
    }

    .form-promo input[type="number"] {
        padding: 6px;
        margin-right: 10px;
    }

    .btn-promo {
        padding: 6px 12px;
        background-color: #007bff;
        color: #fff;
        border: none;
        cursor: pointer;
    }

    .promo-label {
        display: inline-block;
        padding: 6px 12px;
        background-color: #28a745;
        color: #fff;
    }

</style>


@endsection




