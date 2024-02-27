<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EverestWatch Dashboard</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }
    #sidebarMenu {
        position: fixed;
        top: 0;
        left: 0;
        height: 100%;
        width: 250px;
        background-color: #343a40;
        color: #fff;
        transition: all 0.3s;
    }
    #sidebarMenu .nav-link {
        color: #fff;
        padding: 10px 20px;
    }
    #sidebarMenu .nav-link:hover {
        background-color: #495057;
    }
    #sidebarMenu .brand {
        font-size: 1.5rem;
        color: #fff;
        text-align: center;
        padding: 20px 0;
        background-color: #343a40;
    }
    main {
        margin-left: 250px;
        padding: 20px;
    }
    main h1 {
        color: #343a40;
    }
    .border-bottom {
        border-bottom: 1px solid rgba(0,0,0,.1);
    }
</style>
</head>
<body>

<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block sidebar">
    <div class="brand">EverestWatch</div>
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Users</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Products</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Orders</a>
            </li>
        </ul>
    </div>
</nav>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
    </div>

    <!-- Content goes here -->

</main>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
