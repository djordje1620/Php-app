<?php

header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include "../config/connection.php";
    include "functions.php";

    try {
        global $conn;
        $id_korisnik = $_GET['id'];

        $checkQuery = "SELECT * FROM users WHERE id_korisnik = :id_korisnik";
        $checkStmt = $conn->prepare($checkQuery);
        $checkStmt->bindParam(":id_korisnik", $id_korisnik);
        $checkStmt->execute();

        if ($checkStmt->rowCount() == 0) {
            echo json_encode(["error" => "Korisnik ne postoji."]);
            http_response_code(404);
            exit();
        }

        // Početak transakcije
        $conn->beginTransaction();

        try {
            $query = "DELETE FROM user_usluga WHERE id_user = :id_korisnik";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id_korisnik", $id_korisnik);
            $stmt->execute();

            $query1 = "DELETE FROM users WHERE id_korisnik = :id_korisnik";
            $stmt1 = $conn->prepare($query1);
            $stmt1->bindParam(":id_korisnik", $id_korisnik);
            $stmt1->execute();

            $conn->commit();

            header('Location:../view/pages/adminpanel.php');
            exit();
        } catch (PDOException $ex) {
            $conn->rollBack();
            var_dump($ex);
            http_response_code(500);
            exit();
        } 
    } catch (PDOException $ex) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
}
?>
