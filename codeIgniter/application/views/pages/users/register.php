


<?php echo form_open('users/register'); ?>
    <div class="w-full flex flex-col h-screen items-center justify-center">
        <div action="signup.php" method="POST" 
            class="flex items-center flex-col p-4 w-[400px] min-w-[280px] ">
            <h2 class="text-2xl font-semibold text-blue-500 text-center">Signup and get started with e-Store</h2>
            
            <div class="flex flex-wrap text-red-400"><?php echo validation_errors(); ?></div>
            <div class="flex flex-col w-full mt-4">
                <label for="name" class="font-semibold">Name</label>
                <input
                 placeholder="enter your names" type="text" name="name" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
            </div>
            <div class="flex flex-col w-full mt-4">
                <label for="name" class="font-semibold">Email</label>
                <input type="email" placeholder="enter your email" name="email" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
            </div>
            <div class="flex flex-col w-full mt-4">
                <label for="address" class="font-semibold">Address</label>
                <input type="text" placeholder="enter your address" name="address" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
            </div>
            <div class="flex flex-col w-full mt-4">
                <label for="name" class="font-semibold">Phone</label>
                <input type="tel" placeholder="enter your mobile phone number" name="phone" id="name" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
            </div>
            <div class="flex flex-col w-full mt-4">
                <label for="password" class="font-semibold">Password</label>
                <input type="password" placeholder="enter your password" name="password" id="password" class="w-full border-[2px]
                  rounded-lg h-[40px] mt-2 px-3 outline-none border-slate-800 focus:border-blue-400">
            </div>
            
            <input name="submit" class="bg-blue-500 px-4 py-3 mx-auto w-full 
             cursor-pointer text-white rounded-lg mt-4" type="submit" value="Signup">

             <div class="flex w-full mt-4 items-center">
                <p>Already have an account?</p>
                <a class="ml-3 text-blue-600" href="../login/index.html">Login</a>
             </div>
        </div>
    </div>
<?php echo form_close(); ?>