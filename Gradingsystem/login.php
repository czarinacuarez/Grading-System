<?php 
session_start(); 
include "connection.php";
$conn = OpenCon();


if (isset($_POST['username']) && isset($_POST['password'])) {
    function validate($data){
       $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $uname = validate($_POST['username']);
    $pass = validate($_POST['password']);

        $sql = "SELECT * FROM user WHERE  username = '$uname' AND password= '$pass'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ( $row['username'] === $uname && $row['password'] === $pass) {
                $_SESSION['password'] = $row['password'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $row['username'];
                $_SESSION['type'] = $row['type'];

                $_SESSION['id'] = $row['id'];

                if ($_SESSION['type'] == 'Admin'){
                    header("Location: admin.php");
                    exit();
                }else{
                    header("Location: user.php");
                    exit();
                }
            }else{
                header("Location: index.php?error=Incorect Username or password");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorect Username or password");
            exit();
        }
    
}else{
    header("Location: index.php");
    exit();
}