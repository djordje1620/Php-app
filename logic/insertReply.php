<?php
session_start();
header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    include "../config/connection.php";
    include "functions.php";

    try {
        
        global $conn;
        $message = "";
        $login = false;

        if(isset($_SESSION["user"])){
            $login = $_SESSION["user"];
        }
        if(isset($_SESSION["admin"])){
            $login = $_SESSION["admin"];
        }

        $id = $login->id_korisnik;  
        $id_odgovor = $_POST['id_odgovor'];
        $query = "INSERT INTO glasanje (id_korisnik, id_odgovor) VALUES (:id_korisnik, :id_odgovor)";
        $prep = $conn->prepare($query);
        $prep->bindParam(":id_korisnik", $id);
        $prep->bindParam(":id_odgovor", $id_odgovor);
        $prep->execute();
        $result = $prep->fetchAll();

        http_response_code(200);
        echo json_encode(["success" => "Uspešan unos"]);     
           
    } catch (PDOException $ex) {
        http_response_code(500);
        echo json_encode(["error" => $ex->getMessage()]);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
}
?>
