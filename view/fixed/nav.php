<?php
  try {
    $nav = getNav();
  }
  catch(PDOException $ex){
    echo "Trenutno nije moguće učitati navigaciju: " . $ex->getMessage();
  }
?>
<div class="d-flex flex-row-reverse bg-dark p-0">
    <?php
      if($loginObj):
    ?>
      <div class="p-0 pr-2 pl-2 bd-highlight">
        <a href="<?=$path?>logic/logout.php" class="text-secondary dm-vel dm-hov2">Odjavi se
        </a>
      </div> |

      <div class="p-0 pr-2 pl-2 bd-highlight">
        <span class="text-success dm-vel">
          <a class="text-secondary dm-vel dm-hov2 zuta" href="<?= $path ?>view/pages/user_acount.php?id=<?=$loginObj->id_korisnik?>"><?= $loginObj->imeprezime ?> (Profil)
          </a>
        </span>
      </div>|

      <?php
        $role = $loginObj->naziv;
        if($role == "admin"):
        ?>
         <div class="p-0 pr-2 pl-2 bd-highlight">
          <a href="<?=$path?>view/pages/adminpanel.php" class="text-secondary dm-vel dm-hov2">Admin panel
          </a>
        </div> 
      <?php endif; ?>

      <?php else: ?>
          <div class="p-0 pr-2 pl-2 bd-highlight"><a href="<?=$path?>view/pages/register.php" class="text-secondary dm-vel dm-hov2">Registruj se</a></div>|
          <div class="p-0 pr-2 pl-2 bd-highlight"><a  href="<?=$path?>view/pages/login.php" class="text-secondary dm-hov2 dm-vel ">Prijavi se</a> </div>
      <?php endif ?>
  </div>

    <div class="container-fluid py-1 bg-black sticky-top ">
        <nav class="navbar navbar-expand-lg navbar-light bg-black">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav dm-text-center">
                  <?php
                    echo($nav);
                  ?>
                  <a class="nav-link text-light text-uppercase" href="<?=$path?>index.php#services">Usluge</a>
                  <a class="nav-link text-light text-uppercase" href="<?=$path?>index.php#impressions">Utisci</a>
                  <a class="nav-link text-light text-uppercase" href="<?=$path?>view/pages/education.php#kontakt">Kontakt</a>

              <a class="nav-link text-light  text-uppercase" href="<?=$path?>view/pages/omeni.php">O meni</a>
              </div>
            </div>
          </nav>          
    </div>
