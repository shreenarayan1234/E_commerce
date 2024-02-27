<?php
    use App\Http\Controllers\ProductController;
    $total = 0;
    if(Session::has('user'))
    {
        $total = ProductController::cartItem();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Everest Watch Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here */
        /* .navbar {
            background-color: #257ab3; /* Set background color */
        } */

        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff; /* Set text color */
        }

        .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: #2c3e50; /* Set text color on hover */
        }

        .navbar-toggler-icon {
            background-color: #ffffff; /* Set color of the navbar toggler icon */
        }

        .navbar-nav .nav-item.active, .navbar-nav .nav-item:hover {
            background-color: gray; /* Set background color for active/hover state */
        }

        .form-control {
            background-color: #ffffff; /* Set background color for the search bar */
            color: #2c3e50; /* Set text color for the search bar */
        }

        .btn-outline-success {
            color: #ffffff; /* Set text color for the search button */
            border-color: #ffffff; /* Set border color for the search button */
        }

        .btn-outline-success:hover {
            background-color: #2ecc71; /* Set background color for the search button on hover */
            color: #ffffff; /* Set text color for the search button on hover */
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
    <h1><a class="navbar-brand" href="/"><strong>EVEREST WATCH</strong></a></h1>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" href="/">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/ourwatch">OUR WATCHES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/upcomming">UPCOMMING</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link text-light" href="/aboutus">ABOUT US</a>
                </li>
                <li class="nav-item text-light">
                    <a class="nav-link text-light" href="/myorders">ORDERS</a>
                </li>
            </ul>
            <form action="{{url('/')}}/search" class="d-flex ms-auto">
                <input class="form-control me-2 search-box" name="query" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-2">
                <li class="nav-item">
                    <a class="nav-link text-light" href="/cartlist">
                     Cart({{$total}})
                    </a>
                </li>
                @if (Session::has('user'))
                    <li class="nav-item dropdown mt-2">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ Session::get('user')['user_name'] }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a class="nav-link" href="/login"><strong>Login</strong></a></li>
                    <li class="nav-item"><a class="nav-link" href="/register"><strong>Register</strong></a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
