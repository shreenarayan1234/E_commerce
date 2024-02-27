<!doctype html>
<html lang="en">

<head>
    <title>Products Form</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-sm-5 mx-auto border-primary">
                <form action="{{url('/')}}/productsform" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="hidden" class="form-control" name="id" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" placeholder="enter watch name" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Price</label>
                        <input type="number" class="form-control" name="price" placeholder="Rs.xxx" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Gallary (Choose Image)</label>
                        <input type="file" class="form-control" name="image" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Brand</label>
                        <input type="text" class="form-control" name="brand" />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description</label>
                        <textarea class="form-control" name="description" id="" rows="3"></textarea>
                    </div>

                    <button class="btn btn-primary">
                        Submit
                    </button>

                </form>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($products as $image)
        <div class="col-sm-4">
            <img class="img-thumbnail" src="{{asset('storage/images/'.$image->gallery)}}">
        </div>
        @endforeach
    </div>
</body>

</html>