<div class="bg-dark text-light" >
      <div class="container text-left">
        <div class="row p-3" id="footer">
            <div class="col-sm-4">
                <h3>Online mentor</h3>
                <?php
                  $meni = selectQuery("menu");
                  foreach($meni as $m):
                ?>
                <?php if($m->putanja == "index"): ?>
                  <p><a href="<?= $path.$m->putanja?>.php"><?= $m->naziv ?></a></p>
                <?php endif; ?>  
                <?php if($m->putanja == "education"): ?>
                  <p><a href="<?= $path ?>view/pages/<?= $m->putanja?>.php"><?= $m->naziv ?></a></p>
                <?php endif; ?>  
                <?php endforeach; ?>
                  <p><a href="<?= $path ?>view/pages/education.php#kontakt">Kontakt</a></p>
                  <p><a href="<?= $path ?>index.php#services">Usluge</a></p>
            </div>
            <div class="col-sm-4">
              <h3>Društvene mreže</h3>
                  <p><a href="#">Instagram</a></p>
                  <p><a href="#">Facebook</a></p>
                  <p><a href="#">Twiter</a></p>
            </div>
            <div class="col-sm-4">
                <h3>Korisni linkovi</h3>
                  <p><a href="<?= $path ?>assets/dokumentacija.pdf" class="zuta">Dokumentacija</a></p>
                  <p><a href="#">Sitemap</a></p>
                  <p><a href="#">Autor</a></p>
            </div>
        </div>
    </div>
    <div class="container bg-dark text-center ">
        <p class="p-3 mb-0 text-light">
            Copyright &#169 2024 All rights reserved | Đorđe Marković
        </p>
    </div>


    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      AOS.init();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="<?= $path ?>assets/js/main.js"></script>
  
  
</body>
</html>