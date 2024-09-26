<?php
  include_once("../../config/connection.php");
  include_once("../../logic/session.php");
  include_once("../../logic/functions.php");
  include_once("../../logic/url.php");
  include_once("../fixed/head.php");
  if(!$loginObj){
    header("Location: login.php");
  }
  try {
    $nav = getNav();
    if (isset($_GET['id'])) {
      $usluga = getService($_GET["id"]);
  } 
    }
  catch(PDOException $ex){
    echo "Failed to load navigation : " . $ex->getMessage();
  }
  include_once "../fixed/nav.php";
    
?>

<div class="container-fluid position-relative">
    <img src="<?=$path?>assets/img/slika_pozadina.jpg" class="position-relative dm-blur bg" alt="blur pozadina kontakt forme">
  <?php if(isset($usluga)): ?>
    <div class="dm-kont p-3 text-light " id="dm-log-in" data-aos="fade-up" data-aos-duration="2000">
      <div class="text-left">
                <h2 class="text-center"><?= $usluga->naziv?></h2>
                <div class="icon text-center py-2 mt-3">
                    <i class="<?= $usluga->ikonica ?>"></i>
                </div>
          <p><?= $usluga->opis ?></p>
          <div class="text-center py-2 mt-3">
            <a href="<?= $path ?>logic/userAddService.php?id=<?= $usluga->id_usluga ?>&id_korisnik=<?= $loginObj->id_korisnik ?>">
              <input type="button" value="Izaberite" class="btnUsluga" />
            </a>
            <p class="text-danger">
                    <?php
                      if (isset($_SESSION['poruka'])): ?>
                      <?=$_SESSION['poruka']?>
                  <?php unset($_SESSION['poruka']); endif; ?>
            </p> 
          </div>
      </div>
   </div>
   <?php else: header('Location: ../../index.php') ?>

   <?php endif; ?>

</div>
</div>

<?php
    include_once ("../fixed/footer.php");   
?>