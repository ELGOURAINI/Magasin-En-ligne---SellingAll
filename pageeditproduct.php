<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }
    
require_once('connectbdd.php');

$id=$_GET['Id'];
$query = "SELECT * from produit where idpro='$id' ";
$result=mysqli_query($con,$query);
    while($rowPro=mysqli_fetch_assoc($result))
    {
        $id= $rowPro['idpro'];
        $Nom = $rowPro['Nompro'];
        $designation = $rowPro['designationPro'];
        $reduction = $rowPro['reductionPro'];
        $prix = $rowPro['Prixpro'];
        $idcat = $rowPro['idCat'];
        $quantite = $rowPro['quantitePro'];
    }

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit Product</title>
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
                <h3 class="text-center py-3">Edit product</h3>
            </div>
            <div class="card-body">
            <form id="form" action="editproduct.php?ID=<?php echo $id?>" method="POST" class="row g-3 needs-validation pt-5" novalidate>

                <div class="col-md-4">
                    <label for="validationCustom01" class="form-label">ID produit</label>
                    <input type="text" class="form-control" disabled value="<?php echo $id ?>" required>
                </div>

                <div class="col-md-4">
                    <label for="validationCustom02" class="form-label">Nom produit</label>
                    <input type="text" class="form-control" name="nom" id="nom" value="<?php echo $Nom ?>" required>
                    <p id="smalnom"></p>
                </div>

                <div class="col-md-4">
                    <label  for="validationCustomUsername" class="form-label">réduction</label>
                    <div class="input-group has-validation">
                        <input type="number" min="0" name="reduction" id="reduction" class="form-control" value="<?php echo $reduction ?>" aria-describedby="inputGroupPrepend" required>
                        <p id="smalreduction"></p>
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="validationCustom03" class="form-label">Désignation</label>
                    <textarea class="form-control"  name="designation" id="designation" required><?php echo $designation ?>
                    </textarea>
                    <p id="smaldesignation"></p>
                </div> 
                
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Prix</label>
                    <input type="number" min="0" class="form-control" id="prix" name="prix" value="<?php echo $prix ?>"  required>
                    <p id="smalprix"></p>
                </div>
                
                <div class="col-md-3">
                    <label for="validationCustom05" class="form-label">Quantité</label>
                    <input type="number" min="0" class="form-control"  name="quantite" id="quantite" value="<?php echo $quantite; ?>"  required>
                    <p id="smalquantite"></p>
                </div>

                <div class="col-12">
                    <button class="btn btn-success" name="btnedit" type="submit">submit</button>
                </div>
                </form>
            </div>
        </div>       
    </div> 
    <!-- <script type="text/javascript" src="validationEditform.js"></script> -->
</body>
</html>   