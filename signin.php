<?php
session_start();

include "connect.php";
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    
    $match_Query = mysqli_query($con, "SELECT * FROM `signup` WHERE email = '$email' AND password = '$password'");
}
    if(mysqli_num_rows($match_Query)){
        $_SESSION['email'] = "$email";
        $_SESSION['password'] = "$password";
        
        header('location:welcome.php');
    }
    else{ 
        echo
        "<script>
         alert('This Email and password is not matched');
         window.location.href='index.php';
        </script>";       
    }
?>