<?php
    include_once("../CRUDE/fetch.php");

    $email= $_POST['email'];
    $password= $_POST['password'];

    if(isset($_POST["submit"])){
        $hashed = md5($password);
        $crud = new CRUD("vendor");
        $crud->where = "WHERE v_email = '$email' AND v_password = '$hashed'";
        $res = $crud->read();
        $row = $res->fetch_assoc();
        if($res->num_rows > 0){
            session_start();
            echo "Welcome ".$row['v_name'];
            $_SESSION['v_name'] = $row['v_name'];
            $_SESSION['v_email'] = $row['v_email'];
            $_SESSION['v_phone'] = $row['v_phone'];
            $_SESSION['v_address'] = $row['v_address'];
            $_SESSION['v_code'] = $row['v_code'];
            header("Location: ../index.php");
        }else{
            header("Location: index.html");
        }
    }
?>