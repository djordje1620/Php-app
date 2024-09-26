<?php
  include_once("../../config/connection.php");
  include_once("../../logic/session.php");
  include_once("../../logic/functions.php");
  include_once("../../logic/url.php");
  include_once("../fixed/head.php");

  $role = $loginObj->naziv;
  if(!$loginObj || $role == "user"){
    header("Location: login.php");
  }
  try {
    $nav = getNav();
    $users = getUsers();
    $kategorije = selectQuery("kategorije");
    $usluge = selectQuery("usluge");
    $anketa = dohvatiAnketu();
    }
  catch(PDOException $ex){
    echo "Failed to load navigation : " . $ex->getMessage();
  }
  include_once "../fixed/nav.php";
    
?>

<div class="container-fluid admin-panel">
  
    <div class="p-3 bg-light" data-aos="fade-up" data-aos-duration="2000">
        <div class="row justify-content-left">
                <div class="col-md-3 text-left mb-1 p-3">
                    <form action="../../logic/adminAddCategory.php" method="POST">
                        <input type="submit" class="btn btn-info" value="Dodaj kategoriju" />
                        <div class="mt-2">
                            <label for="kategorija" class="">Naziv kategorije:
                                <input type="text" class="form-control bg-lightgrey" name="kategorija"/>
                               
                            </label>
                                <?php
                                 if (isset($_SESSION['message'])): ?>
                                    <p class="text-danger"><?=$_SESSION['message']?></p>
                                 <?php unset($_SESSION['message']); endif; ?>
                                 
                        </div>
                    </form>
                </div>
                <div class="col-md-6 text-left mb-1 p-3">
                    <form action="../../logic/deleteCategory.php" method="POST">
                        <input type="submit" class="btn btn-danger" value="Obriši kategoriju" />
                        <input type="button" class="btn btn-success" name="btnUpdate" id="btnUpdate" value="Ažuriraj kategoriju" />
                        <div class="mt-2">
                            <label>Kategorija:
                                <select name="ddlKat"  class="form-control bg-lightgrey">
                                    <option value="0">...</option>
                                <?php foreach($kategorije as $kat): ?>
                                    <option value="<?=$kat->id_kategorija?>"><?=$kat->naziv?></option>
                                <?php endforeach; ?>  
                                
                                </select>
                            </label>
                            <label for="newNameCategory" class="">Novi naziv kategorije:
                                <input type="text" class="form-control bg-lightgrey" name="newNameCategory" id="newNameCategory" />
                            </label>
                            <p id="poruka" class="text-danger">
                                <?php
                                 if (isset($_SESSION['message4'])): ?>
                                   <?=$_SESSION['message4']?>
                                 <?php unset($_SESSION['message4']); endif; ?>
                                 </p>    
                        </div>
                    </form>
                </div>
                <div class="col-md-10 text-left mb-1 p-3">
                    <form action="../../logic/adminAddService.php" method="POST">
                        <input type="submit" class="btn btn-info" value="Dodaj uslugu" />
                        <div class="mt-2">
                            <label for="nazivUsluge" class="">Naziv usluge:
                                <input type="text" class="form-control bg-lightgrey" name="nazivUsluge"/>
                            </label>
                            <label for="ikonica" class="">Ikonica:
                                <input type="text" class="form-control bg-lightgrey" name="ikonica"/>
                            </label>
                            </label>
                            <label for="opis" >Opis usluge: 
                                <input type="text" class="form-control bg-lightgrey wd-100" name="opis"/>
                            </label>
                            <?php
                                 if (isset($_SESSION['message2'])): ?>
                                    <p class="text-danger"><?=$_SESSION['message2']?></p>
                                 <?php unset($_SESSION['message2']); endif; ?>
                        </div>
                    </form>
                </div>
                <div class="col-md-10 text-left mb-5 p-3">
                    <form action="../../logic/adminAddServiceCategory.php" method="POST">
                        <input type="submit" class="btn btn-info" value="Poveži" />
                        <div class="mt-2">
                            <label>Kategorija:
                                <select name="ddlKat"  class="form-control bg-lightgrey">
                                    <option value="0">...</option>
                                <?php foreach($kategorije as $kat): ?>
                                    <option value="<?=$kat->id_kategorija?>"><?=$kat->naziv?></option>
                                <?php endforeach; ?>  
                                </select>
                            </label>
                            <label>Usluga:
                                <select name="ddlUsluga"  class="form-control bg-lightgrey">
                                <option value="0">...</option>
                                <?php foreach($usluge as $us): ?>
                                    <option value="<?=$us->id_usluga?>"><?=$us->naziv?></option>
                                <?php endforeach; ?>  
                                </select>
                            </label>
                            <?php
                                 if (isset($_SESSION['message3'])): ?>
                                    <p class="text-danger"><?=$_SESSION['message3']?></p>
                                 <?php unset($_SESSION['message3']); endif; ?>
                        </div>
                    </form>
                </div>
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Ime i Prezime</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Datum kreiranja</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($users as $u):
                            ?>
                            <tr>
                                <td><?= $u->id_korisnik ?></td>
                                <td><?= $u->imeprezime ?></td>
                                <td><?= $u->username ?></td>
                                <td><?= $u->email ?></td>
                                <td><?= $u->created_at ?></td>
                                <td>
                                    <a href="#uslugekorisnik" class="btn btn-info btn-usluge" data-id="<?=$u->id_korisnik?>">Usluge</a>
                                </td>
                                <td>
                                    <a href="<?= $path ?>logic/deleteuser.php?id=<?=$u->id_korisnik?>" class="btn btn-danger">Obriši korisnika</a>
                                </td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>   
                </div>
                <div class="col-md-10" id="uslugekorisnik">
                </div> 
                <div class="col-md-10">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Anketa</th>
                                    <th scope="col">Ime i Prezime</th>
                                    <th scope="col">Pitanja</th>
                                    <th scope="col">Odgovori</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach($anketa as $a): ?>
                                <tr>
                                    <td><?= $a->naziv?></td>
                                    <td><?= $a->imeprezime?></td>
                                    <td><?= $a->pitanje?></td>
                                    <td><?= $a->odgovor?></td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>   
                </div>
        </div>
    </div>
</div>
</div>




<?php
    include_once ("../fixed/footer.php");   
?>