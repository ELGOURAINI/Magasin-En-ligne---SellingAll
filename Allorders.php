<?php
session_start();

  if(!$_SESSION["emailadmin"])
    {
        header("Location:index.php");
    }
require_once('connectbdd.php');
require_once('header.php');

?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">  

<section class="text-center container">
    <div class="row py-lg-4">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h1 class="fw-light mt-0 my-0"><b>SellingAll commandes</b></h1>
        <p class="lead text-muted">Voici ici tous les commandes des clients du magasin</p>
      </div>
    </div>
  </section>
  <div class="table-responsive pt-5">
        <table class="table">
          <thead class="blue-grey lighten-4">
            <tr><!-- colspan=2 -->
              <td scope="col">Id</td>
              <td colspan=2 scope="col">Client</td> <!-- id client Nom+prenom -->
              <td scope="col">Produit </td>
              <td scope="col">Quantite commandé</td>           
              <td scope="col">Date</td>
              <td scope="col">Etat</td>
              <td scope="col">action</td>
            </tr>
          </thead>
          <tbody>
            <tr>
              <!-- <td></td>
              <td></td>
              <td></td> -->
            </tr>
          </tbody>
        </table>
      </div>
</main>
<?php require_once('footer.php');?>