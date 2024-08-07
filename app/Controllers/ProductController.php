<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductTable;


class ProductController extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    // Function to display the form to add a product
    public function create()
    {
        return view('product'); // Ensure this matches your view name
    }

    // Function to store the new product
    public function store()
    {
        $productModel = new ProductTable();

        $data = [
            'productName' => $this->request->getPost('productName'),
            'productPrice' => $this->request->getPost('productPrice'),
            'productMRP' => $this->request->getPost('productMRP'),
            'productBrand' => $this->request->getPost('productBrand'),
            'productOS' => $this->request->getPost('productOS'),
            'productRAM' => $this->request->getPost('productRAM'),
            'productHDD' => $this->request->getPost('productHDD'),
            // 'productImage' => $this->request->getPost('productImage'),
        ];

        if ($productModel->saveProduct($data)) {
            return redirect()->to('/product/create')->with('success', 'Product added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add product');
        }
    }

    public function uploadFile()
    {

        $target_dir = "public/images/";
        $target_file = $target_dir . basename($_FILES["productImage"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["productImage"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["productImage"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (
            $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif"
        ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["productImage"]["tmp_name"], $target_file)) {
                echo "The file " . htmlspecialchars(basename($_FILES["productImage"]["name"])) . " has been uploaded.";
           // } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
    }
    // Function to display all products
    public function showAllProducts()
    {
        $productModel = new ProductTable();
        $data['products'] = $productModel->getAllProducts();
        return view('allProduct', $data);
    }



    public function details($id)
    {
        $productModel = new ProductTable();
        $data['product'] = $productModel->getProductDetails($id);
        // echo  "<pre>";
        // print_r($data['product']);
      
        if (empty($data['product'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Product not found');
        }

        return view('productView', $data);
    }
    public function update()
    {
        $cartData = $this->request->getPost('cart'); // Assuming you're sending the cart data as 'cart'

        // Process cart data here, e.g., update the cart in the session or database

        return redirect()->to('/cart'); // Redirect to the cart page or wherever appropriate

    }

    public function AddToCart($productId)
    {
        // Retrieve product details from the database
        $productModel = new ProductTable();

        $product = $productModel->find($productId);

        if (!$product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound('Product not found');
        }

        // Get user ID from session
        $session = session();
        $userId = $session->get('user_id'); // Assuming you store user ID in session as 'user_id'

        // Create cart data
        $cartData = [
            'product_id' => $productId,
            'product_name' => $product['product_name'],
            'price' => $product['price'],
            'user_id' => $userId,
            'order_status' => 1, // Assuming 1 means 'active' or 'added'
            'created_at' => date('Y-m-d H:i:s') // Current server time
        ];

        // Add cart data to database or session
        $cartModel = new \App\Models\CartModel();
        $cartModel->insert($cartData);

        // Redirect to cart page or wherever appropriate
        return redirect()->to('/cart');
    }
    public function add()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity', 1);

        $productModel = new ProductTable();
        $product = $productModel->find($productId);

        if ($product) {
            $cart = session()->get('cart') ?? [];
            if (isset($cart[$productId])) {
                $cart[$productId]['quantity'] += $quantity;
            } else {
                $cart[$productId] = [
                    'product' => $product,
                    'quantity' => $quantity,
                ];
            }
            session()->set('cart', $cart);

            $_SESSION['CartStatus'] = $cart;
        
            session()->markAsFlashdata('SuccessMessage');
        }

        return redirect()->to('/cart/success');
    }

    public function success()
    {
        return view('cart_success');
    }
    
}


