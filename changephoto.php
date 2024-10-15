<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }
    
require_once('connectbdd.php');

$id=$_GET['Id'];
$_SESSION['idpp']=$id;
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Photo</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">    

    <style>

        .container{
            height: 500px;
            width: 900px;
        }
        label{
            font-weight:bold;
        }
        p{
            color: red;
        }

    </style>
</head>
<body>
<div class="container pt-5">
        <div class="card bg-light ">
            <div class="card-title bg-dark text-white" >
                <h3 class="text-center py-3">Edit photo</h3>
            </div>
            <div class="card-body">
            <form id="form" method="POST" action="Addphoto.php" class="row g-3 needs-validation pt-5" enctype="multipart/form-data">

                <div class="col-md-3">
                    <label for="validationCustom01" class="form-label">ID produit</label>
                    <input type="text" name="idp" id="idp" class="form-control" disabled value="<?php echo $id ?>" >
                </div>
                
                <div class="col-md-6">
                    <label for="validationCustom05" class="form-label">photo</label>
                    <input type="file" name="image" id="image" class="form-control"  >
                </div>

                <div class="col-12">
                    <button  name="close" class="btn btn-secondary mt-5 ml-5" data-bs-dismiss="form">Close</button>
                    <button name="btnedit" class="btn btn-primary mt-5 ml-5">Save Changes</button> 
                </div>
            </form>
        </div>
        </div>
    </div>
</body>
</html>   
