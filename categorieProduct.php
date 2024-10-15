<?php
session_start();

if(!$_SESSION["emailadmin"])
{
	header("Location:index.php");
}
require_once('connectbdd.php');

if(isset($_GET['idCat']))
{
  $idCat = $_GET['idCat'];
  $query = "select * from produit where idCat='$idCat'";
  $result = mysqli_query($con,$query);
  if(!$result)
  {
    echo"<script language='javascript'>";
    echo "alert('probleme');";
    echo"</script>";
  }
require_once('header.php');
?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">


    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 mb-10 border-bottom">
        <h3>Products</h3>
    </div>
    <div class="album py-5 bg-light">

        <div class="row">

            <?php
          while($row=mysqli_fetch_assoc($result))
          {
            $id = $row['idpro'];
            $Nom=$row['Nompro'];
            $designation = $row['designationPro'];
            $Prix = $row['Prixpro'];
            $reduction = $row['reductionPro'];
            $idcat = $row['idCat'];
            $quantite = $row['quantitePro'];
      
      ?>
            <div class="col-lg-4 col-md-12 mb-4" style="width:400px;">
                <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <?php  
            $query2 = "select * from photo where idproduit='$id'";
            $result2 = mysqli_query($con,$query2);
            if($result)
            {
              $row2=mysqli_fetch_assoc($result2);
              if($row)
              {
                $photo = $row2['Nomphoto'];
               
          ?>
                        <div class="carousel-item active">
                            <img src="<?php echo $photo;?>" class="d-block"
                                style="width: 300px!important;height: 250px!important;">
                        </div>

                        <?php
                
              }
            }
          ?>


                    </div>
                </div>

                <div class="card-body" style="width: fit-content!important;">

                    <?php if($reduction > 0)
                    {
                  ?>
                    <span style="width:80px;height:30px;size:12px;" class="badge badge-success ml-4">sold
                        <?php echo$reduction;?> %</span>

                    <?php
                    }
                    else
                    {
                      ?>

                    <?php

                    }
                    if($quantite == 0)
                    {
                      ?>
                    <span style="width:100px;height:30px;size:12px;"
                        class="badge badge-danger product mb-4 ml-xl-0 ml-4"><i class="fas fa-times-circle"></i> Out of
                        stock</span>



                    <?php
                    }
                    else
                    {
                      ?>
                    <span style="width:100px;height:30px;size:12px;"
                        class="badge badge-primary product mb-4 ml-xl-0 ml-4"><i class="fas fa-check-circle px-1"></i>En
                        stock</span>
                    <?php
                    }

                    
                  ?>

                    <p class="card-text" style="width: 250px;"><b><?php echo $Nom; ?></b></p>
                    <smal class="text-muted py-4" style="width: 250px;"><?php echo $designation; ?></smal>
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1">
                                <?php if($reduction > 0)
                    {
                  ?>
                                <small class="mr-1"><s><?php echo$Prix;?> DH</s></small>
                                <!--                       <span class="badge badge-danger mb-2">sold</span>
 -->
                                <?php
                    } 
                  ?>

                                <strong><?php $all=$Prix;if($reduction > 1){$all = $Prix-$Prix*($reduction/100);}echo$all;?>
                                    DH</strong>
                            </p>
                        </div>
                        <div class="btn-group">
                            <button type="button" class="btn btn-warning btn-rounded px-3"><a
                                    href="pageeditproduct.php?Id=<?php echo $id;?>">Edit</a><i
                                    class="fas fa-edit"></i></button>
                        </div>
                    </div>
                </div>
            </div>

            <?php
          }
      ?>

        </div>

    </div>
</main>

<?php require_once('footer.php');  
}
?>