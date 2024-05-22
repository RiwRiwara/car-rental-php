<section class="bg-white dark:bg-gray-900">

    <div class="py-8 px-4 mx-auto max-w-screen-2xl sm:py-16 lg:px-6">
        <div class="w-full mb-6">
            <h3 class="text-xl tracking-tight font-medium text-gray-400">
                My Orders
            </h3>
            <h2 class="mb-4 text-4xl tracking-tight font-extrabold text-primary-800 uppercase">
                Order List
            </h2>

            <div id="orderList" class="grid grid-cols-1 gap-6">
                <!-- Orders will be displayed here -->
            </div>

            <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />
        </div>
    </div>
</section>


<script>
    $(document).ready(function() {
        var orderList = $('#orderList');
        var orders = JSON.parse(localStorage.getItem('rentals')) || [];

        if (orders.length === 0) {
            orderList.html('<p class="text-gray-600 sm:text-xl dark:text-gray-400 p-4 bg-gray-100 shadow-inner rounded">No orders found.</p>');
        } else {
            orders.forEach(function(order, index) {
                var orderItem = `
                    <form class="p-4 bg-gray-100 shadow-inner rounded" id="orderForm${index}">
                        <h3 class="mb-2 text-xl tracking-tight font-extrabold text-primary-800">
                            Order ${index + 1}
                        </h3>
                        <p class="text-gray-600 sm:text-xl dark:text-gray-400">
                            Car ID: ${order.car_id}<br>
                            Name: ${order.name}<br>
                            Email: ${order.email}<br>
                            Phone: ${order.phone}<br>
                            License: ${order.license}<br>
                            Start Date: ${order.start_date}<br>
                            End Date: ${order.end_date}<br>
                            Quantity: ${order.quantity}<br>
                            Total Days: ${order.total_days}<br>
                            Total Price: $${order.total_price}
                        </p>
                        <input type="hidden" name="car_id" value="${order.car_id}">
                        <input type="hidden" name="name" value="${order.name}">
                        <input type="hidden" name="email" value="${order.email}">
                        <input type="hidden" name="phone" value="${order.phone}">
                        <input type="hidden" name="license" value="${order.license}">
                        <input type="hidden" name="start_date" value="${order.start_date}">
                        <input type="hidden" name="end_date" value="${order.end_date}">
                        <input type="hidden" name="quantity" value="${order.quantity}">
                        <input type="hidden" name="total_days" value="${order.total_days}">
                        <input type="hidden" name="total_price" value="${order.total_price}">
                        <button type="submit" class="confirmOrderBtn w-full px-4 py-2 mt-4 text-sm font-bold text-xl text-white bg-primary-800 rounded-lg hover:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-800" data-order-index="${index}">
                            Confirm Order
                        </button>
                        <button type="button" class="cancelOrderBtn w-full px-4 py-2 mt-4 text-sm font-bold text-xl text-white bg-red-600 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-600" data-order-index="${index}">
                            Cancel Order
                        </button>
                    </form>
                `;
                orderList.append(orderItem);
            });
        }

        $(document).on('submit', 'form', function(event) {
            event.preventDefault();
            var orderIndex = $(this).find('button.confirmOrderBtn').data('order-index');
            var formData = $(this).serialize();
            var orders = JSON.parse(localStorage.getItem('rentals')) || []; // Re-fetch orders to ensure it's up-to-date

            $.ajax({
                url: '/rent',
                type: 'POST',
                data: formData,
                success: function(response) {
                    if (
                        JSON.parse(response).success === true
                    ) {
                        alert('Order confirmed successfully!');

                        // Remove the order from local storage
                        orders.splice(orderIndex, 1);
                        localStorage.setItem('rentals', JSON.stringify(orders));

                        // Reload the page to update the order list
                        window.location.href = '/my-order';
                    } else {
                        console.log(response);
                        alert(`Error confirming order. ${response}`);
                    }
                },
                error: function(error) {
                    console.error('Error:', error);
                    alert('Error confirming order.');
                }
            });
        });

        $(document).on('click', '.cancelOrderBtn', function() {
            var orderIndex = $(this).data('order-index');
            var orders = JSON.parse(localStorage.getItem('rentals')) || []; // Re-fetch orders to ensure it's up-to-date

            // Remove the order from local storage
            orders.splice(orderIndex, 1);
            localStorage.setItem('rentals', JSON.stringify(orders));

            // Reload the page to update the order list
            window.location.href = '/my-order';
        });
    });
</script>
