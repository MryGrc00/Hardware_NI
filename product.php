<?php include('add_products.php');?>
<?php include('delete_product.php');?>
<?php include('edit_product.php');?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>AvengerSquad_HardwareNI</title>
        <link rel="stylesheet" href="~/lib/bootstrap/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="~/AvengerSquad_HardwareNI.styles.css" asp-append-version="true" />
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/album/">
        <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="css/carousel.css">
        <link rel="stylesheet" href="seller_product.css">

        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="stylesheet" href="css/site.css">

    </head>
    <style>
        rect {
            float: center;
        }
        .bc {
            background-color: #F09E00;
            border: 0px;
        }
    </style>
    <body style="padding-top: 0px;">
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="home.html">Hardware N.I.</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                            <a href="home.html" class="nav-link active" style="padding-left: 50px;padding-right: 50px;">
                                <i class="fa-sharp fa-solid fa-house fa-sm" style="color: #000000;">&nbsp&nbsp</i>Home</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 50px;padding-right: 50px;">
                                    <i class="fa-sharp fa-solid fa-cart-shopping" style="color: #000000;">&nbsp&nbsp</i>Cart
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="product_cart.html" class="dropdown-item">Products</a></li>
                                    <li><a href="service_cart.html"class="dropdown-item">Services</a></li>
                                </ul>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 50px;padding-right: 50px;">
                                    Categories
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a href="product.html" class="dropdown-item">Products</a></li>
                                    <li><a href="service.html"class="dropdown-item">Services</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="float: right;">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit"><i class="fa-sharp fa-solid fa-magnifying-glass fa-sm" style="color: #000000;"></i></button>
                            </form> 
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="padding-left: 50px;padding-right: 50px;">
                                    <i class="fa-sharp fa-solid fa-ellipsis-vertical" style="color: #000000;"></i>
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="dashboard_order_product.html">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="seller_product.html">Shop</a></li>
                                    <li><a class="dropdown-item" href="index.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="container-fluid" style="margin: 0px; padding: 0px;">
            <main>
                <div class="album py-5 bg-light text-left">
                    <div class="container ">
                        <h4 class="me-3 mb-0 pb-1">PRODUCTS&nbsp&nbsp&nbsp</h4>                       
                        <hr class="" style="width:100%;">
                        <div class="row">
                            <!-- start of column -->
                            <?php foreach ($products as $product): ?>       
                                <div class="col-sm-2">  
                                    <div class="card mb-4 box-shadow">
                                        <a href="product_detail.html" style="text-decoration: none;">
                                        <img src="images/<?php echo $product['p_image']; ?>" alt="product name" height="150" width="133" class="bd-placeholder-img square m-3 mb-0">
                                        </a>
                                        <div class="card-body">               
                                            <p class="card-text mb-0"><?php echo $product['p_name']; ?></p>
                                            <small class="text-muted"><?php echo "₱ " .$product['p_price']; ?></small><br>
                                            <div class="d-flex" style="text-align:center;">
                                                <div class="btn-group mb-0 ms-0" >
                                                    <a href="product_cart.html">View Details</i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            

                        </div>
                    </div>
                </div>        
            </main>
        </div>
        <footer class="border-top footer text-muted">
            <div class="container">
                &copy; 2023 - AvengerSquad_HardwareNI - <a asp-area="" asp-page="/Privacy">Privacy</a>
            </div>
        </footer>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.bundle.min.js"></script>
        <script src="js/site.js" asp-append-version="true"></script>
        <script src="https://kit.fontawesome.com/b931b08b2b.js" crossorigin="anonymous"></script>
    </body>    
</html>    