<?php
  include ("config/connection.php");
  include_once("logic/session.php");
  include ("logic/functions.php");
  include_once "view/fixed/head.php";

  try {
    $nav = getNav();
    }
  catch(PDOException $ex){
    echo "Failed to load navigation : " . $ex->getMessage();
  }
  include_once "view/fixed/nav.php";
    
?>

    
    <div class="container-fluid p-0">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
              <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="assets/img/pocetna.jpg" class="d-block w-100" alt="pocetna">
                <div class="carousel-caption d-none d-md-block" data-aos="zoom-in" data-aos-duration="1000">
                    <p>Zdravo, moje ime je</p>
                    <h2><span class="text-success">Đ</span>orđe<span class="text-success">M</span>arković</h5>
                        <p>online mentor</p>
                        <button type="button" class="btn btn-outline-success"><a class="text-success" href="https://www.instagram.com/markovic__djordje/" target="_blank">Počnimo</a></button>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/img/slide2.jpg" class="d-block w-100" alt="sllika 2">
                <div class="carousel-caption d-none d-md-block" data-aos="zoom-in" data-aos-duration="1000">
                    <p>Zdravo, moje ime je</p>
                    <h2><span class="text-success">Đ</span>orđe <span class="text-success">M</span>arković</h5>
                        <p>online mentor</p>
                        <button type="button" class="btn btn-outline-success"><a class="text-success" href="https://www.instagram.com/markovic__djordje/" target="_blank">Počnimo</a></button>
                </div>
              </div>
              <div class="carousel-item">
                <img src="assets/img/slide3.jpg" class="d-block w-100" alt="slika 3">
                <div class="carousel-caption d-none d-md-block" data-aos="zoom-in" data-aos-duration="1000">
                    <p>Zdravo, moje ime je</p>
                    <h2><span class="text-success">Đ</span>orđe <span class="text-success">M</span>arković</h5>
                        <p>online mentor</p>
                        <button type="button" class="btn btn-outline-success"><a class="text-success" href="https://www.instagram.com/markovic__djordje/" target="_blank">Počnimo</a></button>
                </div>
              </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>

    <div class="container-fluid p-0">
      <nav aria-label="breadcrumb"  id="services">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Početna</a></li>
            <li class="breadcrumb-item active" aria-current="page">Usluge</li>
          </ol>
        </nav>
    </div>

    <?php
      include_once "view/fixed/usluge.php";
    ?>
    <div class="container-fluid p-0">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Početna</a></li>
              <li class="breadcrumb-item"><a href="#services">Usluge</a></li>
              <li class="breadcrumb-item active" aria-current="page">Utisci</li>
            </ol>
          </nav>
    </div>

    <?php
      include_once "view/fixed/utisci.php";
    ?>
    
   
<?php
  include "view/fixed/footer.php";
?>
