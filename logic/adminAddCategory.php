<?php

header("Content-type: application/json");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    include "../config/connection.php";
    include "functions.php";
    try{
        if(!empty($_POST['kategorija'])){
            $kategorija = $_POST['kategorija'];
            global $conn;
            $query = "INSERT INTO kategorije (naziv) VALUES (:naziv)";
            $prep = $conn->prepare($query);
            $prep->bindParam(":naziv", $kategorija);
            $result = $prep->execute();
    
            if ($result) {
                $_SESSION['message'] = 'Uspesno dodata kategorija.';
            } else {
                $_SESSION['message'] = 'Doslo je do greske prilikom dodavanja kategorije.';
            }
            header('Location: ../view/pages/adminpanel.php');
            exit();
        }
        else{
            $_SESSION['message'] = 'Unesite kategoriju!';
            header('Location: ../view/pages/adminpanel.php');
            exit();
        }
    }
    catch(PDOException $ex){
        $_SESSION['message'] = 'Doslo je do greske prilikom slanja zahteva.';
        header('Location: ../view/pages/adminpanel.php');
        exit();
    }
}
else{
    http_response_code(404);
}
?>