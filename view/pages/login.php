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
   <div class="dm-kont p-3 text-light text-uppercase" id="dm-log-in" data-aos="fade-up" data-aos-duration="2000">
        <h3 class="text-center mb-3">Login</h3>
        <form action="" method="POST">
          <div class="form-group text-center">
            <label for="login-username">Username:</label>
            <input type="text" class="form-control bg-lightgrey" id="login-username" name="login-username" />
          </div>
          <div class="form-group text-center">
            <label for="login-password">Password:</label>
            <input type="password" class="form-control bg-lightgrey" id="login-password" name="login-password" />
          </div>
          <div class="form-group">
            <input type="button" id="login-submit" class="form-control dm-sub bg-dark text-light" name="login-submit" value="Login">
          </div>
          <div class="form-group text-center">
            <label class="text-danger" id="erorMessage">
            </label>
          </div>
        </form>
       
   </div>
</div>

<?php
    include_once ("../fixed/footer.php");   
?>