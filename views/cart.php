<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="public/js/tailwind.js"></script>
    <link href="public/css/style.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <title>Cart</title>
</head>

<body>
    <header>
        <?php include_once  "components/navbar.php"; ?>
    </header>

    <main class="min-h-100">
        <section class="bg-white py-8 antialiased dark:bg-gray-900 md:py-16">
            <div class="mx-auto max-w-screen-xl px-4 2xl:px-0">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white sm:text-2xl">Shopping Cart</h2>

                <!-- cart items -->
                <div class="mt-6 sm:mt-8 md:gap-6 lg:flex lg:items-start xl:gap-8">
                    <div id="cartItems" class="mx-auto w-full flex-none lg:max-w-2xl xl:max-w-4xl">


                    </div>

                    <div class="mx-auto mt-6 max-w-4xl flex-1 space-y-6 lg:mt-0 lg:w-full" id="process-section">
                        <div class="space-y-4 rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 sm:p-6">
                            <p class="text-xl font-semibold text-gray-900 dark:text-white">Order summary</p>

                            <div class="space-y-4">
                                <div class="space-y-2">
                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white" id="order-sum">$0.00</dd>
                                    </dl>




                                    <dl class="flex items-center justify-between gap-4">
                                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                                        <dd class="text-base font-medium text-gray-900 dark:text-white">$<span id="tax">0.0</span></dd>
                                    </dl>
                                </div>

                                <dl class="flex items-center justify-between gap-4 border-t border-gray-200 pt-2 dark:border-gray-700">
                                    <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                                    <dd class="text-base font-bold text-gray-900 dark:text-white">$<span id="total">0.0</span></dd>
                                </dl>
                            </div>

                            <button type="button" data-modal-target="default-modal" data-modal-toggle="default-modal" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Proceed to Checkout</button>

                            <div class="flex items-center justify-center gap-2">
                                <span class="text-sm font-normal text-gray-500 dark:text-gray-400"> or </span>
                                <a href="/products" title="" class="inline-flex items-center gap-2 text-sm font-medium text-primary-700 underline hover:no-underline dark:text-primary-500">
                                    Continue Shopping
                                    <svg class="h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 12H5m14 0-4 4m4-4-4-4" />
                                    </svg>
                                </a>
                            </div>
                        </div>



                        <!-- Main modal -->
                        <div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                            <div class="relative p-4 w-full max-w-4xl max-h-full">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <?php include_once  "components/checkout.php"; ?>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </section>
    </main>


    <footer>
        <?php include_once  "components/footer.php"; ?>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var order_sum = 0.0;

        document.addEventListener("DOMContentLoaded", function() {
            var carts = JSON.parse(localStorage.getItem('cart')) || {};

            if (Object.keys(carts).length === 0) {
                document.getElementById('cartItems').innerHTML = `
                <div class="w-full max h-96 flex items-center justify-center">
                    <p class="text-xl font-semibold text-gray-900 dark:text-white">No items in cart</p>
                </div>
                `;

                document.getElementById('process-section').style.display = 'none';

            } else {
                displayCartItems();
            }
        });

        async function getProductById(productId) {
            const response = await fetch(`/product/${productId}`, {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            if (!response.ok) {
                throw new Error('Failed to fetch product');
            }

            return response.json();
        }

        async function displayCartItems() {
            var cartItems = JSON.parse(localStorage.getItem('cart')) || {};

            var cartContainer = document.getElementById('cartItems');

            for (var productId in cartItems) {
                var item = cartItems[productId];
                var quantity = item.quantity;
                var price = item.price;



                try {
                    const productData = await getProductById(productId);
                    var img = productData.ImageURL;

                    console.log(productData);

                    var cartItemHTML = `
                    <div class="space-y-6">
                            <div class="rounded-lg border border-gray-200 bg-white p-4 shadow-sm dark:border-gray-700 dark:bg-gray-800 md:p-6">
                                <div class="space-y-4 md:flex md:items-center md:justify-between md:gap-6 md:space-y-0">
                                    <a href="#" class="shrink-0 md:order-1">
                                        <img class="h-20 w-20 " src="/public/images/products/${img}" alt="imac image" />
                                    </a>

                                    <label for="counter-input-${productId}" class="sr-only">Choose quantity:</label>
                                    <div class="flex items-center justify-between md:order-3 md:justify-end">
                                        <div class="flex items-center">
                                            <button type="button" id="decrement-button-${productId}" onclick="decrementButton(${productId})" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16" />
                                                </svg>
                                            </button>
                                            <input type="text" id="counter-input-${productId}" data-input-counter class="w-10 shrink-0 border-0 bg-transparent text-center text-sm font-medium text-gray-900 focus:outline-none focus:ring-0 dark:text-white" placeholder=""  required value="${quantity}"/>
                                            <button type="button" id="increment-button-${productId}"  onclick="incrementButton(${productId})" class="inline-flex h-5 w-5 shrink-0 items-center justify-center rounded-md border border-gray-300 bg-gray-100 hover:bg-gray-200 focus:outline-none focus:ring-2 focus:ring-gray-100 dark:border-gray-600 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700">
                                                <svg class="h-2.5 w-2.5 text-gray-900 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16" />
                                                </svg>
                                            </button>
                                        </div>
                                        <div class="text-end md:order-4 md:w-32">
                                            <p  class="text-sm text-gray-500 ">${(productData.Price)} x <span id="multi-${productId}">${quantity}</span></p>
                                            <p id="price-${productId}" class="text-base font-bold text-gray-900 dark:text-white">${(productData.Price * quantity).toFixed(2)}</p>
                                        </div>
                                    </div>

                                    <div class="w-full min-w-0 flex-1 space-y-4 md:order-2 md:max-w-md">
                                        <a href="#" class="text-base font-medium text-gray-900 hover:underline dark:text-white">${productData.Name}</a>

                                        <div class="flex items-center gap-4">

                                            <button type="button" class="inline-flex items-center text-sm font-medium text-red-600 hover:underline dark:text-red-500"
                                            onclick="removeCartItem(${productId})"
                                            >
                                                <svg class="me-1.5 h-5 w-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6" />
                                                </svg>
                                                Remove
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                `;

                    order_sum += productData.Price * quantity;

                    cartContainer.insertAdjacentHTML('beforeend', cartItemHTML);
                } catch (error) {
                    console.error('Error fetching product:', error);
                }



            }

            document.getElementById('order-sum').textContent = `$${order_sum.toFixed(2)}`;
            document.getElementById('tax').textContent = (order_sum * 0.07).toFixed(2);
            document.getElementById('total').textContent = (order_sum + (order_sum * 0.07)).toFixed(2);

            document.getElementById('subTotalShow').textContent = `$${order_sum.toFixed(2)}`;
            document.getElementById('taxShow').textContent = (order_sum * 0.07).toFixed(2);
            document.getElementById('totalShow').textContent = (order_sum + (order_sum * 0.07)).toFixed(2);

        }

        function incrementButton(productId) {
            var input = document.getElementById(`counter-input-${productId}`);
            var quantity = parseInt(input.value) + 1;



            updateCartItemQuantity(productId, quantity, "increase");
        }

        function decrementButton(productId) {
            var input = document.getElementById(`counter-input-${productId}`);
            var quantity = parseInt(input.value) - 1;
            if (quantity < 1) {
                quantity = 1;
            }

            updateCartItemQuantity(productId, quantity, 'decrease');
        }

        function updateCartItemQuantity(productId, quantity, action) {
            var cartItems = JSON.parse(localStorage.getItem('cart')) || {};
            cartItems[productId].quantity = quantity;

            price = cartItems[productId].price;

            if (action === 'increase') {
                order_sum += parseFloat(price);
            } else {
                order_sum -= parseFloat(price);
            }

            if (!cartItems[productId]) {
                cartItems[productId] = {
                    quantity: 1
                };
            }

            localStorage.setItem('cart', JSON.stringify(cartItems));
            document.getElementById(`price-${productId}`).textContent = (quantity * price).toFixed(2);
            document.getElementById(`counter-input-${productId}`).value = quantity;
            document.getElementById('order-sum').textContent = `$${order_sum.toFixed(2)}`;
            document.getElementById('tax').textContent = (order_sum * 0.07).toFixed(2);
            document.getElementById('total').textContent = (order_sum + (order_sum * 0.07)).toFixed(2);
            document.getElementById(`multi-${productId}`).textContent = quantity;

            document.getElementById('subTotalShow').textContent = `$${order_sum.toFixed(2)}`;
            document.getElementById('taxShow').textContent = (order_sum * 0.07).toFixed(2);
            document.getElementById('totalShow').textContent = (order_sum + (order_sum * 0.07)).toFixed(2);
            document.getElementById('totalPrice').value = (order_sum + (order_sum * 0.07)).toFixed(2);

            var cartData = localStorage.getItem('cart');
            document.getElementById('cart-data').value = cartData;


        }

        function removeCartItem(productId) {


            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {


                    var cartItems = JSON.parse(localStorage.getItem('cart')) || {};
                    var price = cartItems[productId].price;
                    var quantity = cartItems[productId].quantity;

                    delete cartItems[productId];

                    order_sum -= parseFloat(price) * quantity;

                    localStorage.setItem('cart', JSON.stringify(cartItems));
                    document.getElementById('order-sum').textContent = `$${order_sum.toFixed(2)}`;
                    document.getElementById('tax').textContent = (order_sum * 0.07).toFixed(2);
                    document.getElementById('total').textContent = (order_sum + (order_sum * 0.07)).toFixed(2);
                    document.getElementById(`price-${productId}`).textContent = (0).toFixed(2);
                    document.getElementById(`counter-input-${productId}`).value = 0;
                    document.getElementById(`multi-${productId}`).textContent = 0;

                    document.getElementById(`counter-input-${productId}`).value = 0;
                    document.getElementById(`price-${productId}`).textContent = (0).toFixed(2);
                    document.getElementById(`multi-${productId}`).textContent = 0;
                    document.getElementById('totalPrice').value = `${order_sum.toFixed(2)}`;

                    var cartItem = document.getElementById(`counter-input-${productId}`).closest('.space-y-6');
                    cartItem.remove();

                    Swal.fire(
                        'Deleted!',
                        'Your item has been removed.',
                        'success'
                    )
                }
            })




        }
    </script>

</body>

</html>