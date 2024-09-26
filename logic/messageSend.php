<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "../config/connection.php";
        include "functions.php";

        $errors = [];

        $ime = $_POST['ime'];
        $prezime = $_POST['prezime'];
        $email = $_POST['email'];
        $poruka = $_POST['poruka'];
        $ip_adresa = $_SERVER['REMOTE_ADDR'];

        if (empty($ime) || !preg_match("/^[a-zA-Z]{3,}$/", $ime)) {
            $errors[] = "Neispravno ime";
        }
        if (empty($prezime) || !preg_match("/^[a-zA-Z]{3,}$/", $prezime)) {
            $errors[] = "Neispravno prezime";
        }
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Neispravna email adresa";
        }
        if (empty($poruka)) {
            $errors[] = "Unesite poruku";
        }

        if (empty($errors)) {
            try {

                $query = "INSERT INTO poruke (ime, prezime, email, poruka, ip_adresa) VALUES (:ime, :prezime, :email, :poruka, :ip_adresa)";
                $stmt = $conn->prepare($query);
                $stmt->bindParam(':ime', $ime);
                $stmt->bindParam(':prezime', $prezime);
                $stmt->bindParam(':email', $email);
                $stmt->bindParam(':poruka', $poruka);
                $stmt->bindParam(':ip_adresa', $ip_adresa);  
                $stmt->execute();

                $response = ["success" => "Podaci su uspešno poslati"];
                echo json_encode($response);
                http_response_code(200);
            } catch (PDOException $exception) {
                $error_message = $exception->getMessage();
                $response = ["error" => $error_message];
                echo json_encode($response);
                http_response_code(500);
            }
        } else {
            $response = ["error" => $errors];
            echo json_encode($response);
            http_response_code(400);
        }
    } else {
        http_response_code(404);
    }
?>
