<form action="/checkout-items" method="post" class="mx-auto max-w-screen-xl px-10 py-4" onsubmit="makesure()">


    <div class="mt-6 flex flex-col">
        <div class="min-w-0 flex-1 space-y-8">
            <div class="space-y-4">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Delivery Details</h2>

                <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                    <div>
                        <label for="your_name" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Your name </label>
                        <input type="text" id="your_name" name="recipient_name" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="Bonnie Green" required />
                    </div>

                    <div>
                        <label for="phone-input-3" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Phone Number* </label>
                        <div class="flex items-center">
                            <div class="relative w-full">
                                <input type="text" id="phone-input" name="mobile" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="123-456-7890" required />
                            </div>
                        </div>
                    </div>

                    <div>
                        <label for="email" class="mb-2 block text-sm font-medium text-gray-900 dark:text-white"> Email </label>
                        <input type="email" id="email" name="email" class="block w-full rounded-lg border border-gray-300 bg-gray-50 p-2.5 text-sm text-gray-900 focus:border-primary-500 focus:ring-primary-500 dark:border-gray-600 dark:bg-gray-700 dark:text-white dark:placeholder:text-gray-400 dark:focus:border-primary-500 dark:focus:ring-primary-500" placeholder="name@flowbite.com" required />
                    </div>

                    <div>
                        <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Address</label>
                        <textarea id="address" name="addtext" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                        <input type="hidden" name="delivery_address" value="">
                        <script>
                            document.getElementById('address').addEventListener('input', function() {
                                document.getElementsByName('delivery_address')[0].value = this.value;
                            });
                        </script>
                    </div>


                </div>
            </div>

        </div>

        <div class="mt-10  w-full space-y-6 p-2">
            <div class="flow-root">
                <div class="-my-3 divide-y divide-gray-200 dark:divide-gray-800">
                    <dl class="flex items-center justify-between gap-4 py-3">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Original price</dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white"><span id="subTotalShow">0.0</span></dd>
                    </dl>


                    <dl class="flex items-center justify-between gap-4 py-3">
                        <dt class="text-base font-normal text-gray-500 dark:text-gray-400">Tax</dt>
                        <dd class="text-base font-medium text-gray-900 dark:text-white">$<span id="taxShow">0.0</span></dd>
                    </dl>

                    <dl class="flex items-center justify-between gap-4 py-3">
                        <dt class="text-base font-bold text-gray-900 dark:text-white">Total</dt>
                        <dd class="text-base font-bold text-gray-900 dark:text-white">$<span id="totalShow">0.0</span></dd>
                        <input type="hidden" name="total_price" id="totalPrice" value="0.0">
                    </dl>
                </div>
            </div>
            <div>
                <input type="hidden" name="cart" id="cart-data" value="">
                <button type="submit" class="flex w-full items-center justify-center rounded-lg bg-primary-700 px-5 py-2.5 text-sm font-medium text-white hover:bg-primary-800 focus:outline-none focus:ring-4 focus:ring-primary-300 dark:bg-primary-600 dark:hover:bg-primary-700 dark:focus:ring-primary-800">Complete Ordering</button>
            </div>

            <script>
                var cartData = localStorage.getItem('cart');
                document.getElementById('cart-data').value = cartData;
            </script>


        </div>
    </div>
</form>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>

    function makesure() {
        // Ask confirmation before submitting the form
        Swal.fire({
            title: 'Are you sure?',
            text: "You are about to place an order.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, place the order!'
        }).then((result) => {
            if (result.isConfirmed) {
                document.querySelector('form').submit();
            }
        });
    }

</script>