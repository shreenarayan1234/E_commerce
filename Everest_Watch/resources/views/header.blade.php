<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Everest Watch Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Add custom styles here */
        .navbar {
            background-color: #3498db; /* Set background color */
        }

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
            background-color: #2980b9; /* Set background color for active/hover state */
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

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">EVEREST WATCH</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" href="#">HOME</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FOR MEN</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">FOR LADIES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">UPCOMMING</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">ABOUT US</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">CONTACT</a>
                </li>
            </ul>
            <form class="d-flex ms-auto">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <ul class="navbar-nav ms-2">
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="bi bi-cart"></i> Cart
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>

</body>
</html>
