<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }

require_once('connectbdd.php');
require_once('header2.php');

$email = $_SESSION['emailadmin'];
$s = "SELECT * from client where  EmailC='$email' and Etat='A'";
$result=mysqli_query($con,$s);
$row=mysqli_fetch_assoc($result);
// var_dump($row);

$vil = $row['idville'];
$queryV = "SELECT * from ville where idV='$vil'";
$resultV=mysqli_query($con,$queryV);
$rowV = mysqli_fetch_assoc($resultV);
$ville= $rowV['NomV'];

?>

<!-- col-md-9 ms-sm-auto col-lg-10 px-md-4 -->
<main class="col-md-9" >  
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-4 mb-10 border-bottom">
        <h3 >Mon Profil</h3>
    </div>
<div class="container" style="padding-top: 15;">
    <div class="main-body">
          <!-- /Breadcrumb -->
          <div class="row gutters-sm">
            <div class="col-md-4 mb-4">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo $row['nomphotoC']; ?>" alt="Admin" class="rounded-circle" width="250" height="250">
                    <h3><?php echo $row['NomC']; ?> <?php echo $row['PrenomC'];?></h3>
                     <p class="text-muted font-size-sm">ADMIN of SellignAll</p>
                    <div class="row">
                    <div class="col-sm-12">
                        <a type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mymodalADD"> Change Photo</a></button>
                     <!--  <button class="btn btn-outline-primary">Message</button> -->
                    </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-7">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Last Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['NomC']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">First Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['PrenomC']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Adress Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['EmailC']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['TelC']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Date Of Birth</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['DateNaissance']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address & City</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php echo $row['AdresseC']; ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-9">
                      <a class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#mymodalADDP">Edit</a>
                      <a class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#modalADD">Change Password</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>

    <div class="modal fade" id="mymodalADDP" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-center display-5" id="exampleModalLabel">Edit Your Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
              <form  method="POST" action="pageeditprofil.php" enctype="multipart/form-data">
                  <div class="row g-3" >
                      <div class="col-md-6">
                      <input type="text" name="Prenom" id="Prenom" placeholder="first Name" class="form-control" value="<?php echo $row['PrenomC'];?>">
                      </div>
                      <div class="col-md-6">
                      <input type="text" name="Nom" id="Nom" placeholder="Last Name" class="form-control" value="<?php echo $row['NomC'];?> ">
                      </div>
                    </div>
                  <div >
                  <br>
                  <input type="text" name="Tel" id="Tel"  minlength="10" maxlength="10" placeholder="N°Tel" class="form-control" value="<?php echo $row['TelC']; ?>" >
                  <br>
                  </div>
                  <div >
                  <input type="date" name="dateNaissance" id="dateNaissance" placeholder="jj/mm/aaaa" class="form-control" value="<?php echo $row['DateNaissance']; ?>">
                  <br>
                  </div>
                  <div>
                  <input type="text" name="adresse" id="adresse" placeholder="Adress "  class="form-control" value="<?php echo $row['AdresseC']; ?>" >
                  <br>         
                  </div>
                  <div>
                  <input type="text" name="Email" id="Email" placeholder="email@example.com" class="form-control" value="<?php echo $row['EmailC']; ?>" >
                  </div>
                  <button  name="btnclose" class="btn btn-secondary mt-5 ml-5" data-bs-dismiss="modal">Close</button>
                  <button name="btnedit1" type="submit" class="btn btn-primary mt-5 ml-5">Save Changes</button>
              </form>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="mymodalADD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title text-center display-" id="exampleModalLabel">Change Photo</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
              <form  method="POST" action="pageeditprofil.php" enctype="multipart/form-data">
                  <div>
                  <input type="file" name="photo" id="photo" minlength="8" placeholder="" class="form-control">
                  </div>
                  <button  name="btnclose" class="btn btn-secondary mt-5 ml-5" data-bs-dismiss="modal">Close</button>
                  <button name="btnedit2" class="btn btn-primary mt-5 ml-5">Save Changes</button>
              </form>
          </div>

        </div>
      </div>
    </div>

    <div class="modal fade" id="modalADD" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h6 class="modal-title text-center display-7" id="exampleModalLabel">Change Your Password</h6>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
              <form  method="POST" action="pageeditprofil.php" enctype="multipart/form-data">
                  <div>
                  <input type="password" name="password" id="password" minlength="8" placeholder="*********" class="form-control"  value="<?php echo $row['password'];?>">
                  </div>
                  <button  name="btnclose" class="btn btn-secondary mt-5 ml-5" data-bs-dismiss="modal">Close</button>
                  <button name="btnedit3" class="btn btn-primary mt-5 ml-5">Save Changes</button>
              </form>
          </div>

        </div>
      </div>
    </div>
    <!--<script type="text/javascript" src="validationpwd.js"></script>-->
</main>

<?php require_once('footer.php');?>
<!-- style="padding-top: 90;padding-left: 1000;" textright
style="padding-top: 40px;" main -->