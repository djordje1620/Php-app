<?php

function selectQuery($table){
    global $conn;
    $query = $conn->query("SELECT * FROM $table");
    return $query->fetchAll();
}

//DOHVATANJE NAVIGACIJE
function getNav(){
    include('url.php');
    $navLinks = selectQuery("menu");
    $navLinksString = "";
    $url = explode('/', $_SERVER['REQUEST_URI']);

    foreach($navLinks as $link){
        
    $navLinksString .= "
        <a class='nav-link text-light  text-uppercase' href='";
    if($link->id_meni == 1){
        $navLinksString .= $path."$link->putanja.php";
    }
    else{
        $navLinksString .= $path."view/pages/$link->putanja.php";
    }
        $navLinksString .= "'>$link->naziv</a>";
    }
    return $navLinksString;
}

//VALIDACIJA
function formCheck($data, $regex, $string){
    $errors = [];
    if(empty($data)){
    array_push($errors, "Field ".$string." must not be empty");
    }
    else if(!preg_match($regex, $data)){
    array_push($errors, $string." is not in the correct format");
    }
    else {
    $errors = [];
    }
    return $errors;
}

// REGISTRACIJA
function insertUser($fullname, $email, $username, $password, $idRole){
    global $conn;
    $query = "INSERT INTO users (imeprezime, email, username, password_hash,
    id_uloga) VALUES (:imeprezime, :email, :username, :password_hash, :id_uloga)";
    $prep = $conn->prepare($query);
    $prep->bindParam(":imeprezime", $fullname);
    $prep->bindParam(":email", $email);
    $prep->bindParam(":username", $username);
    $prep->bindParam(":password_hash", $password);
    $prep->bindParam(":id_uloga", $idRole);
    $result = $prep->execute();
    return $result;
}

//LOGIN
function loginCheck($username, $codedPassword){
    global $conn;
    $query = "SELECT * FROM users u JOIN roles r ON u.id_uloga = r.id_uloga
    WHERE u.username = :username AND u.password_hash = :password";
    $prep = $conn->prepare($query);
    $prep->bindParam(":username", $username);
    $prep->bindParam(":password", $codedPassword);
    $prep->execute();
    $result = $prep->fetch();
    return $result;
} 
//DOHVATANJE JEDNE USLUGE
function getService($id){
    global $conn;
    $query = "SELECT * FROM usluge WHERE id_usluga = :id_usluga";
    $prep = $conn->prepare($query);
    $prep->bindParam(":id_usluga", $id);
    $prep->execute();
    $result = $prep->fetch();
    return $result;
}
//DOHVATANJE KORISNIKA
function getAcount($id){
    global $conn;
    $query = "SELECT * FROM users u INNER JOIN roles r ON u.id_uloga=r.id_uloga  WHERE id_korisnik = :id_korisnik";
    $prep = $conn->prepare($query);
    $prep->bindParam(":id_korisnik", $id);
    $prep->execute();
    $result = $prep->fetch();
    return $result;
}
//DOHVATANJE KORISNIKA I USLUGA
function getUserService($id){
    global $conn;
    $query = "SELECT * FROM users u INNER JOIN user_usluga uu ON u.id_korisnik=uu.id_user INNER JOIN usluge us ON uu.id_usluga=us.id_usluga INNER JOIN cenovnik c ON us.id_usluga=c.id_usluga WHERE uu.id_user=:id_user GROUP BY uu.id_usluga";
    $prep = $conn->prepare($query);
    $prep->bindParam(":id_user", $id);
    $prep->execute();
    $result = $prep->fetchAll();
    return $result;
}
//BROJ DANA TRAJANJA USLUGE
function timeleft($timeCreated){
    $timeC = strtotime($timeCreated);
    $trenutni_datum = time();
    // Dodajemo 30 dana u sekundama (30 dana * 24 sata * 60 minuta * 60 sekundi)
    $datum_isteka = $timeC + (30 * 24 * 60 * 60);

    // Računamo razliku u sekundama
    $razlika_u_sekundama = $datum_isteka - $trenutni_datum;

    // Pretvaramo razliku u dane
    $preostalo_dana = floor($razlika_u_sekundama / (24 * 60 * 60));
    echo $preostalo_dana;
}
//ADD SERVICE
function insertUserService($id_user, $id_usluga){
    global $conn;
    $query = "INSERT INTO user_usluga (id_user, id_usluga) VALUES (:id_user, :id_usluga)";
    $prep = $conn->prepare($query);
    $prep->bindParam(":id_user", $id_user);
    $prep->bindParam(":id_usluga", $id_usluga);
    $result = $prep->execute();
    return $result;
}
//DOHVATANJE SVIH KORISNIKA
function getUsers(){
    global $conn;
    $query = "SELECT * FROM users WHERE id_uloga = 2";
    $prep = $conn->prepare($query);
    $prep->execute();
    $result = $prep->fetchAll();
    return $result;
}
//DOHVATANJE KORISNIKA I USLUGA
function getAllServiceUser($id){
    global $conn;
    $query = "SELECT *,uu.created_at FROM users u INNER JOIN user_usluga uu ON u.id_korisnik=uu.id_user INNER JOIN usluge us ON uu.id_usluga=us.id_usluga WHERE uu.id_user=:id_user";
    $prep = $conn->prepare($query);
    $prep->bindParam(":id_user", $id);
    $prep->execute();
    $result = $prep->fetchAll();
    return $result;
}

function dohvatiAnketu(){
    global $conn;
    $query = "SELECT * FROM users u INNER JOIN glasanje g ON u.id_korisnik=g.id_korisnik INNER JOIN odgovori o ON g.id_odgovor=o.id_odgovor INNER JOIN pitanja p ON o.id_pitanje=p.id_pitanje INNER JOIN anketa_pitanje ap ON p.id_pitanje=ap.id_pitanje INNER JOIN anketa a ON ap.id_anketa=a.id_anketa WHERE u.id_uloga=2 ";
    $prep = $conn->prepare($query);
    $prep->execute();
    $result = $prep->fetchAll();
    return $result;
}

function dohvatiSveAnkete(){
    global $conn;
    $query = "SELECT * FROM anketa WHERE aktivna=1";
    $prep = $conn->prepare($query);
    $prep->execute();
    $result = $prep->fetchAll();
    return $result;
}

function dohvatiPodatkeZaStatistiku(){
    global $conn;
    $query = "SELECT o.id_odgovor, o.odgovor as odgovor, COUNT(*) as broj_glasova, a.naziv, p.pitanje as pitanje_text, o.odgovor as odgovor_text
    FROM glasanje g
    INNER JOIN odgovori o ON g.id_odgovor = o.id_odgovor
    INNER JOIN pitanja p ON o.id_pitanje = p.id_pitanje
    INNER JOIN anketa_pitanje ap ON p.id_pitanje = ap.id_pitanje
    INNER JOIN anketa a ON ap.id_anketa = a.id_anketa
    WHERE a.naziv='Anketa 1'
    GROUP BY o.id_odgovor";
    $prep = $conn->prepare($query);
    $prep->execute();
    $result = $prep->fetchAll();
    return $result;
}
function getUserImg($id){
    global $conn;
    $query = "SELECT * FROM user_slika us INNER JOIN users u ON us.id_user=u.id_korisnik WHERE us.id_user=:id_user";
    $prep = $conn->prepare($query);
    $prep->bindParam(":id_user", $id);
    $prep->execute();
    $result = $prep->fetch();
    return $result;
}