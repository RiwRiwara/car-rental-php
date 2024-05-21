<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/js/tailwind.js"></script>
    <link href="public/css/style.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <link rel="icon" href="public/images/Logo.png" type="image/x-icon">
    <title>Home</title>
</head>

<body>
    <script src="public/js/jquery-3.7.1.js"></script>

    <!-- Navbar -->
    <header>
        <?php include_once  "components/navbar.php"; ?>
    </header>

    <!-- Body -->
    <main style="min-height: 100svh;">
        <?php include_once  "views/" . $page->page_name  . ".php"; ?>
    </main>


    <!-- Footer -->
    <footer>
        <?php include_once  "components/footer.php"; ?>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</body>

</html>