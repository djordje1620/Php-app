<?php
    session_start();
    header("Content-type: application/json");
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        include "../config/connection.php";
        include 
        include "functions.php";
        try{
            $username = $_POST["username"];
            $password = $_POST["password"];
            $usernameRegex = "/^[A-Za-z0-9\.\_]{6,}$/";
            $passwordRegex = "/^(?=.*?[A-Za-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/";
            
            if(!preg_match($usernameRegex, $username)){
                header("Location:../view/pages/login.php?error=Invalid%20username.");
                http_response_code(400);
                exit;
            }
            if(!preg_match($passwordRegex, $password)){
                header("Location:../view/pages/login.php?error=Invalid%20password.");
                http_response_code(400);
                exit;
            }

            $codedPassword = md5($password);
            $userObj = loginCheck($username, $codedPassword);
            if($userObj){
                if($userObj->naziv == "admin"){
                    $_SESSION["admin"] = $userObj;
                }
                else {
                    $_SESSION["user"] = $userObj;
                }
                $response = ["role"=>$userObj->naziv];
                echo json_encode($response);
                http_response_code(200);
            }
            else{
                echo json_encode(["error" => "Invalid credentials."]);
                http_response_code(401);
                exit;
            }
        }
        catch(PDOException $exception){
            $error_message = $exception->getMessage();
            $response = ["error" => $error_message];
            echo json_encode($response);
            http_response_code(400); 
        }
    }
    else{
        http_response_code(404);
    }
?>