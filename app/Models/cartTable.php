<?php namespace App\Models;

use CodeIgniter\Model;
class CartModel extends Model
{
    protected $table = 'cart'; // Name of your cart table
    protected $primaryKey = 'id';
    protected $allowedFields = ['product_id', 'product_name', 'price', 'user_id', 'order_status', 'created_at'];
    public function getCartItems($userId)
    {
        return $this->where('user_id', $userId)
                    ->findAll();
    }
}
