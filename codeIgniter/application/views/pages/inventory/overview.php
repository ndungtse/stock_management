    
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
        <div class="absolute w-full h-screen bg-[black] bg-opacity-60 items-center justify-center hidden sellform">
            <div class="flex items-center justify-center w-full h-full">
                <?php
                echo form_open('/inventory/sellproduct');
                ?>
                <div class="w-[300px] bg-white p-7 flex flex-col items-center">
                    <div class="flex w-full justify-end"><i id="close" class="bx bx-x text-3xl cursor-pointer text-danger"></i></div>
                    <p class="text-lg text-center asell font-semibold"></p>
                    <p>Enter the amount you want to sell</p>
                    <input value="1" type="text" placeholder="enter the amount" name="quantity" class="w-[100px] border-[2px]
                            v  rounded-lg h-[40px] mt-2 px-3 text-lg outline-none border-slate-800 focus:border-blue-400">
                    <a href="" class="text-white  btn btn-primary sell mt-4 px-4 rounded-md py-1 hover:bg-blue-500 bg-blue-600">confirm</a>
                </div>
                <?php
                echo form_close();
                ?>
            </div>
        </div>
        <div class="flex page flex-col w-full items-center mt-2" align="center">
            <div class=" overflow-x-auto w-full">
                <?php
                if (count($inventories) > 0) { ?>
                    <table class="min-w-[500px]border-collapse border-b-2 mt-6 " id="data" align="center">
                        <thead>
                            <tr class=" border-collapse border-b-2 ">
                                <th class="w-[10%] text-center">Product Name</th>
                                <th class="w-[10%] text-center">Product Price</th>
                                <th class="w-[10%] text-center">Quantity left</th>
                                <th class="w-[10%] text-center">Product Type</th>
                                <th class="w-[10%] text-center"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($inventories as $row) : ?>
                                <tr class="border-b-2">
                                    <td class="text-center h-[100px]"><?php
                                                                        echo $row->p_name;
                                                                        ?></td>
                                    <td class="text-center h-[100px]"><?php
                                                                        echo $row->price_amount;
                                                                        ?></td>
                                    <td class="text-center h-[100px]"><?php
                                                                        echo $row->p_rem;
                                                                        ?></td>
                                    <td class="text-center h-[100px]"><?php
                                                                        echo $row->p_type;
                                                                        ?></td>
                                    <td class="text-center h-[100px]">
                                        <?php if ($row->sold == 0) { ?>
                                            <a href="/inventory/sellproduct?d=<?php echo $row->price_amount; ?>&p=<?php echo $row->p_code; ?>&n=<?php echo $row->p_name; ?>&q=<?php echo $row->p_qoh; ?>" class="text-white btn btn-primary px-4 rounded-md py-1 hover:bg-blue-500 bg-blue-600">sell</a>
                                        <?php } else { ?>
                                            <div class="text-white px-4 btn btn-success rounded-md py-1 hover:bg-green-500 "><?= $row->q_sold ?> sold</div>
                                            <?php if ($row->q_sold == $row->p_qoh) { ?>
                                                <div class="text-white px-4 btn btn-danger rounded-md py-1 hover:bg-red-500 ">out of stock</div>
                                            <?php } else { ?>
                                                <a href="/inventory/sellproduct?d=<?php echo $row->price_amount; ?>&p=<?php echo $row->p_code; ?>&n=<?php echo $row->p_name; ?>&q=<?php echo $row->p_qoh; ?>" class="text-white btn btn-primary px-4 rounded-md py-1 hover:bg-blue-500 bg-blue-600">sell</a>
                                            <?php } ?>
                                        <?php } ?>
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
</div>