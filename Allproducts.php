<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }

require_once('connectbdd.php');

$s = "select * from categorie ";
$result1=mysqli_query($con,$s);
$result2=mysqli_query($con,$s);

require_once('header.php');
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

    <section class="text-center container">
        <div class="row py-lg-4">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light mt-0 my-0"><b>SellingAll Products</b></h1>
                <p class="lead text-muted">Voici ici tous les produits disposant le magasin</p>
                <p>
                    <button class="btn btn-secondary my-2" type="button" class="btn btn-dark" data-bs-toggle="modal"
                        data-bs-target="#mymodalADDP"><a><i class="fas fa-plus"> Add product</i></a></button>
                    <button class="btn btn-primary my-2" type="button" class="btn btn-dark" data-bs-toggle="modal"
                        data-bs-target="#mymodalADDC"><a><i class="fas fa-plus"> Add categorie</i></a></button>
                </p>
            </div>
        </div>
    </section>

    <!--***********   add product to our database ***********-->

    <div class="modal fade" id="mymodalADDP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center display-5" id="exampleModalLabel">Ajouter un produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="Addproduct.php" enctype="multipart/form-data">
                        <input type="text" name="Nompro" placeholder="Nom du produit" class="form-control my-3"
                            required>
                        <input type="text" name="designationPro" placeholder="Description du produit"
                            class="form-control my-3" required>
                        <select name="categorie" class="browser-default custom-select"
                            aria-label="Default select example">
                            <?php
                    while($row1=mysqli_fetch_assoc($result1))
                    {
                        $NomCat = $row1['NomCat'];
                        $idcat=$row1['idCat'];
                  ?>
                            <option value="<?php echo $idcat;?>"><?php echo $NomCat; ?></option>

                            <?php 
                    }
                  ?>
                        </select>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input type="number" name="Prixpro" placeholder="prix" class="form-control my-3"
                                    required>
                            </div>
                            <div class="col-md-6">
                                <input type="number" name="reductionPro" min="0" max="100000000000"
                                    placeholder="Entrer la réduction" class="form-control my-3" required>
                            </div>
                        </div>

                        <input type="number" name="quantitePro" min="0" max="100000000000"
                            placeholder="Entrer la quantité" class="form-control my-3" required>

                        <input type="file" name="image" placeholder="image du produit" class="form-control my-3"
                            required>
                        <button name="btnclose" class="btn btn-secondary mt-5 ml-5"
                            data-bs-dismiss="modal">Close</button>
                        <button name="btnsave" class="btn btn-success mt-5 ml-5">Add</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ******** fin form add categorie ---------->

    <!--***********   add categorie to our database ***********-->

    <div class="modal fade" id="mymodalADDC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center display-5" id="exampleModalLabel">Add categorie</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <div class="modal-body">
                    <form method="POST" action="addcategorie.php">
                        <input type="text" name="categorie" placeholder="Enter a new categorie"
                            class="form-control my-3" required>
                        <button name="btncloseC" class="btn btn-secondary mt-5 ml-5"
                            data-bs-dismiss="modal">Close</button>
                        <button name="btnsaveC" class="btn btn-success mt-5 ml-5">Add</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <!-- ******** fin form add categorie ---------->
    <!--   table of product ------>
    <?php
      $requetePro = "select * from produit";
      $resultPro=mysqli_query($con,$requetePro);
  ?>

    <div class="table-responsive">
        <table class="table text-center">
            <thead class="blue-grey lighten-4" style="height: 40px;">
                <tr>
                    <td scope="col">ID</td>
                    <td scope="col">Nom</td>
                    <td scope="col">désignation </td>
                    <td scope="col">Prix</td>
                    <td scope="col">Quantité</td>
                    <td scope="col">réduction</td>
                    <td scope="col">catégorie</td>
                    <td colspan="3" scope="col">photos</td>
                    <td colspan="2" scope="col">Actions</td>
                </tr>
            </thead>
            <?php
            while($rowPro=mysqli_fetch_assoc($resultPro))
            {
                $id= $rowPro['idpro'];
                $Nom = $rowPro['Nompro'];
                $design = $rowPro['designationPro'];
                $redu = $rowPro['reductionPro'];
                $prix = $rowPro['Prixpro'];
                $idcat = $rowPro['idCat'];
                $quantite = $rowPro['quantitePro'];

                $requeteCat="select * from categorie where idCat='$idcat'";
                $resultCat=mysqli_query($con,$requeteCat);
                $rowCat=mysqli_fetch_assoc($resultCat);
                $categorie=$rowCat['NomCat'];

                $requeteimage="select * from photo where idproduit='$id'";
                $resultimage=mysqli_query($con,$requeteimage);
                
          ?>
            <tbody>
                <tr>
                    <td scope="col"><b><?php echo $id ;?></b></td>
                    <td style="width: 5%;" scope="col"><?php echo $Nom   ;?></td>
                    <td style="width: 20%;" scope="col"><?php echo $design ;?></td>
                    <td style="width: 10%;" scope="col"><?php echo $prix ;?> DH</td>
                    <td scope="col"><?php echo $quantite ;?></td>
                    <td scope="col"><?php echo $redu ;?> %</td>
                    <td scope="col"><?php echo $categorie ;?></td>

                    <?php
                  $nbr=3;
                  while($rowimage=mysqli_fetch_assoc($resultimage))
                  {
                      $image=$rowimage['Nomphoto'];
                      $nbr--;
                 ?>
                    <td scope="col"><img class="sizeimage" src="<?php echo $image ;?>"></td>
                    <?php   
                  }
                  ?>
                    <?php 
                    while($nbr > 0)
                    {
                ?>
                    <td scope="col"><button class="btn btn-outline-secondary"><a
                                href="changephoto.php?Id=<?php echo $id;?>"><i style="color: #C086EC;"
                                    class="fas fa-plus"></i></a></button></td>
                    <?php
                    $nbr--;
                    }
                ?>
                    <td><button class="btn btn-outline-success"><a href="pageeditproduct.php?Id=<?php echo $id;?>"><i
                                    class="fas fa-edit" style="color:green;"></i></a></button></td>
                    <td><button class="btn btn-outline-danger"><a href="deleteproduct.php?Id=<?php echo $id; ?>"><i
                                    class="fas fa-times-circle" style="color:red;"></i></a></button></td>
                </tr>
            </tbody>
            <?php 
              }
            ?>
        </table>
    </div>

    </div>
</main>


<?php require_once('footer.php');?>