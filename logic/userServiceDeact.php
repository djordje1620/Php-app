<?php

header("Content-type: application/json");

if($_SERVER["REQUEST_METHOD"] == "GET"){

    include "../config/connection.php";
    include "functions.php";
    try{
        
        $id_korisnik = $_GET['id'];
        $id_usluga = $_GET['id_usluga'];
        $vreme_aktivacije = date("Y-m-d H:i:s");
        $query = "UPDATE user_usluga SET aktivan = 0 WHERE id_user = :id_user AND id_usluga = :id_usluga";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id_user", $id_korisnik);
        $stmt->bindParam(":id_usluga", $id_usluga);
        $stmt->execute();

        header('Location:../view/pages/adminpanel.php');
        exit(); 
    }
    catch(PDOException $ex){
        http_response_code(500);
    }
}
else{
    http_response_code(404);
}
?>
