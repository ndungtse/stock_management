<div class="w-full flex flex-col h-screen">
    <nav class="navbar bg-white p-3 flex justify-center w-full shadow-lg h-[80px] items-center">
        <div class="brand flex items-center flex-row-reverse justify-end">
            <p class="text-xl font-bold text-blue-400 cursor-pointer text-center">STORE </p>
            <!-- <img class="w-[100px] h-[100px]" src="logo.svg" alt=""> -->
        </div>

        <div class="links flex w-full gap-1 ml-5 max-w-[700px]">
            <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400 " href="/"><i class="fa-solid fa-chart-line"></i>Darshboard</a>
            <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg text-blue-400" href=""><i class="fa-solid fa-box"></i>Products</a>
            <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href=""><i class="fa-solid fa-store"></i>Inventory</a>
            <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href="/users/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>

        </div>
    </nav>
    <?php
        if(isset($_GET['info'])){  
    ?>
    <div class="flex w-full bg-green-400 text-white py-2 items-center justify-center">
        <p class="">
            <?php
                echo $_GET['info'];
            ?>
        </p>
    </div>
    <?php
        }
    ?>
    <div class="flex flex-col w-full items-center mt-2">
        <?php
        ?>
        <h1 class="text-center font-bold text-2xl">Your Products</h1>
        <a class="py-2 mt-4 px-3 bg-blue-500 text-white rounded-md text-lg " href="/products/addproduct">
            <i class="bx bx-plus"></i> Add New Product</a>
        <?php
        if (count($products)>0) { ?>
            <table class=" border-collapse border-b-2 mt-6 ">
                <thead>
                    <tr class=" border-collapse border-b-2 ">
                        <th class="w-[10%]">Product Name</th>
                        <th class="w-[10%]">Product Price</th>
                        <th class="w-[10%]">Product Quantity</th>
                        <th class="w-[10%]">Product Type</th>
                        <th class="w-[10%]">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($products as $row) : ?>
                        <tr>
                            <td class="text-center h-[100px]"><?php
                                                                echo $row->p_name;
                                                                ?></td>
                            <td class="text-center h-[100px]"><?php
                                                                echo $row->price_amount;
                                                                ?></td>
                            <td class="text-center h-[100px]"><?php
                                                                echo $row->p_qoh;
                                                                ?></td>
                            <td class="text-center h-[100px]"><?php
                                                                echo $row->p_type;
                                                                ?></td>
                            <td class="text-center h-[100px]">
                                <a href="/products/updateproduct?id=<?php echo $row->p_code; ?>" class="text-blue-400 hover:text-blue-500"><i class="fa-solid fa-edit"></i></a>
                                <a href="/products/removeproduct?id=<?php echo $row->p_code; ?>" class="text-red-500 hover:text-red-600"><i class="fa-solid fa-trash-alt"></i></a>
                                <!-- <a class="px-3 py-1 text-white bg-blue-500" href='edit.php?id=".$row['p_code']"'>Edit</a>
                                <a class="px-3 py-1 text-white bg-red-500" href="">Delete</a> -->
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="flex w-full items-center h-full mt-7 flex-col justify-center">
                <p class="text-xl font-semibold">You currently have no Registered</p>
            </div>
        <?php  } ?>
    </div>
</div>