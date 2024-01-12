<?php
session_start(); // Start the session

// Check if the user is logged in
if (!isset($_SESSION['login_user'])) {
    // If not logged in, redirect to the login page
    header("Location: LogIn.html");
    exit(); // Stop further execution
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="assets/css/uStyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"><link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha384-5m9RZqCVZkDgbiFFuP2RZPsWgZd92LmC+5V9PU5KcNtC" crossorigin="anonymous">


        <style>
            
        </style>
    </head>
    <body>

        <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light pt-1 pb-1 bg-info">
            <div class="container-xxl">
            <!-- navbar brand / title -->
            <a class="navbar-brand" href="uAdoptPage.html">
                <span class="text-secondary fw-bold text-dark" >
                MeoWoof
                </span>
                
                <span>
                    <img src="assets/image/MeoWoof.png" alt="Logos" style="width:10%" margin="0%">
                </span>

            </a>
            <!-- toggle button for mobile nav -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main-nav" aria-controls="main-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- navbar links -->
            <div class="collapse navbar-collapse justify-content-end align-center" id="main-nav">
                <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="uAdoptPage.php">Pet Adoption</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uMissingB.php">Missing Board</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uCustService.php">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uAboutUs.php">About Us</a>
                </li>
                
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle border-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          Profile <!--Ni nnti tukar username user-->
                        </a>
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: rgba(13, 202, 240, 0.854);">
                            <li><a class="dropdown-item" href="EditProfile.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="#">Missing Pet Application</a></li>
                            <li><a class="dropdown-item" href="#">Log Out</a></li>
                        </ul>
                        
                    </div>
                </li>
                
                </ul>
            </div>
            </div>
        </nav>
        <!--DONE Navigation Bar Part-->
        
        
        
        <div class="SearchBar">
            <div class="d-flex align-items-center">
                <div class="search-container" >
                    <form action="#"><!--Perlu add php sini utk action searching-->
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <button type="submit" style="background-color: rgba(240, 248, 255, 0); border: none;">
                                    <i class="fa fa-fw fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            
                <!-- Favorite Button -->
                <a class="btn btn-outline-primary mr-2" href="#" style="margin: 5px;">
                    <i class="fa fa-heart"></i> Favorite
                </a>
            
                <!-- Cart Button -->
                <a class="btn btn-outline-success"  data-bs-toggle="modal" data-bs-target="#cartPopup">
                    
                    <i class="fa fa-shopping-cart"></i> Cart
                </a>

                <script>
                    function openCartModal() {
                        var myModal = new bootstrap.Modal(document.getElementById('cartPopup'));
                        myModal.show();
                    }
                </script>
            </div>
        </div>
        
        <!--Bahagian Page Content -->
        <div class="container py-5">
            <div class="rowA">
    
                <div class="col-lg-3">
                <h1 class="h2 pb-4">Categories</h1>
                <ul class="list-unstyled templatemo-accordion">
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">Type Of Pet
                        </a>
                        <ul class="collapse show list-unstyled pl-3 active" style="display: block;">
                            <li><a class="text-decoration-none" href="#" style="color: black;font-style: italic;">Cats</a></li>
                            <li><a class="text-decoration-none" href="#" style="color: black;font-style: italic;">Dogs</a></li>
                        </ul>
                    </li>
                    <li class="pb-3">
                        <a class="collapsed d-flex justify-content-between h3 text-decoration-none" href="#">Pet Gender
                        </a>
                        <ul id="collapseTwo" class="collapse list-unstyled pl-3" style="display: block;">
                            <li><a class="text-decoration-none" href="#" style="color: black;font-style: italic;">Male</a></li>
                            <li><a class="text-decoration-none" href="#" style="color: black;font-style: italic;">Female</a></li>
                        </ul>
                    </li>
                    
                </ul>
            </div>
    
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-inline shop-top-menu pb-3 pt-1">
                                <li class="list-inline-item">
                                    <a class="h3 text-dark text-decoration-none mr-3" href="#">All</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="h3 text-dark text-decoration-none mr-3" href="#">Cats</a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="h3 text-dark text-decoration-none" href="#">Dogs</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6 pb-4">
                            <div class="d-flex">
                                <select class="form-control">
                                    <option>Featured</option>
                                    <option>A to Z</option>
                                    <option>Item</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="assets/image/TestImg.png" alt="Logo">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="h3 text-decoration-none">Sarah</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>2 Years Old</li>
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    
                                    <p class="text-center mb-0">$250.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="assets/image/TestImg.png" alt="Logo">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="h3 text-decoration-none">Sarah</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>2 Years Old</li>
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    
                                    <p class="text-center mb-0">$250.00</p>
                                </div>
                            </div>
                        </div><div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="assets/image/TestImg.png" alt="Logo">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="h3 text-decoration-none">Sarah</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>2 Years Old</li>
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    
                                    <p class="text-center mb-0">$250.00</p>
                                </div>
                            </div>
                        </div><div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="assets/image/TestImg.png" alt="Logo">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="h3 text-decoration-none">Sarah</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>2 Years Old</li>
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    
                                    <p class="text-center mb-0">$250.00</p>
                                </div>
                            </div>
                        </div><div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="assets/image/TestImg.png" alt="Logo">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="h3 text-decoration-none">Sarah</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>2 Years Old</li>
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    
                                    <p class="text-center mb-0">$250.00</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card mb-4 product-wap rounded-0">
                                <div class="card rounded-0">
                                    <img class="card-img rounded-0 img-fluid" src="assets/image/TestImg.png" alt="Logo">
                                    <div class="card-img-overlay rounded-0 product-overlay d-flex align-items-center justify-content-center">
                                        <ul class="list-unstyled">
                                        <li><a class="btn btn-success text-white" href="#"><i class="fa fa-heart"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-eye"></i></a></li>
                                        <li><a class="btn btn-success text-white mt-2" href="#"><i class="fa fa-cart-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <a href="#" class="h3 text-decoration-none">Sarah</a>
                                    <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                        <li>2 Years Old</li>
                                        <li class="pt-2">
                                            <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                            <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                        </li>
                                    </ul>
                                    
                                    <p class="text-center mb-0">$250.00</p>
                                </div>
                            </div>
                        </div>
                    <!--Bahagian Page selection -->    
                    <div div="row">
                        <ul class="pagination pagination-lg justify-content-end">
                            <li class="page-item disabled">
                                <a class="page-link active rounded-0 mr-3 shadow-sm border-top-0 border-left-0" href="#" tabindex="-1">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link rounded-0 mr-3 shadow-sm border-top-0 border-left-0 text-dark" href="#">2</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link rounded-0 shadow-sm border-top-0 border-left-0 text-dark" href="#">3</a>
                            </li>
                        </ul>
                    </div>
                </div>
    
            </div>
        </div>
        <!--Done Bahagian Page Content -->
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        
    </body>

    <footer>
        <div class="ufooter">
            <a>Powered by Domus Diversitas</a>
        </div>
    </footer>
</html>