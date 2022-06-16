<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="module" src="./javascript/index.js"></script>
    <link rel="stylesheet" href="./javascript/dist/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Stock Management</title>
</head>

<body>
    <div class="w-full flex flex-col h-screen">
        <nav class="navbar bg-white p-3 flex shadow-lg justify-center w-full h-[80px] items-center">
            <div class="brand flex items-center flex-row-reverse justify-end">
                <p class="text-xl font-bold text-blue-400 cursor-pointer text-center">STORE </p>
                <!-- <img class="w-[100px] h-[100px]" src="logo.svg" alt=""> -->
            </div>

            <div class="links flex w-full gap-1 ml-5 max-w-[700px]">
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg text-blue-400 " href=""><i class="fa-solid fa-chart-line"></i>Darshboard</a>
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href="./products/products.php"><i class="fa-solid fa-box"></i>Products</a>
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href=""><i class="fa-solid fa-store"></i>Inventory</a>
                <!-- <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href=""><i class="fa-solid fa-arrow-right-from-bracket"></i>Outgoing</a> -->
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href="./login/index.html"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>

            </div>
        </nav>
        <div class="flex w-full flex-col h-full items-center justify-center">
            <p class="text-2xl font-bold">
                Hi. 
                <?php
                echo $_SESSION['v_name'];
                ?>
            </p>
            <div class="flex flex-col">
                <p>Do something cool today by <a
                 class="text-blue-600" href="./products/addproduct.php">Adding new Product</a></p>
            </div>
        </div>
    </div>


</body>

</html>