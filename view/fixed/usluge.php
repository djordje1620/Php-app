<?php
    
    try {
        $usluge = selectQuery("usluge");
        $kategorije = selectQuery("kategorije");
    }
    catch(PDOException $ex){
        echo "Failed to load services : " . $ex->getMessage();
    }
?>


<div class="container-xl" id="services">
      <h1 class="text-center my-2 display-3" data-aos="fade-up" data-aos-duration="1000">Usluge</h1>

        <input type="radio" name="category" id="category-all" class="category-radio" value="0"> Sve
        <?php foreach($kategorije as $kategorija): ?>
            <input type="radio" name="category" class="category-radio ml-3" value="<?= $kategorija->id_kategorija ?>"> <?= $kategorija->naziv ?> 
        <?php endforeach; ?>
        

        <div id="filtered-results"> 
           
        </div>
           

</div>