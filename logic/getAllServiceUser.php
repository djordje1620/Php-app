<?php

header("Content-type: application/json");

if($_SERVER["REQUEST_METHOD"] == "GET"){
  

    include "../config/connection.php";
    include "functions.php";
    try{
        $id_korisnik = $_GET['userId'];
        $getAllServiceUser = getAllServiceUser($id_korisnik);

        if($getAllServiceUser){
                $response = ["podaci"=>$getAllServiceUser];
                echo json_encode($response);
                http_response_code(201);
        }else{
            $response = ["error"=>'korisnik nije izabrao usluge'];
            echo json_encode($response);
            http_response_code(201);
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
