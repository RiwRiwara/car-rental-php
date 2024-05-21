<?php
require_once 'config/db.php';


$category = isset($_GET['category']) ? $_GET['category'] : '';
$keyword = isset($_GET['keyword']) ? $_GET['keyword'] : '';


try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM Products";

    if (!empty($category)) {
        $sql .= " WHERE Category = :category";
    }

    if (!empty($keyword)) {
        $sql .= " WHERE (Name LIKE :keyword OR Category LIKE :keyword OR Unit LIKE :keyword OR Price LIKE :keyword)";
    }

    $stmt = $conn->prepare($sql);

    if (!empty($category)) {
        $stmt->bindParam(':category', $category);
    }

    if (!empty($keyword)) {
        $keyword = '%' . $keyword . '%';
        $stmt->bindParam(':keyword', $keyword);
    }

    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $image = '/public/images/products/' . $product['ImageURL'];

        $header_status = '';
        $isInStock = true;

        if ($product['Amount'] == 0) {
            $header_status = '
                <div class="w-full bg-red-200 text-center text-red-800 font-bold">
                    Not In Stock
                </div>
            ';
            $isInStock = false;
        } else {
            $header_status = '
                <div class="w-full bg-green-200 text-center  text-green-800 font-bold">
                    InStock
                </div>
            ';
        }


        echo '
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">'
            . $header_status .

            '<div>
                    <img class="p-8 rounded-md" src="' . $image . '" alt="' . $product['Name'] . ' image"  />
                </div>
                <div class="px-5 pb-5">
                    <h5 class="text-xl font-semibold tracking-tight text-gray-900">' . $product['Name'] . '</h5>
                    <div class="flex items-center mt-4">
                        $<span id="price-' . $product['ProductID'] . '" class="text-3xl font-bold text-gray-900">' . $product['Price'] . '</span>
                        <span class="text-gray-400 text-sm ml-2">' . $product['Unit'] . '</span>
                    </div>
                    <div>
                        <p class="text-gray-400 text-sm">' . $product['Amount'] . '/10</p>
                    </div>';

        if ($isInStock) {
            echo '
                        <div>
                            <input type="hidden" name="add_to_cart" value="' . $product['ProductID'] . '">
                            <button onclick="addToCart(' . $product['ProductID'] . ')" type="submit" class="bg-blue-500 text-white py-2 px-4 mt-4 rounded">Add to Cart</button>
                        </div>';
        } else {
            echo '
                        <div>
                            <button type="button" class="bg-gray-300 text-gray-600 py-2 px-4 mt-4 rounded cursor-not-allowed" disabled>Out of Stock</button>
                        </div>';
        }


        echo  '
                </div>
            </div>';
    }
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function addToCart(productId) {
        var cart = JSON.parse(localStorage.getItem('cart')) || {};
        var now = new Date().getTime();
        var expires = now + (24 * 60 * 60 * 1000); // 24 hours from now

        if (!cart[productId]) {
            cart[productId] = {
                addedAt: now,
                expiresAt: expires,
                quantity: 1,
                price: document.getElementById('price-' + productId).innerText
            };
        } else {
            cart[productId].quantity++;
        }

        localStorage.setItem('cart', JSON.stringify(cart));

        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: 'Product added to cart',
        });



    }
</script>