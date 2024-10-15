<?php
require_once('connectbdd.php');
$requete = "SELECT * from categorie";
$result2 = mysqli_query($con,$requete);

$requeteNom = "SELECT * from categorie";
$resultNOM = mysqli_query($con,$requete);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleSide.css">    
    <link rel="stylesheet" href="font/css/all.css">
    <title>Admin Login </title>
      <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="https://mdbootstrap.com/previews/templates/admin-dashboard/css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="https://mdbootstrap.com/previews/templates/admin-dashboard/css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    
    <style>
    .w-100 {
    width: 250px;
}
    .block{
  display: block;
  width: 100%;
  border: none;

    margin: 15px 47px;
    padding: 7px 49px;
  font-size: 16px;
  cursor: pointer;
  text-align: center;
}
        body{
            padding:0;
            margin:0 0;
        }

        a{
            text-decoration: none;
            color:black;
        }
        button{
          padding: 5px 5px;
        }
        a:hover{
            
            text-decoration: none;
            color: black;
        }
        /*.container{
          padding-left:13.75rem;
        }
        .col{
          padding: 6px;
          border:2px solid black;
        }
        .table{
          width: 1410px;
          margin-left:280px;
        }*/
        .sizeimage{
          width: 70px;
          height:70px;
        }
        /*.i{
          size: 5px;
          padding-right: 5px;
        }*/
    </style>

</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-2 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3 text-center" href="profile.php" style="font-size: 24px;font-family:Gill Sans, sans-serif;">SellingAll</a>

  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <ul class="navbar-nav px-3" style="    margin-left: 960px;">
    <li class="nav-item text-nowrap">
        <?php

        ?>
          <li style="color:gray;"><?php echo $_SESSION['emailadmin']?></li><!-- <i class="fas fa-sign-out-alt pr-5"></i> -->
    </li>
  </ul>
  <ul class="navbar-nav px-3">
    <li class="nav-item text-nowrap">
      <button name="deconnecterbtn" class="btn btn btn-light">
          <a href="logout.php">Logout</a><!-- <i class="fas fa-sign-out-alt pr-5"></i> -->
      </button>
    </li>
  </ul>
</header>


    <!--   *********************************  page  *************************************** -->

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          
         <!---- profile --->
         <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>PROFILE</span>
          </h1>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="profile.php">
              <span data-feather="home"></span><i class="fas fa-user-circle px-3"></i>Mon profile
            </a>
          </li>
          <!-- les clients & les inscrits -->
          <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>CUSTOMURS</span>
          </h1>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="inscrits.php">
              <span data-feather="home"></span><i class="fas fa-user-cog px-3"></i>les inscrits
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="clients.php">
              <span data-feather="home"></span><i class="fas fa-user-check px-3"></i>les clients
            </a>
          </li>
          <!-- les produits -->
          <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>PRODUCTS</span>
          </h1>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Allproducts.php">
              <span data-feather="home"></span><i class="fas fa-product-hunt"></i>All products
            </a>
          </li>
          <!---- orders --->
         <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>ORDERS</span>
          </h1>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="Allorders.php">
              <span data-feather="home"></span><i class="fas fa-shopping-cart px-3"></i>All orders
            </a>
          </li>
          <h1 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
            <span>Catégories</span>
          </h1>

          <?php
              while($row2=mysqli_fetch_assoc($result2))
              {
                  $cat = $row2['NomCat'];
                  $idcat=$row2['idCat'];
          ?>

          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="categorieProduct.php?idCat=<?php echo $idcat;?>">
              <span data-feather="home"></span><?php echo $cat; ?>
            </a>
          </li>
          <?php 
              }
          ?>  
          
         </ul>

       </div>
     </nav>

   
