<?php
    include_once("../CRUDE/fetch.php");

    $name= $_POST['name'];
    $email= $_POST['email'];
    $phone= $_POST['phone'];
    $password= $_POST['password'];
    $address = $_POST['address'];

    if(isset($_POST["submit"])){
        $hashed = md5($password);
        $v_code = random_int(1, 9999999);
        $crud = new CRUD("vendor");
        $crud->fields = "v_name, v_email, v_phone, v_password, v_address, v_code";
        $crud->values = "'$name', '$email', '$phone', '$hashed', '$address' , '$v_code'";
        $res = $crud->create();

        if($res == "request processed successfully!"){
            header("Location: ../login/index.html");
        }else{
            header("Location: signup.php");
        }
    }
    
?>