<div class="w-full cont flex flex-col h-screen overflow-hidden">
    <i class="bx bx-menu hidden absolute left-2 top-2 text-3xl cursor-pointer"></i>
    <nav class="navbar bg-white p-3 flex justify-center w-full shadow-lg h-[80px] items-center">
        <div class="brand flex items-center flex-row-reverse justify-end">
            <p class="text-xl font-bold text-blue-400 cursor-pointer text-center">STORE </p>
            <!-- <img class="w-[100px] h-[100px]" src="logo.svg" alt=""> -->
        </div>

        <div class="links flex w-full gap-1 ml-5 max-w-[700px]">
            <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg
                <?php if($title=='home'){echo 'text-blue-400';}; ?> hover:text-blue-400 " href="/"><i class="fa-solid fa-chart-line"></i>Darshboard</a>
            <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg
            <?php if($title=='Products'){echo 'text-blue-400';}; ?> hover:text-blue-400" href="/products/view"><i class="fa-solid fa-box"></i>Products</a>
            <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg
            <?php if($title=='inventory'){echo 'text-blue-400';}; ?> hover:text-blue-400" href="/inventory"><i class="fa-solid fa-store"></i>Inventory</a>
            <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg
            <?php if($title==''){echo 'text-blue-400';}; ?> hover:text-blue-400" href="/users/logout"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>

        </div>
    </nav>