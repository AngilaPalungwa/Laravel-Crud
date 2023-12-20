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
    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('messsage') }}
        </div>
    @endif
    <div class="container-fluid bg-light ">
        <div class="row justify-content-center">
            <div class="col-6 justify-content-center mt-5">
                <div class="card">
                    <div class="card-header">
                        <h1>Products</h1>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">SNo.</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>


                                    @foreach ($products as $product)
                                    <tr>
                                        <th scope="col">{{ $loop->iteration }}</th>

                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category }}</td>
                                        <td>{{ $product->price }}</td>
                                        <td><a href="{{ route('product.edit',$product->id) }}" class="btn btn-success m-2">Edit</a><a href="{{ route('product.delete',$product->id) }}" class="btn btn-danger m-2">Delete</a></td>
                                    </tr>
                                    @endforeach

                            </tbody>
                        </table>
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
