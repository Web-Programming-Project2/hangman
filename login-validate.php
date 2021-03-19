<?php
    //sessions are used to validate passwords
    require_once('connection.php');
    session_start(); 

    if(isset($_POST['login'])){
        if(empty($_POST['username']) || empty($_POST['password'])){
            header("location:login.php?Empty= Please Fill in the Blanks");
        }
        else{
            $query = "select * from users where username= '".$_POST['username']."' and password= '".$_POST['password']."'";
            $result = mysqli_query($con, $query);

            if(mysqli_fetch_assoc($result)){
                $_SESSION['User'] = $_POST['username'];
                header("location:Hangman.php");
            }else{
                header("location:login.php?Invalid= Please Enter Correct Username or Password");
            }
        }
    }else{
        echo 'Error';
    }
?>