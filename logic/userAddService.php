<?php

header("Content-type: application/json");
session_start();

if($_SERVER["REQUEST_METHOD"] == "GET"){

    include "../config/connection.php";
    include "functions.php";
    try{
        $id_korisnik = $_GET['id_korisnik'];
        $id_usluga = $_GET['id'];
        if(!empty($id_korisnik) && !empty($id_usluga)){

            $query = "SELECT * FROM user_usluga WHERE id_user = :id_korisnik AND id_usluga = :id_usluga";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id_korisnik", $id_korisnik);
            $stmt->bindParam(":id_usluga", $id_usluga);
            $stmt->execute();
 
            if ($stmt->rowCount() > 0) {
                 $_SESSION['poruka'] = 'Vec ste izabrali ovu uslugu';
                 header('Location:../view/pages/user.php?id=' . $id_usluga);
                 exit();
            }
            
            $insertUser = insertUserService($id_korisnik, $id_usluga);
            if ($insertUser == true) {
                header('Location:../view/pages/user_acount.php?id=' . $id_korisnik);
                exit();
            }

        }else{
            header("Location:../index.php");
            exit(); 
        }
    }
    catch(PDOException $ex){
        http_response_code(500);
    }
}
else{
    http_response_code(404);
}
?>
