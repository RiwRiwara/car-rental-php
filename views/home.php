    <section class="bg-white dark:bg-gray-900 ">

      <div class="py-8 px-4 mx-auto max-w-screen-2xl sm:py-16 lg:px-6 ">

        <div class="w-full mb-6 ">
          <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-primary-800 uppercase ">Car-Rental </h2>
          <p class="text-gray-600 sm:text-xl dark:text-gray-400 p-4 bg-gray-200 shadow-inner rounded">
            Car rental is a service that provides cars for rent for a short period of time. It is an often organized with numerous local branches (which allow a user to return a vehicle to a different location), and primarily located near airports or busy city areas and often complemented by a website allowing online reservations.
          </p>
        </div>

        <div class="mb-4">
          <?php include 'components/filter-bar.php'; ?>
        </div>

        <!-- Show car list -->
        <div class="px-8 py-4 bg-gray-200 rounded-md shadow-inner">


          <?php
          $type = isset($_GET['type']) ? $_GET['type'] : '';
          $brand = isset($_GET['brand']) ? $_GET['brand'] : '';
          $year = isset($_GET['year']) ? $_GET['year'] : '';
          $search = isset($_GET['search']) ? $_GET['search'] : '';

          $cars = json_decode(file_get_contents("cars.json"), true);

          $filteredCars = array_filter($cars, function ($car) use ($type, $brand, $year, $search) {
            $typeMatch = ($type === '' || $type === 'All') ? true : $car['type'] === $type;
            $brandMatch = ($brand === '' || $brand === 'All') ? true : $car['brand'] === $brand;
            $yearMatch = ($year === '' || $year === 'All') ? true : $car['year'] === $year;
            $searchMatch = empty($search) ? true : (
              stripos($car['car_model'], $search) !== false ||
              (isset($car['description']) && stripos($car['description'], $search) !== false)
            );
            return $typeMatch && $brandMatch && $yearMatch && $searchMatch;
          });
          ?>


          <div class="grid grid-cols-4 gap-8">

            <?php foreach ($filteredCars as $car) : ?>
              <div class="bg-white rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 p-2 hover:scale-105 duration-300 ease-in-out">
                <a href="#" class="relative inline-flex ">
                  <div class="absolute inline-flex items-center justify-center w-10 h-6 text-xs font-bold text-white border-2 border-white rounded-full -top-2 -end-0 ">
                    <?php if ($car['availability'] === 'Yes') : ?>
                      <span class="inline-flex items-center bg-green-100 text-green-800 text-xs font-medium px-3 py-1 rounded-full animate-pulse">
                        <span class="w-2 h-2 me-1 bg-green-500 rounded-full"></span>
                        <span>Available</span>
                      </span>
                    <?php else : ?>
                      <span class="inline-flex items-center bg-red-100 text-red-800 text-xs font-medium px-2.5 py-0.5 rounded-full dark:bg-red-900 dark:text-red-300">
                        <span class="w-2 h-2 me-1 bg-red-500 rounded-full"></span>
                        Unavailable
                      </span>
                    <?php endif; ?>
                  </div>
                  <img class="w-full rounded-lg" src="<?= $car['image'] ?>" alt="product image" style="height: 250px;" onerror="this.onerror=null;this.src='public/images/mockup.jpg';" />
                </a>
                <div class="px-5 pb-2 mt-4">


                  <a href="#">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white my-2">
                      <?= $car['car_model'] . " " . $car['year'] ?>
                    </h5>
                  </a>
                  <div class="flex items-center justify-between">
                    <span class="text-2xl font-bold text-gray-900 dark:text-white">
                      $ <?= $car['price_per_day'] ?> <span class="text-lg font-medium">per day</span>
                    </span>
                    <?php if ($car['availability'] === 'Yes') : ?>
                      <a href="/reservation/<?= $car['id'] ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Rent
                      </a>
                    <?php else : ?>
                      <!-- <button class="text-white bg-gray-400 cursor-not-allowed font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-gray-500">
                        Rent
                    </button> -->
                    <?php endif; ?>
                  </div>
                  <div class="mt-2">
                    <button class="collapse-btn text-blue-600 hover:text-blue-800">
                      <i class="fas fa-chevron-down"></i> More details
                    </button>
                    <div class="collapse-content hidden">
                      <p class="text-gray-600 dark:text-gray-400">
                      <div class="flex flex-row gap-2 py-4">
                        <span class="bg-blue-100 text-blue-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                          <?= $car['brand'] ?>
                        </span>
                        <span class="bg-gray-100 text-gray-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                          <?= $car['type'] ?>
                        </span>

                      </div>
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

            <script>
              document.querySelectorAll('.collapse-btn').forEach(button => {
                button.addEventListener('click', () => {
                  const content = button.nextElementSibling;
                  content.classList.toggle('hidden');
                  button.querySelector('i').classList.toggle('fa-chevron-down');
                  button.querySelector('i').classList.toggle('fa-chevron-up');
                });
              });
            </script>
          </div>







        </div>


      </div>
    </section>