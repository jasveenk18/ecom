<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductTable;

class Cart extends BaseController
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        return view('cart', ['cart' => $cart]);
    }

    public function add($id)
    {
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity', 1);

        // Fetch the product from the database
        $productModel = new ProductTable();
        $product = $productModel->find($productId);

        if ($product) {
            $cart = session()->get('cart') ?? [];
            if (isset($cart[$productId])) {

                /// write insert code here
                $myAddressModel = new ProductTable();

                $data = [
                    'house_no' => $this->request->getPost('house_no'),
                    'address_line1' => $this->request->getPost('address_line1'),
                    'address_line2' => $this->request->getPost('address_line2'),
                    'locality' => $this->request->getPost('locality'),
                    'city' => $this->request->getPost('city'),
                    'zipcode' => $this->request->getPost('zipcode'),
                    'user_id' => session()->get('id')
        
        
                ];
                // print_r($data);die;
                $myAddressModel->saveAddress($data);

            }
            session()->set('cart', $cart);
            $_SESSION['CartStatus'] = "cart added successfully";

            session()->markAsFlashdata('CartStatus');
        }

        return redirect()->to('/myCart')->with('success', 'Product added to cart!');
    }
    public function success()
    {
        return view('cart_success');
    }

    public function cartitems()
    {
        // $session = session();
        // $userId = $session->get('user_id');

        // $cartModel = new ProductTable();
        // $cartItems = $cartModel->getCartItems($userId);
        echo "hi";die;
        // return view('cart', ['cart' => $cartItems]);


    }
}
