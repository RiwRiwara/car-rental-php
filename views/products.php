<section class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6 ">
        <div class="mx-auto max-w-screen-sm text-center mb-8 lg:mb-16">
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Search Product</h2>
        </div>

        <div>Category</div>
        <div class="flex flex-row gap-2 mb-4">

            <a href="/products" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">All</a>
            <a href="/products?category=Frozen" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">Frozen</a>
            <a href="/products?category=Fresh" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">Fresh</a>
            <a href="/products?category=Beverage" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">Beverages</a>
            <a href="/products?category=Home" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">Home</a>
            <a href="/products?category=Pet-food" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">Pet-food</a>

        </div>


        <div class="grid gap-8 mb-6 lg:mb-16 md:grid-cols-3">

            <?php
            include_once "components/product_items.php";
            ?>


        </div>
    </div>
</section>