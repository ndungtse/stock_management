<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./javascript/dist/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

    <link rel="stylesheet" href="../javascript/dist/output.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <title>Products</title>
</head>

<body>
    <div class="w-full flex flex-col h-screen">
        <nav class="navbar bg-white p-3 flex justify-center w-full shadow-lg h-[80px] items-center">
            <div class="brand flex items-center flex-row-reverse justify-end">
                <p class="text-xl font-bold text-blue-400 cursor-pointer text-center">STORE </p>
                <!-- <img class="w-[100px] h-[100px]" src="logo.svg" alt=""> -->
            </div>

            <div class="links flex w-full gap-1 ml-5 max-w-[700px]">
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400 " href="../index.php"><i class="fa-solid fa-chart-line"></i>Darshboard</a>
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg text-blue-400" href=""><i class="fa-solid fa-box"></i>Products</a>
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href=""><i class="fa-solid fa-store"></i>Inventory</a>
                <!-- <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href=""><i class="fa-solid fa-arrow-right-from-bracket"></i>Outgoing</a> -->
                <a class="p-2 w-full flex gap-2 items-center text-sm rounded-lg hover:text-blue-400" href="../login/index.html"><i class="fa-solid fa-arrow-right-from-bracket"></i>Logout</a>

            </div>
        </nav>
        <div class="flex flex-col w-full items-center mt-6">
            <?php
            if(isset($_GET['msg'])){
                $msg = $_GET['msg'];
                if($msg == "Product added successfully!"){
                    echo "<div class='text-green-400 text-center p-2 rounded-lg'>Product Added Successfully</div>";
                }else if($msg == "failed"){
                    echo "<div class='text-red-400 text-center p-2 rounded-lg'>Product Adding Failed</div>";
                }
            }
            ?>
            <h1 class="text-center font-bold text-2xl">Your Products</h1>
                    <?php
                        include "../CRUDE/fetch.php";
                        $crud = new CRUD("product p");
                        $crud->where = "WHERE v_code = '".$_SESSION['v_code']."'";
                        $crud->selection = "p.p_name, p.p_qoh, p.p_type, p.p_code, pr.price_amount";
                        $crud->join = "INNER JOIN price pr ON p.p_code = pr.p_code";
                        $res = $crud->readCustom();
                        
                        if($res->num_rows > 0){?>
                        <table class=" border-collapse border-b-2 mt-6 ">
                            <thead>
                                <tr  class=" border-collapse border-b-2 " >
                                    <th class="w-[10%]">Product Name</th>
                                    <th class="w-[10%]">Product Price</th>
                                    <th class="w-[10%]">Product Quantity</th>
                                    <th class="w-[10%]">Product Type</th>
                                    <th class="w-[10%]">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                          <?php      
                            while($row = $res->fetch_assoc()): ?>
                        <tr>
                            <td class="text-center h-[100px]"><?php
                                echo $row['p_name'];
                            ?></td>
                            <td class="text-center h-[100px]"><?php
                                echo $row['price_amount'];
                            ?></td>
                            <td class="text-center h-[100px]"><?php
                                echo $row['p_qoh'];
                            ?></td>
                            <td class="text-center h-[100px]"><?php
                                echo $row['p_type'];
                            ?></td>
                            <td class="text-center h-[100px]">
                                <a href="edit.php?id=<?php echo $row['p_code']; ?>" class="text-blue-400 hover:text-blue-500"><i class="fa-solid fa-edit"></i></a>
                                <a href="delete.php?id=<?php echo $row['p_code']; ?>" class="text-red-500 hover:text-red-600"><i class="fa-solid fa-trash-alt"></i></a>
                                <!-- <a class="px-3 py-1 text-white bg-blue-500" href='edit.php?id=".$row['p_code']"'>Edit</a>
                                <a class="px-3 py-1 text-white bg-red-500" href="">Delete</a> -->
                            </td>
                        </tr>
                    <?php endwhile; ?>
                        </tbody>  
                     </table>
                    <?php }else{ ?>
                            <div class="flex w-full items-center h-full mt-7 flex-col justify-center">
                                <p class="text-xl font-semibold">You currently have no Registered</p>
                                <a href="./addproduct.php" class="ml-4 text-blue-600">Add a Product</a>
                            </div>
                       <?php  }?>
        </div>
    </div>
</body>

</html>