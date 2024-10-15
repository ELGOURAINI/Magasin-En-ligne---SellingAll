<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }
require_once('connectbdd.php');
require_once('header.php');
$s = "SELECT * from client where Etat='C' ";
$result=mysqli_query($con,$s);
?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">  

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 mb-10 border-bottom">
        <h3 >les clients du magasin</h3>
      </div>
      <div class="table-responsive pt-5">
        <table class="table">
          <thead class="blue-grey lighten-4">
            <tr>
              <td scope="col">id</td>
              <td scope="col">Nom</td>
              <td scope="col">Prénom </td>
              <td scope="col">Téléphone</td>
              <td scope="col">Date de naissance</td>
              <td scope="col">Email</td>
              <td scope="col">Adresse</td>
              <td scope="col">Ville</td>
              <td scope="col">Date d'inscription</td>
              <td scope="col">action</td>
            </tr>
          </thead>

        <tbody>
        <?php
            while($row=mysqli_fetch_assoc($result))
            {
                $id= $row['idC'];
                $Nom = $row['NomC'];
                $Prenom = $row['PrenomC'];
                $Tel = $row['TelC'];
                $dateNaissance = $row['DateNaissance'];
                $Email = $row['EmailC'];
                $adresse = $row['AdresseC']; 
                $dateinscription = $row['Dateinscription'];
                $idV=$row['idville'];
                
                $sV="select* from ville where idV='$idV'";
                $resultV=mysqli_query($con,$sV);
                $rowV=mysqli_fetch_assoc($resultV);
                $ville=$rowV['NomV'];

            ?>
                <tr>
                    <td scope="col"><?php echo $id ;?></td>
                    <td scope="col"><?php echo $Nom   ;?></td>
                    <td scope="col"><?php echo $Prenom ;?></td>
                    <td scope="col"><?php echo $Tel ;?></td>
                    <td scope="col"><?php echo $dateNaissance ;?></td>
                    <td scope="col"><?php echo $Email ;?></td>
                    <td scope="col"><?php echo $adresse ;?></td>
                    <td scope="col"><?php echo $ville ;?></td>
                    <td scope="col"><?php echo $dateinscription ;?></td>
                    <td>
                        <button class="btn btn-danger btn-sm px-3">
                          <a href="deleteClients.php?Del=<?php echo $id ?>"><i class="fas fa-trash"></i>supprimer</a>
                        </button>
                      </td>
                </tr>
            <?php 
                }
            ?>
            </tbody>
    </table>
  </div>
</main>

<?php require_once('footer.php');?>