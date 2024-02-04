<?php

// Function to retrieve product details by ID
function get_product($products, $productId) {
    $productDetails = null; // Initialize with null to handle cases where the product is not found
    foreach ($products as $product) {
        if ($product['id'] == $productId) { // Corrected the assignment operator and added a missing parenthesis
            $productDetails = $product;
            break; // Stop the loop once the product is found
        }
    }
    return $productDetails;
}

$products = [
    ['id' => 101, 'name' => 'Product 1', 'price' => 99.99],
    ['id' => 102, 'name' => 'Product 2', 'price' => 75.00],
    ['id' => 103, 'name' => 'Product 3', 'price' => 120.00],
];

$productId = 102;
$product = get_product($products, $productId);
echo 'Product Name: ' . $product['name'] . "\n";
echo 'Product Price: ' . $product['price'] . "\n";

