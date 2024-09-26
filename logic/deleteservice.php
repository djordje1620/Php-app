<?php

header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include "../config/connection.php";
    include "functions.php";
    
    try {
        global $conn;
        $id_korisnik = $_GET['id_korisnik'];
        $id = $_GET['id']; 
        $query = "DELETE FROM user_usluga WHERE id_uu = :id_uu";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(":id_uu", $id);
        $stmt->execute();

        header('Location:../view/pages/user_acount.php?id=' . $id_korisnik);
        exit(); 
    } catch (PDOException $ex) {
        http_response_code(500);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
}
?>
