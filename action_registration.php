<?php
    
    include "db.php";

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmpassword = $_POST["confirmpassword"];
    $mobile = $_POST["mobile"];
    $address1 = $_POST["address1"];
    $address2 = $_POST["address2"];
    $nameValidation = "/^[A-Z][a-zA-Z]+$/";
    $emailValidation = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9]+(\.[a-z]{2,4})$/";
    $numberValidation = "/^[0-9]+$/";
 
    if(empty($firstname) || empty($lastname) || empty($email) || empty($password) ||
      empty($confirmpassword) || empty($mobile) || empty($address1) || empty($address2)){
        echo 
            "<div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill all fields.</b>
            </div>";
        
        exit();
    }else{
        if(!preg_match($nameValidation, $firstname)){
            echo 
                "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>$firstname is not a valid first name.</b>
                </div>";
            exit();
        }

        if(!preg_match($nameValidation, $lastname)){
            echo 
                "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>$lastname is not a valid last name.</b>
                </div>";
            exit();
        }

        if(!preg_match($emailValidation, $email)){
            echo 
                "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>$email is not a valid email.</b>
                </div>";
            exit();
        }

        if(strlen($password) < 9){
            echo 
                "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Password is weak.</b>
                </div>";
            exit();
        }

        if(strlen($confirmpassword) < 9){
            echo 
                "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Re-entered password is weak.</b>
                </div>";
            exit();
        }

        if($password != $confirmpassword){
            echo 
                "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Two passwords are different.</b>
                </div>";
        }

        if(!preg_match($numberValidation, $mobile)){
            echo 
                "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Mobile number $mobile is not valid.</b>
                </div>";
            exit();
        }

        if(strlen($mobile) != 10){
            echo 
                "<div class='alert alert-warning'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>Mobile number should be 10 digits.</b>
                </div>";
            exit();
        }
    }

    $query = "SELECT user_id from user where email='$email' LIMIT 1";
    $run_query = mysqli_query($conn, $query);
    $count_email = mysqli_num_rows($run_query);

    if($count_email > 0){
        echo 
            "<div class='alert alert-danger'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <b>Email adress is already available, try another email address.</b>
            </div>";
        exit();
    }else{
        $password = md5($password);
        
        /* Quotation mark is very important. */
        $query = "INSERT INTO `user` 
            (`user_id`, `first_name`, `last_name`, 
            `email`, `password`, `mobile`, 
            `address1`, `address2`) 
            VALUES 
            (NULL, '$firstname', '$lastname', 
            '$email', '$password', 
            '$mobile', '$address1', '$address2');";
        
        $run_query = mysqli_query($conn, $query);
        
        if($run_query){
            echo 
                "<div class='alert alert-success'>
                    <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                    <b>You are registered successfully.</b>
                </div>";
        }
    }
?>