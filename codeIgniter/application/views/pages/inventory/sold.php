

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
    <div class="flex page flex-col h-full w-full items-center mt-2" align="center">
        <div class=" overflow-x-auto overflow-y-hidden h-full w-full">
            <?php
            if (count($solds) > 0) { ?>
                <table class="min-w-[500px]border-collapse border-b-2 mt-6 " id="data" align="center">
                    <thead>
                        <tr class=" border-collapse border-b-2 ">
                            <th class="w-[10%]">Product Name</th>
                            <th class="w-[10%]">Product Price</th>
                            <th class="w-[10%]">Quantity left</th>
                            <th class="w-[10%]">Product Type</th>
                            <th class="w-[10%]"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($solds as $row) : ?>
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
                                    <?php if ($row->sold == 0) {?>
                                    <a href="/products/updateproduct?id=<?php echo $row->p_code; ?>" class="text-white px-4 rounded-md py-1 hover:bg-blue-500 bg-blue-600">sell</a>
                                    <?php } else { ?>
                                    <a href="/products/removeproduct?id=<?php echo $row->p_code; ?>" class="text-white px-4 rounded-md py-1 hover:bg-red-500 bg-red-600"><i class="fa-solid fa-trash-alt"></i></a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

        </div>
    <?php } else { ?>
        <div class="flex w-full items-center h-full mt-7 flex-col justify-center">
            <p class="text-xl font-semibold">You currently have no Sold products!</p>
        </div>
    <?php  } ?>
    </div>
</div>