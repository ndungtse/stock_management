
    <?php
    if (isset($_GET['info'])) {
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
    <div class="flex page flex-col w-full items-center mt-2" align="center">
        <?php
        ?>
        <h1 class="text-center font-bold text-2xl">Your Products</h1>
        <div class="flex mt-4 items-center">
            <a class="py-1 btn btn-primary px-3 bg-blue-500 text-white rounded-md text-lg " href="/products/addproduct">
            <i class="bx bx-plus"></i> Add New</a>
            <p class="mx-4">OR</p>
            <a class="py-1 btn btn-primary px-3 bg-blue-500 text-white rounded-md text-lg " href="/products/printproducts">
            Print your products</a>
        </div>
        
        <div class=" overflow-x-auto w-full">
            <?php
            if (count($products) > 0) { ?>
                <table class="min-w-[500px]border-collapse border-b-2 mt-6 " id="data" align="center">
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
                            <tr class="border-b-2">
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

        </div>
    <?php } else { ?>
        <div class="flex w-full items-center h-full mt-7 flex-col justify-center">
            <p class="text-xl font-semibold">You currently have no Registered</p>
        </div>
    <?php  } ?>
    </div>
</div>