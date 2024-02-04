<?php

// Class representing a product manager with encapsulated products array
class ProductManager {
    private $products;

    // Constructor to set the initial products array
    public function __construct($products) {
        $this->products = $products;
    }

    // Method to retrieve product details by ID
    public function getProduct($productId) {
        $productDetails = null;
        foreach ($this->products as $product) {
            if ($product['id'] == $productId) {
                $productDetails = $product;
                break;
            }
        }
        return $productDetails;
    }
}

$products = [
    ['id' => 101, 'name' => 'Product 1', 'price' => 99.99],
    ['id' => 102, 'name' => 'Product 2', 'price' => 75.00],
    ['id' => 103, 'name' => 'Product 3', 'price' => 120.00],
];

// Creating an instance of ProductManager with dependency injection
$productManager = new ProductManager($products);

$productId = 102;
$product = $productManager->getProduct($productId);
echo 'Product Name: ' . $product['name'] . "\n";
echo 'Product Price: ' . $product['price'] . "\n";


