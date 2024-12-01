<?php 
session_start(); 
include "connection.php";
$conn = OpenCon();


if (isset($_POST['firstname']) &&  isset($_POST['lastname'])  &&  isset($_POST['password']) && isset($_POST['username']) && isset($_POST['category'])) {
    function validate($data){ 
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $uname = validate($_POST['username']);
    $first = validate($_POST['firstname']);
    $last = validate($_POST['lastname']);
    $type = validate($_POST['category']);

    $pass = validate($_POST['password']);

        $sql = "SELECT * FROM user WHERE username='$uname' ";
        $result2 = mysqli_query($conn, $sql);


        if (mysqli_num_rows($result2) === 1) {
                header("Location: register.php?error=Username or email is already taken.");
                exit();
            
        }else{
            $sql = "INSERT INTO user (username, firstname,lastname, password, type) VALUES ('$uname','$first','$last', '$pass', '$type')";
            if (mysqli_query($conn, $sql)) {
                header("Location: register.php?success=Account created.");
            } else {
                header("Location: register.php?error=Error creating new account.");

            }
        }
    
}