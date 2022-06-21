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
            <h1 class="text-center font-bold text-2xl">Products Out Of Stock</h1>
            <div class=" overflow-x-auto w-full">
                <?php
                if (count($outofstocks) > 0) { ?>
                    <table class="min-w-[500px]border-collapse border-b-2 mt-6 " id="data" align="center">
                        <thead>
                            <tr class=" border-collapse border-b-2 ">
                                <th class="w-[10%] text-center">Product Name</th>
                                <th class="w-[10%] text-center">Product Price</th>
                                <th class="w-[10%] text-center">Product Quantity</th>
                                <th class="w-[10%] text-center">Product Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($outofstocks as $row) : ?>
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
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

            </div>
        <?php } else { ?>
            <div class="flex w-full items-center h-full mt-7 flex-col justify-center">
                <p class="text-xl font-semibold">You currently have no products out of stock</p>
            </div>
        <?php  } ?>
        </div>
    </div>
</div>