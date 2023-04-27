<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Create</title>
</head>
<body>
    <div class="container">
        <form action="/item/admin/store" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="font-weight-bold">Category</label>
                <input type="text" class="form-control" name="category" value="{{ old('category') }}">
                @error('category')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Name</label>
                <input type="text" class="form-control" name="product_name" value="{{ old('product_name') }}">
                @error('product_name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Price</label>
                <input type="number" class="form-control" name="price" value="{{ old('price') }}">
                @error('price')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label class="font-weight-bold">Amount</label>
                <input type="number" class="form-control" name="amount" value="{{ old('amount') }}">
                @error('amount')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group" style="margin-bottom: 1%">
                <label class="font-weight-bold">Image</label>
                <input type="file" class="form-control" name="image" value="{{ old('image') }}">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Save</button>
            <a href="/item" class="btn btn-secondary">Back</a>
        </form>
    </div>
</body>
</html>