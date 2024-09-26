<?php
session_start();
header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "../config/connection.php";
    include "functions.php";

    try {
        $categoryId = $_POST['categoryId'];
        $newCategoryName = $_POST['newCategoryName'];

       if($categoryId != 0 && !empty($newCategoryName)){

            $query = "UPDATE kategorije SET naziv = :novi_naziv WHERE id_kategorija = :id_kategorija";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id_kategorija", $categoryId, PDO::PARAM_INT);
            $stmt->bindParam(":novi_naziv", $newCategoryName, PDO::PARAM_STR);
            $result = $stmt->execute();
            
            // Primer odgovora
            $response = ["success" => true];
            echo json_encode($response);
            http_response_code(200);
       }
       else{
           // Primer odgovora
           $response = ["success" => false];
           echo json_encode($response);
           http_response_code(400);
       }

     
    } catch (PDOException $ex) {
        $response = ["success" => false];
        echo json_encode($response);
        http_response_code(500);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
}
?>
