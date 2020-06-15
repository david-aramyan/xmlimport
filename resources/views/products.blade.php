<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

</head>
<body>
<div class="flex-center position-ref full-height">
    {{ $products->links() }}
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>название</th>
                <th>код</th>
                <th>вес</th>
                <th>количество 0</th>
                <th>цена 0</th>
                <th>количество 1</th>
                <th>цена 1</th>
                <th>количество 2</th>
                <th>цена 2</th>
                <th>количество 3</th>
                <th>цена 3</th>
                <th>количество 4</th>
                <th>цена 4</th>
                <th>количество 5</th>
                <th>цена 5</th>
                <th>количество 6</th>
                <th>цена 6</th>
                <th>количество 7</th>
                <th>цена 7</th>
                <th>взаимозаменяемости</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->weight }}</td>
                    <td>{{ $product->quantity_0 }}</td>
                    <td>{{ $product->price_0 }}</td>
                    <td>{{ $product->quantity_1 }}</td>
                    <td>{{ $product->price_1 }}</td>
                    <td>{{ $product->quantity_2 }}</td>
                    <td>{{ $product->price_2 }}</td>
                    <td>{{ $product->quantity_3 }}</td>
                    <td>{{ $product->price_3 }}</td>
                    <td>{{ $product->quantity_4 }}</td>
                    <td>{{ $product->price_4 }}</td>
                    <td>{{ $product->quantity_5 }}</td>
                    <td>{{ $product->price_5 }}</td>
                    <td>{{ $product->quantity_6 }}</td>
                    <td>{{ $product->price_6 }}</td>
                    <td>{{ $product->quantity_7 }}</td>
                    <td>{{ $product->price_7 }}</td>
                    <td>{{ $product->usage }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>
</body>
</html>
