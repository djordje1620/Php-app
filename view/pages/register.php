<?php
  include_once("../../config/connection.php");
  include_once("../../logic/session.php");
  include_once("../../logic/functions.php");
  include_once("../../logic/url.php");
  include_once("../fixed/head.php");

  if($loginObj){
    header("Location: ../../index.php");
  }

  try {
    $nav = getNav();
    }
  catch(PDOException $ex){
    echo "Failed to load navigation : " . $ex->getMessage();
  }
  include_once "../fixed/nav.php";
    
?>

<div class="container-fluid position-relative">
    <img src="<?=$path?>assets/img/slika_pozadina.jpg" class="position-relative dm-blur bg" alt="blur pozadina kontakt forme">
    <div class="text-light p-3" id="dm-sign-in" data-aos="fade-up" data-aos-duration="2000">
    <form action="" method="POST">
        <h3 class="text-center mb-3 text-uppercase">Register</h3>
        <div class="form-group text-center">
            <label for="inpImePrezime">Name and surname:</label>
            <input type="text" class="form-control bg-lightgrey" id="inpImePrezime" name="inpImePrezime"/>
            <p class="text-danger font-italic">The first and last name must start with a capital letter</p>
        </div>
        <div class="form-group text-center">
            <label for="inpEmail">Email:</label>
            <input type="email" class="form-control bg-lightgrey" id="inpEmail" name="inpEmail" placeholder="...@gmail.com"/>
        </div>
        <div class="form-group text-center">
            <label for="inpUsername" >Username:</label>
            <input type="text" class="form-control bg-lightgrey" id="inpUsername" name="inpUsername"/>
        </div>
        <div class="form-group text-center">
            <label for="password">Password:</label>
            <input type="password" class="form-control bg-lightgrey" id="password" name="password"/>
            <p class="text-danger font-italic">Password must have at least one letter, number, special character and length greater than 8</p>
        </div>
        <div class="form-group text-center">
            <label for="passwordConfirm" >Confirm password:</label>
            <input type="password" class="form-control bg-lightgrey" id="passwordConfirm" name="passwordConfirm"/>
        </div>
        <div class="form-group">
            <input type="button" name="register-submit" id="register-submit" class="form-control dm-sub bg-dark text-light" value="Register"/>
        </div>
    </form>

    </div>
</div>


<?php
    include_once ("../fixed/footer.php");   
?>