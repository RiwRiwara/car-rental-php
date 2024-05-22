<?php
$car  = $page->car;
?>
<section class="bg-white dark:bg-gray-900 ">

    <div class="py-8 px-4 mx-auto max-w-screen-2xl sm:py-16 lg:px-6 ">
        <div class="w-full mb-6 ">
            <h3 class=" text-xl tracking-tight font-medium text-gray-400  ">
                Reservation
            </h3>
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-primary-800 uppercase ">
                <?= $car['car_model']; ?> - <?= $car['year']; ?>
            </h2>


            <div class="relative w-full h-96 overflow-hidden rounded-lg bg-gray-100 dark:bg-gray-800 mb-10 shadow-inner ">
                <img src="/<?= $car['image'] ?>" alt="<?= $car['car_model']; ?>" class="w-full h-96 object-cover rounded-lg shadow-lg" onerror="this.onerror=null;this.src='public/images/mockup.jpg';">
            </div>

            <div class="text-gray-600 sm:text-xl dark:text-gray-400 p-4 bg-gray-100 shadow-inner rounded">
                <?= $car['description']; ?>
            </div>

            <h3 class="my-4 text-xl tracking-tight font-extrabold text-primary-800  ">
                Car detail
            </h3>
            <div class="text-gray-600 text-xl dark:text-gray-400 p-4 bg-gray-100 shadow-inner rounded">
                <div class="grid grid-cols-2 gap-6 my-4">
                    <div>Brand:
                        <span class="bg-blue-100 text-blue-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                            <?= $car['brand']; ?>
                        </span>
                    </div>
                    <div>Model:
                        <span class="bg-gray-100 text-gray-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                            <?= $car['car_model']; ?>
                        </span>
                    </div>
                    <div>Year:
                        <span class="bg-yellow-100 text-yellow-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                            <?= $car['year']; ?>
                        </span>
                    </div>
                    <div>Type:
                        <span class="bg-indigo-100 text-indigo-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-indigo-900 dark:text-indigo-300">
                            <?= $car['type']; ?>
                        </span>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6 my-4">

                    <div>Mile Age:
                        <span class="bg-blue-100 text-blue-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-blue-900 dark:text-blue-300">
                            <?= $car['mileage']; ?>
                        </span>
                    </div>
                    <div>Fuel Type:
                        <span class="bg-gray-100 text-gray-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-gray-700 dark:text-gray-300">
                            <?= $car['fuel_type']; ?>
                        </span>
                    </div>
                    <div>Seats:
                        <span class="bg-yellow-100 text-yellow-800 text-lg font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">
                            <?= $car['seats']; ?>
                        </span>
                    </div>
                    <div>
                    </div>
                </div>
            </div>
            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

            <div class="grid grid-cols-2 gap-6 my-4">
                <h3 class="mb-2 text-xl tracking-tight font-extrabold text-primary-800  ">
                    Rental Price
                </h3>
                <div class="text-gray-800 sm:text-xl dark:text-gray-400 p-4 rounded">
                    <span class="bg-blue-100 text-purple-800 text-2xl font-medium me-2 px-3 py-01 rounded dark:bg-purple-900 dark:text-purple-300">
                        $<?= $car['price_per_day']; ?> Per day
                    </span>
                </div>

                <h3 class=" text-xl tracking-tight font-extrabold text-primary-800  ">
                    Available
                </h3>
                <div class="text-gray-600 sm:text-xl dark:text-gray-400 p-4 rounded">
                    <span class="bg-purple-100 text-purple-800 text-2xl font-medium me-2 px-3 py-01 rounded dark:bg-purple-900 dark:text-purple-300">
                        <?= $car['quantity']; ?> cars
                    </span>
                </div>
            </div>

            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
            <!-- Rent form -->
            <h1 class=" text-2xl tracking-tight font-extrabold text-primary-800">
                Rent Form
            </h1>
            <form action="/rent" method="POST" class="grid grid-cols-2 gap-6 mt-4" id="rentForm">
                <div>
                    <div class="">
                        <input type="hidden" name="car_id" value="<?= $car['id']; ?>">
                        <div class="flex flex-wrap -mx-3 mb-6 flex-col gap-4">
                            <div class="grid grid-cols-2">
                                <div class="w-full px-3  md:mb-0">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" for="name">
                                        Name
                                    </label>
                                    <input class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="name" name="name" type="text" required>
                                </div>
                                <div class="w-full px-3  md:mb-0">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" for="email">
                                        Email
                                    </label>
                                    <input class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="email" name="email" type="email" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">

                                <div class="w-full px-3  md:mb-0">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" for="phone">
                                        Phone
                                    </label>
                                    <input class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="phone" name="phone" type="tel" required>
                                </div>
                                <!-- License -->
                                <div class="w-full px-3  md:mb-0">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" for="license">
                                        License
                                    </label>
                                    <input class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="license" name="license" type="text" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-2">
                                <div class="w-full px-3  md:mb-0">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" for="start_date">
                                        Start Date
                                    </label>
                                    <input class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="start_date" name="start_date" type="date" required min="<?= date('Y-m-d'); ?>">

                                </div>
                                <div class="w-full px-3  md:mb-0">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" for="end_date">
                                        End Date
                                    </label>
                                    <input class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="end_date" name="end_date" type="date" required min="<?= date('Y-m-d'); ?>">
                                </div>
                            </div>

                            <div class="grid grid-cols-1">
                                <div class="w-full px-3  md:mb-0">
                                    <label class="block mb-2 text-sm font-medium text-gray-600 dark:text-gray-400" for="quantity">
                                        Quantity
                                    </label>
                                    <select id="quantity_select" name="quantity" class="w-full px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="quantity" name="quantity" required>
                                        <?php for ($i = 1; $i <= $car['quantity']; $i++) : ?>
                                            <option value="<?= $i; ?>"><?= $i; ?></option>
                                        <?php endfor; ?>
                                    </select>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div>
                    <div class="flex justify-between my-4 items-center">
                        <h3 class="mb-2 text-xl tracking-tight font-extrabold text-primary-800  ">
                            Total Days
                        </h3>

                        <div class="text-gray-600 sm:text-xl dark:text-gray-400 p-4 rounded">
                            <span class="bg-blue-100 text-blue-800 text-2xl font-medium me-2 px-3 py-4 rounded dark:bg-blue-900 dark:text-blue-300">
                                <span id="total_day">

                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="flex justify-between my-4 items-center">
                        <h3 class="mb-2 text-xl tracking-tight font-extrabold text-primary-800  ">
                            Total Price
                        </h3>

                        <div class="text-gray-600 sm:text-xl dark:text-gray-400 p-4 rounded">
                            <input name="price_per_day" type="hidden" value="<?= $car['price_per_day']; ?>">
                            <span class="bg-blue-100 text-blue-800 text-2xl font-medium me-2 px-3 py-4 rounded dark:bg-blue-900 dark:text-blue-300">
                                $<span id="total_price">
                                    <?= $car['price_per_day']; ?>
                                </span>
                                Per day
                            </span>
                        </div>
                    </div>

                    <div class="flex flex-col gap-2">
                        <button type="submit" class="w-full px-4 py-2 text-sm font-bold text-xl text-white bg-primary-800 rounded-lg hover:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-800">
                            Rent
                        </button>
                        <a href="/" class="text-center w-full px-4 py-2 text-sm font-medium text-white bg-red-500 rounded-lg hover:bg-red-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-800">
                            Cancel
                        </a>
                    </div>

                </div>
            </form>
        </div>
    </div>


