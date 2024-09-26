$(document).ready(function(){

    let errors = 0;

    let regFullname = /^[A-ZŽČĆŠĐ][a-zžčćšđ]{3,}(\s[A-ZŽČĆŠĐ][a-zžčćšđ]{3,})+$/;
    let regUsername = /^[A-Za-z0-9\.\_]{6,}$/;
    let regEmail = /^[a-z][a-z0-9\.]{3,}@([a-z0-9]{3,}\.)+([a-z]){1,}$/;
    let regPassword = /^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/;
    let regMessage = /^.{15,}$/;

    $("#register-submit").click(function(){
        function registerCheck(data, regex, string){
        if($(data).val()==""){
            $(data).css("border-bottom", "1px solid #e21b1b");
            $(data).attr("placeholder", string + " ne sme biti prazno");
            errors++;
        } else if(!regex.test($(data).val())){
            $(data).val("");
            $(data).css("border-bottom", "1px solid #e21b1b");
            $(data).attr("placeholder", string + " je u neispravnom formatu");
            errors++;
        } else{
            $(data).css("border-bottom", "1px solid #fff");
            errors = 0;
        }
        return errors;
        }
    let fullname = $("#inpImePrezime");
    let username = $("#inpUsername");
    let email = $("#inpEmail");
    let password = $("#password");
    let confirm = $("#passwordConfirm");
    errors += registerCheck(username, regUsername, "Korisničko ime");
    errors += registerCheck(fullname, regFullname, "Ime i prezime");
    errors += registerCheck(email, regEmail, "Email");
    errors += registerCheck(password, regPassword, "Lozinka");
    if($(confirm).val()==""){
        $(confirm).css("border-bottom", "1px solid #e21b1b");
        $(confirm).attr("placeholder", " Potvrdite lozinku");
        errors++;
    } else if($(confirm).val() != $(password).val()){
        $(confirm).val("");
        $(confirm).css("border-bottom", "1px solid #e21b1b");
        $(confirm).attr("placeholder", "Lozinke se ne poklapaju");
        errors++;
    } else{
        $(confirm).css("border-bottom", "1px solid #fff");
        errors = 0;
    }
    console.log(errors);
    if(errors == 0){
        let regData = {
        email: $(email).val(),
        fullname: $(fullname).val(),
        password: $(password).val(),
        username: $(username).val()
        };
    console.log(regData);
   
    $.ajax({
        url: "../../logic/registration.php",
        method: "POST",
        data:regData,
        dataType: "json",
        success: function(response){
            console.log(response.message);
            location.href = "login.php";
        },
        error: function(xhr, status, error){
            console.error("AJAX error:", status, error);
            console.log("Response:", xhr.responseText);
            if (xhr.responseJSON && xhr.responseJSON.message) {
                console.error("Server error message:", xhr.responseJSON.message);
            }
        }
        });
        }
    });


    $("#login-submit").click(function(){
        errors = 0;
        function loginCheck(data, regex, string){
            if($(data).val()==""){

                $(data).css("border-bottom", "1px solid #e21b1b");
                $(data).attr("placeholder", string + "  must not be empty");
                errors++;
            } 
            else if(!regex.test($(data).val())){
                $(data).val("");
                $(data).css("border-bottom", "1px solid #e21b1b");
                $(data).attr("placeholder", string + " is in invalid format");
                errors++;
            } else{
                $(data).css("border-bottom", "1px solid #fff");
                errors = 0;
            }
                return errors;
            }

        let username = $("#login-username");
        let password = $("#login-password");
        errors += loginCheck(username, regUsername, "Username");
        errors += loginCheck(password, regPassword, "Password");
        if(errors == 0){
            let logData = {
            password: $(password).val(),
            username: $(username).val()
        };
       
            $.ajax({
            url: "../../logic/login.php",
            method: "POST",
            data:logData,
            dataType: "json",
            success: function(response){
                console.log(response.message);
                location.href = "../../index.php";
            },
            error: function(xhr, status, error){
                if (xhr.responseJSON && xhr.responseJSON.ERROR) {
                    //console.error("Server error message:", xhr.responseJSON.ERROR);
                    //$("#erorMessage").html(xhr.responseJSON.ERROR);
                } else {
                    //console.error("AJAX error:", status, error);
                    //console.log("Response:", xhr.responseText);
                    $("#erorMessage").html("Pogrešno koriničko ime ili lozinka.");  
                }
            }
            });
        }
    });

    $('#category-all').prop("checked", true);
  
    var currentPath = window.location.pathname;
    if (currentPath === "/mentoronline/index.php" || currentPath === "/mentoronline/") {
        allService();
    }
    $(".category-radio").change(function() {
            var categoryId = $(this).val();
            if(categoryId==0){
                allService();
            }else{
                filterService(categoryId);
            }
    });
    
    function filterService(categoryId) {
        $.ajax({
                url: "logic/getService.php",
                method: "GET",
                data: { categoryId: categoryId },
                dataType: "json",
                success: function(response) {
                    prikazUsluga(response);
                },
                error: function(xhr, status, error) {
                    console.error("Ajax request error:", status, error);
                }
        });
    }

    function allService() {
    $.ajax({
            url: "logic/getAllService.php",
            method: "GET",
            dataType: "json",
            success: function(response) {
                prikazUsluga(response);
            },
            error: function(xhr, status, error) {
                console.error("Ajax request error:", status, error);
            }
    });
    }

    function prikazUsluga(usluge) {
        let html = "";
        usluge.forEach(function(usluga) {
            html += `
                <div class="container-fluid flex-column d-flex text-center my-4 dm-h" data-aos="fade-right" data-aos-duration="1500" id="">
                    <div class="icon text-center py-2 mt-3">
                        <i class="${usluga.ikonica}"></i>
                    </div>
                    <h3 class="m-1">${usluga.naziv}</h3>
                    <p class="m-2 text-secondary">${usluga.opis}</p>
    
                    
                   

                    ${!loginObj ? 
                        `<a href="${path}view/pages/login.php"><input type="button" value="Izaberite uslugu" class="btnUsluga" /></a>` :
                        loginObj['id_uloga'] == 1 ?
                            `<input type="button" value="Izaberite uslugu" class="btnUsluga" disabled/>` :
                            `<a href="${path}view/pages/user.php?id=${usluga.id_usluga}"><input type="button" value="Izaberite uslugu" class="btnUsluga" /></a>`
                    }
                    
                </div>`;
        });
        $("#filtered-results").html(html);
        console.log(loginObj);
    }

    $(".btn-usluge").on("click", function (e) {
        e.preventDefault();

        // Dohvatanje id-a korisnika iz data atributa
        var userId = $(this).data("id");
        $.ajax({
            type: "GET",
            url: "../../logic/getAllServiceUser.php", 
            data: { userId: userId },
            success: function (response) {
                if(response.podaci){
                    prikazSvihUslugaKorisnika(response.podaci);
                }
                if(response.error){
                    $("#uslugekorisnik").html("<div class='alert alert-info'><p class='alert-info'>Korisnik još uvek nije izabrao ni jednu uslugu.</p></div>");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        });
    });

    function prikazSvihUslugaKorisnika(usluge){
        let html = "";
            html = `<div class="table-responsive"><table class="mt-5 table table-bordered">
            <tbody> <tr>
                        <td>Ime i prezime</td>
                        <td>Naziv usluge</td>
                        <td>Aktivan</td>
                        <td>Pocetak usluge</td>
                        <td>Aktiviranje/Deaktiviranje</td>
                    </tr>`;
            usluge.forEach(function(usluga) {
                var aktivan = usluga.aktivan == 1? "Aktivan" : "Neaktivan";
                var vreme = aktivan=="Aktivan"? usluga.created_at : "/";
                if(usluga.aktivan == 1){
                    var dugmeAktDeak = `<a href='../../logic/userServiceDeact.php?id=${usluga.id_korisnik}&id_usluga=${usluga.id_usluga}' class='btn btn-danger btn-usluge'>Deaktiviraj<a>`;
                }else{
                    var dugmeAktDeak = `<a href='../../logic/userServiceAcitv.php?id=${usluga.id_korisnik}&id_usluga=${usluga.id_usluga}' class='btn btn-success btn-usluge'>Aktiviraj<a>`;
                }
                html += `
                        <tr>
                            <td>${usluga.imeprezime}</td>
                            <td>${usluga.naziv}</td>
                            <td>${aktivan}</td>
                            <td>${vreme}</td>
                            <td>${dugmeAktDeak}</td>
                            <td><a href='../../logic/deleteServiceUser.php?id_korisnik=${usluga.id_korisnik}&id_usluga=${usluga.id_usluga}' class='btn btn-danger btn-usluge'>Ukloni<a></td>
                        </tr>
                    `;
            });
            html += `</tbody>
            </table></div>`;
       
        
      
        $("#uslugekorisnik").html(html);
        
    }

    $("#btnUpdate").click(function(){

        var selectedCategoryId = $("select[name='ddlKat']").val();
        var newCategoryName = $("#newNameCategory").val();

        if (selectedCategoryId==0 || !newCategoryName) {
            $("#poruka").text("Popunite sva polja.");
            return;
        }

        $.ajax({
            type: "POST",
            url: "../../logic/adminUpdateCategory.php",
            data: {
                categoryId: selectedCategoryId,
                newCategoryName: newCategoryName
            },
            success: function(response) {
                if (response.success) {
                    $("#poruka").text("Uspešno ste promenili kategoriju.");
                } else {
                    $("#poruka").text("Došlo je do greške.");
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX error:", status, error);
            }
        });

        
    });

    function proveriPolje(id, regex) {
        var polje = $("#" + id);

        if (polje.val() === "") {
            polje.css({
                "border": "2px solid red",
                "background": "white"
            });
            polje.attr("placeholder", "Unesite " + id);
            return false;
        }
        if (regex && !regex.test(polje.val())) {
            polje.css({
                "border": "2px solid red",
                "background": "white"
            });
            polje.attr("placeholder", "Neispravan format");
            return false;
        }
    
        polje.css({
            "border": "",
            "background": ""
        });
        polje.attr("placeholder", "");
    
        return true;
    }
    
    function posaljiPodatke() {
        event.preventDefault();
        var imeIspravno = proveriPolje("ime", /^[A-Za-z]{3,}$/);
        var prezimeIspravno = proveriPolje("prezime", /^[A-Za-z]{3,}$/);
        var emailIspravno = proveriPolje("email", /^[^\s@]+@[^\s@]+\.[^\s@]+$/);
    
    
        if (imeIspravno && prezimeIspravno && emailIspravno) {
            $.ajax({
                url: '../../logic/messageSend.php', 
                method: 'POST',
                data: {
                    ime: $("#ime").val(),
                    prezime: $("#prezime").val(),
                    email: $("#email").val(),
                    poruka: $("#poruka2").val() 
                },
                success: function(response) {
                    if(response){
                        $('#odgovor').html('<p class="alert alert-success">Poruka poslata!</p>');
                        setTimeout(function() {
                            $("#odgovor").hide();
                        }, 2000); 
                    }
                },
                error: function(error) {
                    console.error('Greška prilikom slanja podataka:', error);
                }
            });
        }
    }
    
    $("#ime").on("input", function() {
        proveriPolje("ime", /^[A-Za-z]{3,}$/);
    });
    $("#prezime").on("input", function() {
        proveriPolje("prezime", /^[A-Za-z]{3,}$/);
    });
    $("#email").on("input", function() {
        proveriPolje("email", /^[^\s@]+@[^\s@]+\.[^\s@]+$/);
    });
    $("#poruka2").on("input", function() {
        proveriPolje("poruka2"); 
    });
    $("#sendMsg").on("click", function() {
        posaljiPodatke();
    });


    $('#anketa').change(function() {
        var selectedAnketaId = $(this).val();
        if(selectedAnketaId == 0){
            $("#anketaDiv").html("");
        }
        $.ajax({
            type: 'GET',
            url: '../../logic/getQues.php',
            data: { 
                anketaId: selectedAnketaId,
                },
            success: function(data) {
                if(data.error){
                    prikaziOdgovor("Već ste popunili ovu anketu");
                }else{
                    prikaziPitanja(data);
                }
            },
            error: function(error, status) {
                console.log(error);
                console.log(status);
            }
        });
    });
    function prikaziOdgovor(poruka){
        html =`<div class="card">
        <div class="card-header">
           Anketa
       </div>
       <div class="card-body">
        <p class="text-success">${poruka}</p></div> </div>`;
        $("#anketaDiv").html(html);
    }

    function prikaziPitanja(data){
        
            html = `<div class="card">
            <div class="card-header">
               Anketa
           </div>
           <div class="card-body">
            <p><strong>${data[0]['pitanje']}</strong></p>`;
            data.forEach((item) => {
               html += `<input type="radio" name="glas" value="${item['id_odgovor']}" /> ${item['odgovor']}</br>`;
           });
           html+= `<a id="sendReply" class="btn btn-success">Potvrdi</a>
                <div id="potvrda"></div>`;
           $("#anketaDiv").html(html);
    }
    $(document).on('click', '#sendReply', function(event) {
        event.preventDefault();
        sendReply();
    });
    
    function sendReply() {
        var selectedOption = $('input[name="glas"]:checked').val();

        if (selectedOption) {
            $("#potvrda").html("");
            $.ajax({
                type: "POST",
                url: "../../logic/insertReply.php",
                data: { id_odgovor: selectedOption },
                success: function(response) {
                    if(response.success){
                        prikaziOdgovor("Uspešno ste popunili anketu.");
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        } else {
            $("#potvrda").html("<p class='alert alert-danger'>Izaberite vrednost</p>")
        }
    }

});



