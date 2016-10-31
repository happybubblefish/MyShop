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
        echo "
            <div class='alert alert-warning'>
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><b>Please fill all fields.</b>
            </div>
        ";
        exit();
    }else{
        if(!preg_match($nameValidation, $firstname)){
            echo "$firstname is not a valid first name";
            exit();
        }

        if(!preg_match($nameValidation, $lastname)){
            echo "$lastname is not a valid last name";
            exit();
        }

        if(!preg_match($emailValidation, $email)){
            echo "$email is not a valid email";
            exit();
        }

        if(strlen($password) < 9){
            echo "Password is weak.";
            exit();
        }

        if(strlen($confirmpassword) < 9){
            echo "Re-entered password is weak.";
            exit();
        }

        if($password != $confirmpassword){
            echo "Two passwords are different.";
        }

        if(!preg_match($numberValidation, $mobile)){
            echo "Mobile number $mobile is not valid";
            exit();
        }

        if(strlen($mobile) != 10){
            echo "Mobile number should be 10 digits.";
            exit();
        }
    }

    $query = "SELECT user_id from user where email='$email' LIMIT 1";
    $run_query = mysqli_query($conn, $query);
    $count_email = mysqli_num_rows($run_query);

    if(@count_email > 0){
        echo "Email adress is already available, try another email address.";
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
            echo "You are registered successfully.";
        }
    }
?>