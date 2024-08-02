<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductTable extends Model
{
    protected $table            = 'product_table';
    protected $primaryKey       = 'productID';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = [];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    // protected $useTimestamps = false;
    // protected $dateFormat    = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function saveProduct($data): bool
    {
        $response = $this->insert($data);
        if ($response) {
            return true;
        }
        return false;
    } // Add a method to get products by user




    public function getAllProducts(): array|null
    {

        $query = $this->db->table("product_table")
            ->select("*")
            ->get()->getResultArray();

        return $query;
    }


    public function getProductsByUser($userID)
    {
        return $this->where('user_ID', $userID)->findAll();
    }
    public function getProductDetails($id): array|null
    {


        $query = $this->db->table("product_table")
            ->select("*")
            ->where("id", $id)
            ->get()->getRowArray();

        return $query;
    }
}
// class ProductModel extends Model
// {
//     protected $table = 'product_table';
//     protected $primaryKey = 'id';
//     protected $allowedFields = ['name', 'price', 'description'];


  
// }
