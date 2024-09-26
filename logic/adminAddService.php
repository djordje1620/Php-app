<?php

header("Content-type: application/json");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    include "../config/connection.php";
    include "functions.php";
    try{
        if(!empty($_POST['nazivUsluge']) && !empty($_POST['ikonica']) && !empty($_POST['opis'])){
            
            $nazivUsluge = $_POST['nazivUsluge'];
            $ikonica = $_POST['ikonica'];
            $opis = $_POST['opis'];

            global $conn;
            $query = "INSERT INTO usluge (naziv, ikonica, opis) VALUES (:nazivUsluge, :ikonica, :opis)";
            $prep = $conn->prepare($query);
            $prep->bindParam(":nazivUsluge", $nazivUsluge);
            $prep->bindParam(":ikonica", $ikonica);
            $prep->bindParam(":opis", $opis);
            $result = $prep->execute();
    
            if ($result) {
                $_SESSION['message2'] = 'Uspesno dodata usluga.';
            } else {
                $_SESSION['message2'] = 'Doslo je do greske prilikom dodavanja usluge.';
            }
            header('Location: ../view/pages/adminpanel.php');
            exit();
        }
        else{
            $_SESSION['message2'] = 'Morate popuniti sva polja!';
            header('Location: ../view/pages/adminpanel.php');
            exit();
        }
    }
    catch(PDOException $ex){
        $_SESSION['message2'] = 'Doslo je do greske prilikom slanja zahteva.';
        header('Location: ../view/pages/adminpanel.php');
        exit();
    }
}
else{
    http_response_code(404);
}
?>