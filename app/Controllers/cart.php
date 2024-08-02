<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\ProductTable;

class Cart extends Controller
{
    public function index()
    {
        $cart = session()->get('cart') ?? [];
        return view('cart', ['cart' => $cart]);
    }

    public function add()
    {
        $productId = $this->request->getPost('product_id');
        $quantity = $this->request->getPost('quantity', 1);

        // Fetch the product from the database
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
        }

        return redirect()->to('/cart')->with('success', 'Product added to cart!');
    }
}
