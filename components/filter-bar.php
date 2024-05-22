<?php
$year_list = array(
    "2020", "2019", "2018", "2017", "2016", "2015", "2014", "2013", "2012", "2011", "2010",
    "2009", "2008", "2007", "2006", "2005", "2004", "2003", "2002", "2001", "2000",
);

$car_types = array("sedan", "suv", "hatchback", "truck");
$car_brand = array("Toyota", "Honda", "Nissan", "Mitsubishi");
?>

<div class="w-full">
    <!-- Start coding here -->
    <div class="relative bg-primary-800 shadow-md dark:bg-gray-800 sm:rounded-lg">
        <div class="flex flex-col items-center justify-between p-4 space-y-3 md:flex-row md:space-y-0 md:space-x-4">
            <div class="w-full md:w-1/2">
                <form class="flex items-center">
                    <label for="search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewbox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <input 
                        value="<?= isset($_GET['search']) ? $_GET['search'] : "" ?>"
                        name="search" type="text" id="search" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Search" required="">
                    </div>
                </form>
            </div>
            <div class="flex flex-col items-stretch justify-end flex-shrink-0 w-full space-y-2 md:w-auto md:flex-row md:space-y-0 md:items-center md:space-x-3">

                <div class="flex items-center w-full space-x-3 md:w-auto">

                    <select id="type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option <?php if (!isset($_GET['type'])) : ?> selected <?php endif; ?>>All</option>
                        >All</option>
                        <?php foreach ($car_types as $type) : ?>
                            <option <?php if (isset($_GET['type']) && $_GET['type'] == $type) : ?> selected <?php endif; ?> value="<?= $type ?>"><?= ucfirst($type) ?></option>
                        <?php endforeach; ?>

                    </select>


                    <select id="brand" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option <?php if (!isset($_GET['brand'])) : ?> selected <?php endif; ?>>All</option>
                        >All</option>
                        <?php foreach ($car_brand as $brand) : ?>
                            <option <?php if (isset($_GET['brand']) && $_GET['brand'] == $brand) : ?> selected <?php endif; ?> value="<?= $brand ?>"><?= $brand ?></option>
                        <?php endforeach; ?>

                    </select>


                    <select id="year" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option <?php if (!isset($_GET['year'])) : ?> selected <?php endif; ?>>All</option>
                        <?php foreach ($year_list as $year) : ?>
                            <option <?php if (isset($_GET['year']) && $_GET['year'] == $year) : ?> selected <?php endif; ?> value="<?= $year ?>"><?= $year ?></option>
                        <?php endforeach; ?>

                    </select>

                    <a href="/" class="text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">
                        Clear
                    </a>

                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        // Trigger search or filter update
        function updateUrl() {
            var search = $('#search').val();
            var type = $('#type').val();
            var brand = $('#brand').val();
            var year = $('#year').val();

            var queryParams = [];
            if (search) queryParams.push('search=' + encodeURIComponent(search));
            if (type) queryParams.push('type=' + encodeURIComponent(type));
            if (brand) queryParams.push('brand=' + encodeURIComponent(brand));
            if (year) queryParams.push('year=' + encodeURIComponent(year));

            var queryString = queryParams.join('&');
            window.location.href = '?' + queryString;
        }

        $('#search').on('keypress', function(e) {
            if (e.which == 13) { 
                e.preventDefault(); 
                updateUrl();
            }
        });

        $('#type, #brand, #year').on('change', function() {
            updateUrl();
        });
    });
</script>