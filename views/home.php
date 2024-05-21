<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="public/js/tailwind.js"></script>
  <link href="public/css/style.css" rel="stylesheet" />

  <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
  <title>Home</title>
</head>

<body>
  <header>
    <?php include_once  "components/navbar.php"; ?>
  </header>

  <main class="min-h-100">
    <section class="bg-white dark:bg-gray-900">
      <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">
        <div class="max-w-screen-md mb-8 lg:mb-16">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-gray-900 dark:text-white">Migro </h2>
          <p class="text-gray-500 sm:text-xl dark:text-gray-400">
            The Groceries you need, delivered to your doorstep.
          </p>
        </div>
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
          <a href="/products?category=frozen" class="border-1 border-gray-500 shadow-md p-2 hover:scale-105 duration-300 ease-in-out">
            <div class="flex justify-center items-center mb-4 w-32 h-28 rounded-full bg-primary-100 lg:h-32 lg:w-28 dark:bg-primary-900">
              <img class="rounded shadow" src="https://img.freepik.com/free-photo/frozen-food-table-arrangement_23-2148969451.jpg" alt="Freozen " />
            </div>
            <h3 class="mb-2 text-xl font-bold dark:text-white">Frozen</h3>
            <p class="text-gray-500 dark:text-gray-400">
              Explore our wide selection of frozen foods, including pizzas, vegetables, and fish fillets. Enjoy the convenience of having delicious meals ready to cook straight from your freezer.
            </p>
          </a>
          <a href="products?category=fresh" class="border-1 border-gray-500 shadow-md p-2 hover:scale-105 duration-300 ease-in-out">
          <div class="flex justify-center items-center mb-4 w-32 h-28 rounded-full bg-primary-100 lg:h-32 lg:w-28 dark:bg-primary-900">
              <img class="rounded shadow" src="https://media.istockphoto.com/id/1409236261/photo/healthy-food-healthy-eating-background-fruit-vegetable-berry-vegetarian-eating-superfood.webp?b=1&s=170667a&w=0&k=20&c=KdkqtpvIHgiMk4ZEqlXDt53NjYYszTccGrnHJKkecF0=" alt="Fresh " />
            </div>
            <h3 class="mb-2 text-xl font-bold dark:text-white">Fresh</h3>
            <p class="text-gray-500 dark:text-gray-400">
              Find fresh fruits, vegetables, and meats at Migro. We offer a wide selection of fresh produce to keep your meals healthy and delicious.
            </p>
          </a>
          <a href="products?category=beverage" class="border-1 border-gray-500 shadow-md p-2 hover:scale-105 duration-300 ease-in-out">
          <div class="flex justify-center items-center mb-4 w-32 h-28 rounded-full bg-primary-100 lg:h-32 lg:w-28 dark:bg-primary-900">
              <img class="rounded shadow" src="https://wildpackbev.com/wp-content/uploads/2022/01/How-Much-is-the-Beverage-Industry-Worth.jpg" alt="Bev " />
            </div>
            <h3 class="mb-2 text-xl font-bold dark:text-white">Beverage</h3>
            <p class="text-gray-500 dark:text-gray-400">
              Quench your thirst with our selection of beverages, including sodas, juices, and teas. Whether you're looking for a refreshing drink to enjoy on a hot day or a warm beverage to cozy up with, we have you covered.

            </p>
          </a>
          <a href="products?category=home" class="border-1 border-gray-500 shadow-md p-2 hover:scale-105 duration-300 ease-in-out">
          <div class="flex justify-center items-center mb-4 w-32 h-28 rounded-full bg-primary-100 lg:h-32 lg:w-28 dark:bg-primary-900">
              <img class="rounded shadow" src="https://www.fragrancemfg.com/wp-content/uploads/2019/04/shutterstock_1136753939-1024x683.jpg" alt="Freozen " />
            </div>
            <h3 class="mb-2 text-xl font-bold dark:text-white">Home</h3>
            <p class="text-gray-500 dark:text-gray-400">
            Discover a wide range of household essentials and cleaning supplies to keep your home tidy and organized. From cleaning sprays and disinfectants to paper products and kitchenware, we have everything you need to maintain a clean and welcoming home environment.
            </p>
          </a>
          <a href="products?category=pet-food" class="border-1 border-gray-500 shadow-md p-2 hover:scale-105 duration-300 ease-in-out">
          <div class="flex justify-center items-center mb-4 w-32 h-28 rounded-full bg-primary-100 lg:h-32 lg:w-28 dark:bg-primary-900">
              <img class="rounded shadow" src="https://nypost.com/wp-content/uploads/sites/2/2022/10/dogfood.jpg?quality=75&strip=all" alt="Freozen " />
            </div>
            <h3 class="mb-2 text-xl font-bold dark:text-white">Pet-food</h3>
            <p class="text-gray-500 dark:text-gray-400">
              Keep your furry friends happy and healthy with our selection of pet food and supplies. From dog and cat food to pet toys and grooming products, we have everything you need to care for your beloved pets.
            </p>
          </a>

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