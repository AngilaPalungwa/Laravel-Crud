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
                        <h1>Product Form</h1>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    {{-- @foreach ($errors->any() as error )
                                        <li>{{ $errors }}</li>
                                    @endforeach --}}
                                </ul>
                            </div>

                        @endif
                        <form action="/form" method="post">
                            @csrf
                            <div class="mb-3">
                              <label for="exampleInputName1" class="form-label">Name</label>
                              <input type="name" name="name" class="form-control" id="exampleInputname1" value="{{ old("name") }}" >
                            </div>

                            <div class="mb-3">
                              <label for="exampleInputCategory1"  class="form-label">Category</label>
                              <input type="category" name="category" class="form-control" id="exampleInputPassword1" value="{{ old("category") }}">
                            </div>
                            <div class="mb-3">
                              <label for="exampleInputPassword1" class="form-label">Price</label>
                              <input type="price" name="price" class="form-control" id="exampleInputaddress1" value="{{ old("price") }}">
                            </div>
                            <div class="mb-3 form-check">
                              <input type="checkbox" class="form-check-input" id="exampleCheck1">
                              <label class="form-check-label" for="exampleCheck1">Status</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
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
