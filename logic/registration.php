<?php

header("Content-type: application/json");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  

    include "../config/connection.php";
    include "functions.php";
    try{
        $fullname = $_POST["fullname"];
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $errors = [];
        $fullnameRegex = '/^[A-ZŽČĆŠĐ][a-zžčćšđ]{3,}(\s[A-ZŽČĆŠĐ][a-zžčćšđ]{3,})+$/';
        $usernameRegex = "/^[A-Za-z0-9\.\_]{6,}$/";
        $emailRegex = "/^[a-z][a-z0-9\.]{3,}@([a-z0-9]{3,}\.)+([a-z]){1,}$/";
        $passwordRegex = "/^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";

        if(count(formCheck($fullname, $fullnameRegex, "Name and surname"))!=0){
            $errors[] = formCheck($fullname, $fullnameRegex, "Name and surname");
        }
        if(count(formCheck($username, $usernameRegex, "Username"))!=0){
            $errors[] = formCheck($username, $usernameRegex, "Username");
        }
        if(count(formCheck($email, $emailRegex, "Email"))!=0){
            $errors[] = formCheck($email, $emailRegex, "Email");
        }
        if(count(formCheck($password, $passwordRegex, "Password"))!=0){
            $errors[] = formCheck($password, $passwordRegex, "Password");
        }
        if(count($errors) == 0){

            $codedPassword = md5($password);
            $idRole = 2;
            $insertUser = insertUser($fullname, $email, $username, $codedPassword, $idRole);

            if($insertUser){
                $response = ["message"=>"Successful registration."];
                echo json_encode($response);
                http_response_code(201);
            }
        }
        else{
            $response = ["message" => "Internal Server Error", "errors" =>$errors];
            echo json_encode($response);
            http_response_code(500);
            error_log("Internal Server Error: " . json_encode($errors));
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
