<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Admin Home Page</title>
</head>
<body>
    <div class="container nt-5">
        <table class="table table-hover">
            <tr>
                <th>Category</th>
                <th>Name</th>
                <th>Price</th>
                <th>Amount</th>
                <th>Image</th>
                <th>Menu</th>
            </tr>
            @foreach ($item as $data)
                <tr>
                    <td>{{$data->category}}</td>
                    <td>{{$data->product_name}}</td>
                    <td>Rp. {{$data->price}}</td>
                    <td>x{{$data->amount}}</td>
                    <td>
                        <img src="{{ asset('/storage/image/'.$data->image) }}" height="150px" width="200px">
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</body>
</html>