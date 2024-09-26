
<?php
  include_once("../../config/connection.php");
  include_once("../../logic/session.php");
  include_once("../../logic/functions.php");
  include_once("../../logic/url.php");
  include_once("../fixed/head.php");


  if(!$loginObj){
    header("Location: login.php");
    exit();
  }
  try {
    $nav = getNav();
    $ankete = dohvatiSveAnkete();
    $poruke = selectQuery('poruke');

    if (isset($_GET['id'])) {
        if($loginObj->id_korisnik == $_GET['id']){
            $id = $_GET['id'];
            $profil = getAcount($_GET['id']);
            $uslugeK = getUserService($_GET['id']);
            $userIMG = getUserImg($_GET['id']);
            if($userIMG){
                $slika = $userIMG->slika;
            }
        }else{
           
            header('Location: ../../index.php');
            exit();
        }
    } 
    }
  catch(PDOException $ex){
    echo "Failed to load navigation : " . $ex->getMessage();
  }
  include_once "../fixed/nav.php";
?>

<div class="container-fluid position-relative">
    <img src="<?=$path?>assets/img/slika_pozadina.jpg" class="position-relative dm-blur bg" alt="blur pozadina kontakt forme">
    <?php if(isset($profil)): ?>
    <div class="p-3 mt-5 " id="dm-profil" data-aos="fade-up" data-aos-duration="2000">
            <div class="row justify-content-left ">
                <div class="col-md-4 ">
                    <div class="card">
                        <div class="card-header">
                            Korisnički profil
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php if(!$userIMG): ?>
                                    <li class="list-group-item">
                                        <form action="../../logic/upload.php" method="post" enctype="multipart/form-data">
                                            <img id="imgProf" src="<?=$path?>assets/img/korisnik.jpg" alt="">
                                            <input type="file" name="fileToUpload" id="fileToUpload">
                                            <input type="submit" class="btn btn-success mt-3" value="Dodaj sliku" name="submit">
                                        </form> 
                                    </li>
                                <?php elseif($slika): ?>
                                    <li class="list-group-item">
                                            <img id="imgProf" src="<?=$path?>assets/img/<?= $slika?>" alt="">
                                    </li>
                                <?php endif; ?>

                                <li class="list-group-item">
                                    <?php
                                        if(isset($_SESSION['error'])) {
                                            echo "<p style='color: red;'>".$_SESSION['error']."</p>";
                                            unset($_SESSION['error']); 
                                        }
                                    ?>
                                </li>
                            
                                <li class="list-group-item"><strong>Ime i prezime:</strong> <?= $profil->imeprezime ?></li>
                                <li class="list-group-item"><strong>Korisničko ime:</strong> <?= $profil->username ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?= $profil->email ?></li>
                                <li class="list-group-item"><strong>Uloga:</strong><?php if($profil->naziv == "user"){echo ' običan korisnik';} else {echo ' admin';} ?></li>
                                <?php if($profil->id_uloga==2): ?>
                                <li class="list-group-item">
                                    <select name="anketa" id="anketa" class="btn btn-info">
                                        <option value="0">Popuni anketu</option>
                                        <?php foreach($ankete as $a): ?>
                                            <option value="<?= $a->id_anketa ?>"><?= $a->naziv ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            
                <?php if(count($uslugeK)): ?>
                <div class="col-md-8 ">
                    <div class="card">
                        <div class="card-header">
                           Usluge
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach($uslugeK as $uk): ?>
                                <li class="list-group-item">
                                    <strong>Naziv usluge:</strong> <?= $uk->naziv ?> 
                                    <?php if($uk->aktivan==0): ?>
                                    | <strong>Cena:</strong> <?= $uk->vrednost ?> € 
                                    | <strong>Čeka se aktiviranje usluge</strong>
                                    <?php else: ?>
                                        <strong>| Plaćeno</strong></br>
                                        <a href="../../logic/deleteservice.php?id=<?= $uk->id_uu ?>&id_korisnik=<?= $uk->id_user ?>" class="btn btn-danger">Prekini uslugu</a>
                                    <?php endif; ?>
                              
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

                <?php if($profil->id_uloga==2): ?>
                    <div class="col-md-4 mt-2 " id="anketaDiv">
                    </div>
                <?php endif; ?>
                
                <?php if($profil->id_uloga==1): ?>
                    <div class="col-md-8 ">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">Ime i Prezime</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Poruka</th>
                                        <th scope="col">Ip adresa</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-light">
                                <?php foreach($poruke as $p): ?>
                                    <tr>
                                        <td><?= $p->ime ?> <?= $p->prezime ?></td>
                                        <td><?= $p->email ?></td>
                                        <td><?= $p->poruka ?></td>
                                        <td><?= $p->ip_adresa ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                <?php endif; ?>
    
        </div>
    </div>

     
   <?php else: header('Location: ../../index.php'); ?>
   <?php endif; ?>

</div>
</div>

  

<?php
    include_once ("../fixed/footer.php");
?>
