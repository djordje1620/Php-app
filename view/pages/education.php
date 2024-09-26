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


    <div class="container-lg pt-5 mt-5">
        <h4 data-aos="fade-up" data-aos-duration="1000"><span class="text-success">POVEĆANJE MIŠIĆNE MASE</span></h4>
        <p class="text-justify py-2 text-secondary" data-aos="fade-up" data-aos-duration="2000">3 stvari su potrebne za odvijanje ovog procesa Kalorijski suficit. Tezinski trening. Odmor. Svaka se mora ispostovati kako bi se proces odvijao kako treba, kako bi ste povecali vasu misicnu masu. Kalorijski suficit zanci da cete jesti vise nego sto se trosite, i samo tako mozete povecati vase kilograme, to je logicno zar ne. Nije svaki kalorijski suficit isti, kalorijski suficit napravljen iz preradjene i nezdrave hrane ce vam doneti pad energije, anksioznost, poremecaj hormona, cestu depresiju, nagomilavanje sala. Suficit treba biti dobro određen, ni preveliki ni premali, iz kvalitetni izvora koji ce vam omogućiti vise energije, bolje raspolozenje, kvalitetnu masu odnosno pretezno misicnu masu. Tezinski trening znaci trening sa dodatnim opterecenjem. Znaci dobro konstruisan trening koji ce pokrenuti vase misice na rast. Prvo ce ih ostetiti, jer svaki trening prvo nasteti vasim misicima, pa se vi zatim u procesu odmora oporavljate, obezbedjujete misicna potrebne nutrijente prvenstveno proteine. Misici imaju u tom slucaju sva tri uslova potrebna za rast - trening, hranu i odmor. Za tezinski trening je potrebno puno energije sto automatski znaci da cete imati potrebu da vise jedete i vas apetit ce se povecati. Odmor je taj koji ljudi vrlo cesto zapostavljaju. Ako se zapostavi to moze biti jako lose, ne samo da cete imati slabiji napredak vec mozete i nasteti vasem zdravlju. Telo se oporavlja u stanju mirovanja, telo napreduje u stanju mirovanja, vasi misici rastu tokom odmora, ne tokom treninga. Spavanje mora biti ispostovano, dok spavamo veliki broj nasih hormona radi za nas, prvenstveno hormon rasta koji , zato se trudite da imate dnevno minimum 7-8 sati dubokog sna.</p>
        <h4  data-aos="fade-up" data-aos-duration="1000"><span class="text-success"  data-aos="fade-up" data-aos-duration="1000">IDEALAN OBROK</span></h4>
        <p class="text-justify py-2 text-secondary"  data-aos="fade-up" data-aos-duration="2000">
            Internet je danas prepravljen informacijama vezanim za broj obroka. Koji broj obroka je idealan u toku dana? Koji donosi najbolje rezultate? Da li je broj obroka bitan u toku dana? Pa i ne baš. Od broja obroka ni najmanje ne zavisi da li ćete praviti dobre rezultate ili ne. Broj obroka bi najbolje bilo da prilagodite vašem životnom stilu. Odredite vaš potrebni unos nutrijenata i kalorija, i to rasporedite u onoliko obroka koliko vam odgovara. Da li vi uneli 150g proteina, 100g hidrata, 2500 kalorija iz 3 ili 5 obroka, potpuno je svejedno. Lično sam imao periode kada sam zbog nedostatka vremena imao 3 obroka dnevno, dok sam nekad znao imati i po 6-7 obroka. Nisam video nikakvu razliku, a unos nutrijenata i kalorija je bio gotovo isti. Broj obroka ne određuje veći ili manji napredak, hrana je te koja je odgovorna za to. Jedite kvalitetno, dajte telu sve potrebne nutrijente i broj obroka prilagodite svojim mogućnostima. Priča da vaše telo neće uspeti da iskoristi sve hranljive vrednosti ukoliko se to ne rasporedi u 5+ obroka su čista budalaština. Telo će iskoristi onoliko koliko mu treba, pa makar sve to strpali čak i u dva obroka.
        </p>
        <h4  data-aos="fade-up" data-aos-duration="1000"><span class="text-success">KADA JE NAJBOLJE RADITI KARDIO TRENING?</span></h4>
        <p class="text-justify py-2 text-secondary"  data-aos="fade-up" data-aos-duration="2000">
            Govorim o kardio treningu niskog inteziteta, odnosno, o treningu takvog tipa, gde ćete koristiti masti kao glavno energetsko gorivo a ne ugljene hidrate. Takav tip kardia podrazumeva neko sporije trčanje, brzi hod, vožnju bajsa, nisko intenzivno plivanje,odnosno, svaku fizičku aktivnost koju ćete obavljati duže od 10ak minuta. Kardio trening je tu kao vaša dodatna aktivnost preko koje ćete potrošiti još jedan deo kalorija. Neko kardio trening radi ujutru, čim ustane, neko ga radi nakon treninga, neko ga radi u nekom drugom terminu.. Da li tajming kardio treninga može učiniti taj isti trening efikasnijim? Pa i ne baš. Ako ste, recimo, radili brzi hod u vremenskom periodu od 60 minuta, i, recimo, da ste u proseku potrošili nekih 400 kalorija, potpuno je svejedno da li ste taj kardio radili ujutru, posle treninga ili u nekom drugom delu dana. Jer ćete potrošiti istu količinu kalorija u kom god periodu dana da ga radite. Neko smatra da je kardio trening ujutru na prazan stomak efikasniji, ali meni to nema neke logike. Stoji to da ujutru kardio trening na prazan želudac troši više energije iz masti kao izvora, ali ćete svakako potrošiti isti broj kalorija, nebitno da li radili ujutru na prazan stomak ili u nekom drugom delu dana. Ukoliko niste u kalorijskom deficitu, nijedan kardio trening vam neće pomoći da spustite procenat masti.
        </p>
        <h4  data-aos="fade-up" data-aos-duration="1000"><span class="text-success">DECA I ISHRANA</span></h4>
        <p class="text-justify py-2 text-secondary"  data-aos="fade-up" data-aos-duration="2000">
            Čuli smo da deca po rodjenju, i dok su u razvoju treba da jedu sve, ne smeju biti na dijetama.. Deca tada rastu i razvijaju se, njima je potrebna energija. Da, ne bi trebala biti na dijetama, pogotovo ne na nekim tipovima ishrane kao sto su keto, fasting, i da ne nabrajamo dalje jer ih ima milion. Dete, dok je u razvoju, jednostavno bi trebalo biti u kalorijskom suficitu. Sa svim se slazem, osim sa ovim: deca ne bi trebala tokom svog rasta i razvoja jesti SVE. Većina roditelja u 90% slučajeva pogrešno postupa u samom početku. Guraju deci brdo slatkiša, grickalica, i ostalih otrova, a sve to je prepuno trans masti i prostih šećera. Normalno, ne možeš detetu zabraniti da jede slatkiše, svako dete voli slatko, ali ne vidim razlog da se preteruje sa tim a 90% roditelja to radi. Kupi mu bananu, nemoj čokoladicu, kupi mu badem ili semenke a nemoj smoki. Učite decu od malena šta valja a šta ne. Kod nas još uvek vlada nebuloza da kad vidimo gojazno dete za njega kažemo da "puca od zdravlja". Zamislite to, i to razmišljanje. Dete sa velikom gojaznošću moze imati problem sa srcem, sa poremećajem hormona, kasnije problem sa povišenim šećerom, dijabetesom. Deca pogotovo u pubertetu mogu imati problem, i sami znate koliko u tom periodu jedu. Ako se ne povede računa, može se napraviti veliki problem. Roditelji su krivi za to. Naučite vašu decu od samog početka da se hrane što je to više moguće zdravo i IZBALANSIRANO. Nek izvuku sve potrebne proteine, hidrate i masti iz što boljih namirnica. To ih učite od malena, ne stvarajte od njih zavisnike od slatkiša i grickalica. Pogledajte kako je ova mama vaspitala svoju ćerkicu. Ona je odradila savršen posao. Bravo za nju. :)
        </p>
    </div>
    <div class="container-fluid">
        <nav aria-label="breadcrumb"  id="kontakt">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Edukacija</a></li>
              <li class="breadcrumb-item active" aria-current="page">Kontakt</li>
            </ol>
          </nav>
        </div>
    <div class="container-fluid position-relative" id="kontakt" >
            <div class="container bg-dark">
                <div class="row text-center">
                  <div class="col-sm">
                  <p class="p-2 text-white-50"><i class="fas fa-mail-bulk p-1
                    txt-black"></i>mdjole3&#64gmail.com</p>
                  </div>
                  <div class="col-sm">
                    <p class="p-2 text-white-50"><i class="fas fa-phone-alt p-1 txt-black"></i></i>+381657249922</p>
                  </div>
                  <div class="col-sm">
                    <p class="p-2 text-white-50"><i class="fas fa-map-marker-alt p-1 txt-black"></i></i>Užice, Nemanjina</p>
                  </div>
                </div>
              </div>
        <img src="<?= $path ?>assets/img/slika_pozadina.jpg" class="position-relative dm-blur bg" alt="blur pozadina kontakt forme">
        <div class="dm-sm-abs flex-column d-flex justify-content-center align-items-center p-3 dm-none bg-black" data-aos="fade-left" data-aos-duration="1000">
                <p>
                    <a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a>
                </p>
                <p>
                    <a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a>
                </p>
                <p>
                    <a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a>
                </p>
                <p>
                    <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                </p>
        </div>
       <div class="dm-kont p-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom" data-aos-duration="1000">
            <h4 class="text-center mb-3"><span class="text-success">Kontakt</span></h4>
            <form action="" method="">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="ime"  class="text-success">Ime</label>
                        <input type="text" class="form-control bg-lightgrey" id="ime">
                        <label for="" id="ime"></label>
                     </div>
                    <div class="form-group col-md-6">
                        <label for="prezime" class="text-success">Prezime</label>
                        <input type="text" class="form-control bg-lightgrey" id="prezime">
                        <label for="" id="prezime"></label>
                    </div>
              </div>
              <div class="form-group">
                <label for="email" class="text-success">Email</label>
                <input type="email" class="form-control bg-lightgrey" id="email" placeholder="...@gmail.com">
                <label for="" id="email"></label>
              </div>
              <div class="form-group">
                <label for="poruka2" class="text-success">Poruka </label>
                <textarea id="poruka2" name="poruka2" class="form-control bg-lightgrey"></textarea>
              </div>
              <div class="form-group">
                <button name="sendMsg" id="sendMsg" class="form-control dm-sub bg-dark text-success"/> Pošalji</button>
              </div>
              
              <div id="odgovor">

              </div>
            </form>
       </div>
    </div>
    <div class="container-xl">
        <div class="row text-center my-5 dm-not-flex" data-aos="fade-up" data-aos-duration="1000">
            <div class="col">
                <h5>ZA KOLIKO MOGU DA VIDIM PRVE REZULTATE?</h5>
                <p class="text-justify py-2 text-secondary">
                    Već posle 7 dana ćete se osećati prijatnije i lagodnije. Nakon 2 sedmice videćete promenu na vagi. Nakon mesec dana već ćete zasigurno videti kako se telo polako menja i bićete sve zadovoljniji. Posle 3 meseca svi oko vas će primetiti promene koje će biti znatno vidljive. Dobijate na samopouzdanju i dodatnu motivaciju da nastavite dalje istim tempom.
                </p>
            </div>
            <div class="col">
             <h5>KAKO FUNKCIONIŠE SISTEM RADA?</h5>
             <p class="text-justify py-2 text-secondary">
                Nakon što dogovorimo saradnju, šaljem vam jedan veliki upitnik sa svim potrebnim pitanjima za sastavljanje početnih planova. Nakon toga obavljamo telefonski razgovor gde se još detaljnije dogovorimo o sistemu rada. Nakon 48h, dobijate od mene početne planove. Jednom nedeljno ste dužni da mi pišete izveštaj i ja na osnovu toga procenim kada se radi korekcija vaših planova. Pored tog izveštaja, ja ću vam se svakako javiti na svaka 3 dana da proverim kako vam ide.
             </p>
            </div>
        </div>
    </div>

<?php
    include_once ("../fixed/footer.php");   
?>