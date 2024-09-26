<?php

header("Content-type: application/json");
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../config/connection.php";
    include "functions.php";

    try {
        if(!empty($_POST['ddlKat'])){
            global $conn;
            $id_kategorija= $_POST['ddlKat'];
    
            // Provera postojanja kategorije pre brisanja
            $checkQuery = "SELECT * FROM kategorije WHERE id_kategorija = :id_kategorija";
            $checkStmt = $conn->prepare($checkQuery);
            $checkStmt->bindParam(":id_kategorija", $id_kategorija);
            $checkStmt->execute();
    
            if ($checkStmt->rowCount() == 0) {
                $_SESSION['message4'] = 'Kategorija ne postoji';
                header('Location: ../view/pages/adminpanel.php');
                exit();
            }
    
            $conn->beginTransaction();
    
            try {
                $query = "DELETE FROM usluga_kategorija WHERE id_kategorija = :id_kategorija";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(":id_kategorija", $id_kategorija);
                $stmt->execute();
    
                $query1 = "DELETE FROM kategorije WHERE id_kategorija = :id_kategorija";
                $stmt1 = $conn->prepare($query1);
                $stmt1->bindParam(":id_kategorija", $id_kategorija);
                $stmt1->execute();
    
                $conn->commit();
                $_SESSION['message4'] = 'Uspesno ste obrisali kategoriju.';
    
                header('Location:../view/pages/adminpanel.php');
                exit();
            } catch (PDOException $ex) {
                $conn->rollBack();
                $_SESSION['message4'] = 'Došlo je do greške.';
                header('Location:../view/pages/adminpanel.php');
                exit();
            } 
        }
        else{
            $_SESSION['message4'] = 'Izaberite polje!';
            header('Location: ../view/pages/adminpanel.php');
            exit();
        }
    } catch (PDOException $ex) {
        http_response_code(500);
        var_dump($ex);
    }
} else {
    http_response_code(404);
}
?>