</section>

<script>
    const quantity_select = document.getElementById('quantity_select');
    const total_price = document.getElementById('total_price');

    const price_per_day = <?= $car['price_per_day']; ?>;
    quantity_select.addEventListener('change', (e) => {
        total_price.innerText = price_per_day * e.target.value;
    });

    const start_date = document.getElementById('start_date');
    const end_date = document.getElementById('end_date');

    start_date.addEventListener('change', (e) => {
        const total_day = (new Date(end_date.value) - new Date(e.target.value)) / (1000 * 60 * 60 * 24) + 1;
        document.getElementById('total_day').innerText = total_day;
        total_price.innerText = price_per_day * total_day;
    });

    end_date.addEventListener('change', (e) => {
        const total_day = (new Date(e.target.value) - new Date(start_date.value)) / (1000 * 60 * 60 * 24) + 1;
        document.getElementById('total_day').innerText = total_day;
        total_price.innerText = price_per_day * total_day;
    });
</script>


<script>
    $(document).ready(function() {
        $('#rentForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serializeArray();
            var rentalData = {};

            formData.forEach(function(item) {
                rentalData[item.name] = item.value;
            });

            var startDate = new Date(rentalData['start_date']);
            var endDate = new Date(rentalData['end_date']);
            var totalDays = (endDate - startDate) / (1000 * 60 * 60 * 24) + 1;
            rentalData['total_days'] = totalDays;
            rentalData['total_price'] = totalDays * rentalData['price_per_day'];

            var rentals = JSON.parse(localStorage.getItem('rentals')) || [];

            var existingIndex = rentals.findIndex(r => r.car_id === rentalData['car_id']);

            if (existingIndex !== -1) {
                rentals[existingIndex] = rentalData;
            } else {
                rentals.push(rentalData);
            }

            localStorage.setItem('rentals', JSON.stringify(rentals));

            alert('Order placed successfully!');

            // Redirect to /my-order
            window.location.href = '/my-order';
        });

    });
</script>




<!-- $('#rentForm').on('submit', function(e) {
            e.preventDefault();
            var formData = $(this).serialize();

            $.ajax({
                url: '/rent',
                type: 'POST',
                data: formData,
                success: function(response) {
                    alert('Order placed successfully! Order ID: ' + response);
                },
                error: function() {
                    alert('Error placing order.');
                }
            });

        }); -->