<?php

header("Content-type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    include "../config/connection.php";
    include "functions.php";

    try {
        global $conn;
        $id = $_GET['categoryId']; 
        $query = "SELECT *,u.naziv FROM usluge u INNER JOIN usluga_kategorija uk ON u.id_usluga=uk.id_usluga INNER JOIN kategorije k ON uk.id_kategorija=k.id_kategorija WHERE k.id_kategorija=:id_kategorija";
        $prep = $conn->prepare($query);
        $prep->bindParam(":id_kategorija", $id, PDO::PARAM_INT); 
        $prep->execute();
        $result = $prep->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($result);
    } catch (PDOException $ex) {
        http_response_code(500);
        echo json_encode(["error" => $ex->getMessage()]);
    }
} else {
    http_response_code(404);
    echo json_encode(["error" => "Not Found"]);
}
?>
