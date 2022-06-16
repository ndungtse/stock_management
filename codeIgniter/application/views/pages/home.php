<?php
session_start();
?>
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
                // echo $_SESSION['v_name'];
                ?>
            </p>
            <div class="flex flex-col">
                <p>Do something cool today by <a
                 class="text-blue-600" href="./products/addproduct.php">Adding new Product</a></p>
            </div>
        </div>
    </div>