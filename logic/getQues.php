<?php
session_start();
header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

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
        $id_anketa = $_GET['anketaId'];
        if($id){
            $query = "SELECT * FROM glasanje g INNER JOIN odgovori o ON g.id_odgovor=o.id_odgovor INNER JOIN pitanja p ON o.id_pitanje=p.id_pitanje INNER JOIN anketa_pitanje ap ON p.id_pitanje=ap.id_pitanje INNER JOIN anketa a ON ap.id_anketa=a.id_anketa WHERE g.id_korisnik = :id_korisnik AND a.id_anketa = :id_anketa AND a.aktivna=1 GROUP BY ap.id_pitanje";
            $prep = $conn->prepare($query);
            $prep->bindParam(":id_korisnik", $id);
            $prep->bindParam(":id_anketa", $id_anketa);
            $prep->execute();
            $result = $prep->fetchAll();


            if ($result) {
                $message = "Već ste popunili ovu anketu!";
                echo json_encode(["error" => $message]);
            } else {
                $query1 = "SELECT * FROM anketa a INNER JOIN anketa_pitanje ap ON a.id_anketa=ap.id_anketa INNER JOIN pitanja p ON ap.id_pitanje=p.id_pitanje INNER JOIN odgovori o ON p.id_pitanje=o.id_pitanje WHERE aktivna = 1 && a.id_anketa = :id_anketa GROUP BY o.id_odgovor";
                $prep1 = $conn->prepare($query1);
                $prep1->bindParam(":id_anketa", $id_anketa);
                $prep1->execute();
                $result1 = $prep1->fetchAll(PDO::FETCH_ASSOC);
                echo json_encode($result1);
            }
        } else {
            echo json_encode(["error" => "Niste prijavljeni"]);
        }
    } catch (PDOException $ex) {
        http_response_code(500);
        echo json_encode(["error" => $ex->getMessage()]);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
}
?>
