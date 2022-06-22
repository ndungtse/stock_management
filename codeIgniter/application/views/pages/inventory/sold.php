

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
                                <th class="w-[10%] text-center">Product Name</th>
                                <th class="w-[10%] text-center">Cost </th>
                                <th class="w-[10%] text-center">Quantity sold</th>
                                <th class="w-[10%] text-center">Date sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($solds as $row) : ?>
                                <tr class="border-b-2">
                                    <td class="text-center h-[100px]"><?php
                                                                        echo $row->p_sold;
                                                                        ?></td>
                                    <td class="text-center h-[100px]"><?php
                                                                        echo $row->s_cost;
                                                                        ?></td>
                                    <td class="text-center h-[100px]"><?php
                                                                        echo $row->q_sold;
                                                                        ?></td>
                                    <td class="text-center h-[100px]"><?php
                                                                        echo $row->sold_date;
                                                                        ?></td>
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
</div>