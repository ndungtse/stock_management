  

  <div class=" w-full h-full  items-center justify-center sellform">
        <div class="flex items-center justify-center w-full h-full">
        <?php
        echo form_open('/inventory/sellproduct?d='.$_GET['d'].'&p='.$_GET['p'].'&n='.$_GET['n'].'&q='.$_GET['q']);
        ?>
            <div class="w-[300px] bg-white p-7 flex flex-col items-center">
                <p class="text-lg text-center asell font-semibold">
                    <?php echo "You are about to sell ".$name." ,".$price." frw each." ;?>
                </p>
                <p>Enter the amount you want to sell</p>
                <input value="1" type="text" placeholder="enter the amount" name="quantity" class="form-control">
                <input type="submit" class="text-white  btn btn-primary sell mt-4 px-4 rounded-md py-1 hover:bg-blue-500 bg-blue-600" value="confirm" />
            </div>
            <?php
        echo form_close();
        ?>
        </div>
    </div>