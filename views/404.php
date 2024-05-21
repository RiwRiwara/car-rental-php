<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/js/tailwind.js"></script>
    <link href="public/css/style.css" rel="stylesheet" />

    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Not Found</title>
</head>

<body>
    <header>
        <?php include_once  "components/navbar.php"; ?>
    </header>

    <main style="min-height: 100svh;">

        <div class="container mx-auto py-20 h-100">
            <div class="text-center">
                <h1 class="text-4xl font-bold text-gray-800 dark:text-gray-200">404</h1>
                <p class="text-lg text-gray-600 dark:text-gray-300">Page not found</p>
            </div>
        </div>

    </main>


    <footer>
        <?php include_once  "components/footer.php"; ?>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>