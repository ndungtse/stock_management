<?php
    echo form_open('products/updateproduct');
?>
<div class="w-full flex flex-col h-screen">
        <nav class="navbar bg-white p-3 flex shadow-lg justify-center w-full h-[80px] items-center">
            <div class="brand flex items-center flex-row-reverse justify-end">
                <p class="text-xl font-bold text-blue-400 cursor-pointer text-center">STORE </p>
                <!-- <img class="w-[100px] h-[100px]" src="logo.svg" alt=""> -->
            </div>

            <div class="links flex w-full gap-1 ml-5 max-w-[700px]">
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg text-blue-400 " href=""><i class="fa-solid fa-chart-line"></i>Darshboard</a>
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href="/products/view"><i class="fa-solid fa-box"></i>Products</a>
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href=""><i class="fa-solid fa-store"></i>Inventory</a>
                <!-- <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href=""><i class="fa-solid fa-arrow-right-from-bracket"></i>Outgoing</a> -->
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href="../login/index.html"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>

            </div>
        </nav>
        <div class="flex w-full flex-col h-full items-center justify-center">
            <div class="flex items-center flex-col p-4 w-[400px] min-w-[280px] ">
                <h2 class="text-2xl font-semibold text-blue-500 text-center">Update your product</h2>
                <div class="flex flex-wrap text-red-400"><?php echo validation_errors(); ?></div>
                <div class="flex flex-col w-full mt-6">
                    <label for="name" class="font-semibold">Product Name</label>
                    <input type="text" placeholder="enter product name" name="name" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-3 px-3 outline-none border-slate-800 focus:border-blue-400">
                </div>
                <div class="flex flex-col w-full mt-6">
                    <label for="text" class="font-semibold">product quantity</label>
                    <input type="text" placeholder="enter product quantity" name="quantity" id="password" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-3 px-3 outline-none border-slate-800 focus:border-blue-400">
                </div>
                <div class="flex flex-col w-full mt-6">
                    <label for="text" class="font-semibold">product price</label>
                    <input type="text" placeholder="enter product price" name="price" id="password" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-3 px-3 outline-none border-slate-800 focus:border-blue-400">
                </div>
                <div class="flex  w-full mt-6 justify-between items-center">
                    <label for="text" class="font-semibold">Product Type</label>
                    <select class="ml-3 w-1/2 bg-blue-400 outline-none p-2 text-white" name="type" id="">
                        <option value="">Select type</option>
                        <option value="food">Food</option>
                        <option value="drink">Drink</option>
                        <option value="equipment">Equipment</option>
                    </select>
                </div>
                <input name="submit" class="bg-blue-500 px-4 py-2 mx-auto w-full 
             cursor-pointer text-white rounded-lg mt-6" type="submit" value="Add Product">
            </div>
        </div>
    </div>

    <?php
    echo form_close();
    ?>