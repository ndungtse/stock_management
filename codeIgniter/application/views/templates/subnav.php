
<div class="w-full mt-4 flex items-center justify-center">
    
    <a class="p-1 <?php if($snav=='all'){echo ' border-b-2 border-blue-500';} ?>" href="/inventory/overview">All</a>
    <a class="p-2 <?php if($snav=='sold'){echo ' border-b-2 border-blue-500';} ?> ml-4" href="/inventory/sold">Sold</a>
    <a class="p-2 <?php if($snav=='outofstock'){echo ' border-b-2 border-blue-500';} ?> ml-4" href="/inventory/outofstock">Out Of Stock</a>
</div>