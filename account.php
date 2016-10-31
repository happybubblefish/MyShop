<?php
    include "db.php";

    session_start();

    if(isset($_POST["login"])){
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        $password = md5($_POST["password"]);
        
        $query = "SELECT * from user where email = '$email' and password = '$password'";
        $run_query = mysqli_query($conn, $query);
        $count_user = mysqli_num_rows($run_query);
        
        if($count_user == 1){
            $row = mysqli_fetch_array($run_query);
            $_SESSION["user_id"] = $row["user_id"];
            $_SESSION["firstname"] = $row["first_name"];
            
            echo "success";
        }
    }

    if(isset($_GET["logout"])){
        session_destroy(); 
        echo "destroyed";
    }
?>