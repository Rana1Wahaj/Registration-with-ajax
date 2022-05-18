<?php
session_start();
include "connect.php";



if (isset($_POST['register'])) {
    $name = $_POST['uName'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $password = md5($_POST['password']);
    $duplicate_Email = mysqli_query($con, "SELECT * FROM `signup` WHERE email = '$email'");
    if (mysqli_num_rows($duplicate_Email)) {
        echo
        "<script>
         alert('This Email is already taken');
         window.location.href='index.php';
        </script>";
    }
     else {
        mysqli_query($con, "INSERT INTO `signup`(`userName`, `email`, `number`, `password`) VALUES ('$name','$email','$number',md5('$password'))");
        header('location:signin.php');
    }
}

?>
