<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navigation Bar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <style>
    section{
      padding: 60px 0;
    }
  </style>
</head>
<body>

  <!-- navbar -->
  <nav class="navbar navbar-expand-md navbar-light pt-1 pb-1 bg-info">
    <div class="container-xxl">
      <!-- navbar brand / title -->
      <a class="navbar-brand" href="#intro">
        <span class="text-secondary fw-bold text-dark" href="uHomepage.html">
          MeoWoof
        </span>
        
        <span>
            <img src="MeoWoof.png" alt="Logos" style="width:10%" margin="0%">
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
            <a class="nav-link" href="uAdoptPage.html">Pet Adoption</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="uMissingB.html">Missing Board</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="uCustService.html">Support</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="uAboutUs.html">About Us</a>
          </li>
          <li class="nav-item ms-2  d-md-inline">
            <a class="btn btn-secondary" href="#">Profile</a>
            <!-- Perlu  buat popup jak sini utk login/logout-->
          </li>
          
        </ul>
      </div>
    </div>
  </nav><!-- navbar -->
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
                    <a class="nav-link" href="uAdoptPage.html">Pet Adoption</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uMissingB.html">Missing Board</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uCustService.html">Support</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="uAboutUs.html">About Us</a>
                </li>
                <li class="nav-item">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle border-0" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          Profile <!--Ni nnti tukar username user-->
                        </a>
                      
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="background-color: rgba(13, 202, 240, 0.854);">
                            <li><a class="dropdown-item" href="EditProfile.html">Edit Profile</a></li>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>