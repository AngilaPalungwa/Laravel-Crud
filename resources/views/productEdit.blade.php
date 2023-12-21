<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container-fluid bg-light ">
        <div class="row justify-content-center">
            <div class="col-6 justify-content-center mt-5">
                <div class="card">
                    <div class="card-header">
                        <h1>Edit Product</h1>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action=" {{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf
                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') ?old('name'):$product->name}}">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Category</label>
                                <input type="text" name="category" class="form-control"
                                    value="{{ old('category')?old('name'):$product->category }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Price</label>
                                <input type="text" name="price" class="form-control" value="{{ old('price')?old('name'):$product->price }}">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="file" class="form-control" value="">
                                @if ($product->file)
                                    <img src="{{ $product->file }}" alt="">
                                @endif
                            </div>
                            <div class="mb-3 mt-4">
                                <label class="form-label">Status</label>
                                <select name ='status'>

                                    <option value='1' {{ old('select') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value='0' {{ old('select') == '0' ? 'selected' : '' }}>Inactive
                                    </option>
                                </select>

                            </div>
                            <button type="submit" class="btn btn-primary" name="submit" value="submit">Submit</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

</html>
