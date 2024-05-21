<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/js/tailwind.js"></script>
    <link href="public/css/style.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Products</title>
</head>

<body>


    <header>
        <?php include_once  "components/navbar.php"; ?>
    </header>

    <main class="min-h-100">
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
    </main>


    <footer>
        <?php include_once  "components/footer.php"; ?>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>