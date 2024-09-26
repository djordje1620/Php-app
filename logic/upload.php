<?php
include "url.php";
session_start();
$login = $_SESSION["user"];
$id_korisnik = $login->id_korisnik; 

if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_FILES["fileToUpload"]["tmp_name"])) {

    include "../config/connection.php";
    include "functions.php";
    global $conn;

    $targetDir = "../assets/img/"; 
    $targetFile = $targetDir . basename($_FILES["fileToUpload"]["name"]);

    $valid = true;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            $valid = true;
        } else {
            $valid = false;
        }
    }

    // Provera da li slika već postoji
    if (file_exists($targetFile)) {
        $_SESSION['error'] = "Slika već postoji.";
        header('Location:../view/pages/user_acount.php');
        exit;
    }

        // Provera veličine slike
    if ($_FILES["fileToUpload"]["size"] > 5000000) { // 5MB limit
        $_SESSION['error'] = "Slika je prevelika.";
        header('Location:../view/pages/user_acount.php');
        exit;
    }

    
    if ($valid) {
        if(isset($_SESSION["user"])){
            $login = $_SESSION["user"];
            $id_korisnik = $login->id_korisnik; 
            $naziv_slike = basename($_FILES["fileToUpload"]["name"]); 
            $query = "INSERT INTO user_slika (id_user, slika) VALUES (:id_korisnik, :naziv_slike)";
            $prep = $conn->prepare($query);
            $prep->bindParam(":id_korisnik", $id_korisnik);
            $prep->bindParam(":naziv_slike", $naziv_slike);
            $prep->execute();
    
            if ($prep) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
                    header('Location:../view/pages/user_acount.php?id=' . $id_korisnik);
                    exit; 
                } else {
                    $_SESSION['error'] = "Došlo je do greške prilikom upload-a slike.";
                    header('Location:../view/pages/user_acount.php');
                    exit;
                }
            } else {
                $_SESSION['error'] = "Došlo je do greške prilikom izvršavanja upita.";
                header('Location:../view/pages/user_acount.php');
                exit;
            }
        } else {
            $_SESSION['error'] = "Morate biti prijavljeni da biste dodali sliku.";
            header('Location:../view/pages/user_acount.php');
            exit;
        }
    }
}else{
    $_SESSION['error'] = "Unesite sliku!";
    header('Location:../view/pages/user_acount.php?id='.$id_korisnik);
    exit;
}
?>
