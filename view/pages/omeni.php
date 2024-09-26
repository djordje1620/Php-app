<?php
  include ("../../config/connection.php");
  include_once("../../logic/session.php");
  include ("../../logic/functions.php");
  include ("../../logic/url.php");
  include_once "../fixed/head.php";

  try {
    $nav = getNav();
    }
  catch(PDOException $ex){
    echo "Failed to load navigation : " . $ex->getMessage();
  }
  include_once "../fixed/nav.php";
    
?>
    <div class="container-lg pt-5 my-5">
        <div class="row">
            <div class="col-md-6">
            <img src="<?=$path?>assets/img/ja.jpg" class="img-fluid" alt="Slika">
            </div>
            <div class="col-md-6">
            <h4 data-aos="fade-up" data-aos-duration="1000"><span class="text-success">O meni</span></h4>
            <p class="text-justify py-2 text-secondary" data-aos="fade-up" data-aos-duration="2000">
                Ovde možete dodati svoj tekst. Možete koristiti ovaj prostor da opišete sliku, napišete neki opis ili bilo šta drugo što želite da podelite sa posetiocima.
            </p>
            </div>
        </div>
    </div>

<?php
    include_once ("../fixed/footer.php");   
?>