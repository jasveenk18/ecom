<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductTable;
use CodeIgniter\Files\File;

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
            'productHDD' => $this->request->getPost('productHPP'),
            'productImage' => $this->request->getPost('productImage'),
        ];
        $imagePath =  $this->uploadFile();
        $data['productImage'] =     $imagePath;

        var_dump($imagePath);
         die;
        if ($productModel->save($data)) {

      
            return redirect()->to('/product/create')->with('success', 'Product added successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to add product');
        }
    }

    public function uploadFile(): string|bool
    {

        $target_dir = "public/images/";
        
        $ext = pathinfo($_FILES["productImage"]["name"], PATHINFO_EXTENSION);

        $fileUniqueName = $_FILES["productImage"]["tmp_name"].$ext;

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
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }
        return $target_dir.$fileUniqueName;
    }
    // Function to display all products
    public function showAllProducts()
    {
        $productModel = new ProductTable();
        $data['products'] = $productModel->getAllProducts();
        return view('allProduct', $data);
    }
}
