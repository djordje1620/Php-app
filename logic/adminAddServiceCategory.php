<?php

header("Content-type: application/json");
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
  
    include "../config/connection.php";
    include "functions.php";
    try{
        if(!empty($_POST['ddlKat']) && !empty($_POST['ddlUsluga'])){
            
            $id_kategorija = $_POST['ddlKat'];
            $id_usluga = $_POST['ddlUsluga'];

            // echo $id_kategorija;
            // echo $id_usluga;
            global $conn;
            $query = "INSERT INTO usluga_kategorija (id_usluga, id_kategorija) VALUES (:id_usluga, :id_kategorija)";
            $prep = $conn->prepare($query);
            $prep->bindParam(":id_usluga", $id_usluga);
            $prep->bindParam(":id_kategorija", $id_kategorija);
            $result = $prep->execute();
    
            if ($result) {
                $_SESSION['message3'] = 'Uspesno ste povezali usluge i kategorije';
            } else {
                $_SESSION['message3'] = 'Doslo je do greske prilikom dodavanja usluge.';
            }
            header('Location: ../view/pages/adminpanel.php');
            exit();
        }
        else{
            $_SESSION['message3'] = 'Izaberite sva polja!';
            header('Location: ../view/pages/adminpanel.php');
            exit();
        }
    }
    catch(PDOException $ex){
        $_SESSION['message3'] = 'Doslo je do greske prilikom slanja zahteva.';
        header('Location: ../view/pages/adminpanel.php');
        exit();
    }
}
else{
    http_response_code(404);
}
?>