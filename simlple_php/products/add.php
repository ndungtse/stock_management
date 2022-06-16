<?php
    include_once("../CRUDE/fetch.php");

    session_start();

    $name= $_POST['name'];
    $quantity= $_POST['quantity'];
    $type= $_POST['type'];
    $price= $_POST['price'];

    if(isset($_POST["submit"])){
        $p_code = random_int(1, 9999999);
        $price_code = random_int(1, 9999999);
        $v_code = $_SESSION['v_code'];

        $crud = new CRUD("product");
        $crud->fields = "p_name, p_qoh, p_type, p_code, v_code";
        $crud->values = "'$name', '$quantity', '$type', '$p_code', '$v_code'";
        $res = $crud->create();
        
        if($crud->result == "error in query"){
            echo "error in query";
        }

        if($res == "request processed successfully!"){
            $crud1 = new CRUD("price");
            $crud1->fields = "p_code, price_amount, price_code";
            $crud1->values = "'$p_code', '$price', '$price_code'";
            $res1 = $crud1->create();
            if($res1 == "request processed successfully!"){
                header("Location: products.php?msg=Product added successfully!");
            }else{
                header("Location: addproduct.php?msg=Something went wrong!");
            }
        }else{
            header("Location: addproduct.php?msg=Something went wrong!");
        }
    }
?>