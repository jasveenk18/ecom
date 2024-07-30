<?php

namespace App\Models;

use CodeIgniter\Model;

class MyAddress extends Model
{
    // Define the table name
    protected $table = 'my_address';
    
    // Define the primary key of the table
    protected $primaryKey = 'id';
    
    // Specify if the table uses auto-incrementing IDs
    protected $useAutoIncrement = true;
    
    // Specify the return type of the model's data
    protected $returnType = 'array';
    
    // Disable soft deletes
    protected $useSoftDeletes = false;
    
    // Protect fields from mass assignment
    protected $protectFields = true;
    
    // Specify allowed fields for mass assignment
    protected $allowedFields = ['house_no', 'address_line1', 'address_line2', 'locality', 'city', 'zipcode', 'user_id'];

    // Additional configurations (if needed)
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';
    
    // Define validation rules (if any)
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    // Method to save an address
    public function saveAddress($data)
    {
        $this->insert($data);
    }

    // Method to check if an address already exists
    public function addressExists($houseNo, $addressLine1, $addressLine2, $locality, $city, $zipCode)
    {
        return $this->where([
            'house_no' => $houseNo,
            'address_line1' => $addressLine1,
            'address_line2' => $addressLine2,
            'locality' => $locality,
            'city' => $city,
            'zipcode' => $zipCode
        ])->first() !== null;
    }

    // Method to check if an address is a duplicate
    public function duplicateAddress($data)
    {
        return $this->addressExists(
            $data['house_no'],
            $data['address_line1'],
            $data['address_line2'],
            $data['locality'],
            $data['city'],
            $data['zipcode']
        );
    }

    // Method to fetch all addresses
    public function getAllAddresses($user_id): array|null
    {

        $query = $this->db->table("my_address")
        ->select("*")
        ->where("user_id",$user_id)
        ->get()->getResultArray();

return $query;

    }                                                                  

    // Method to fetch all addresses for a specific user
    public function getIdSpecificAddresses($user_id): array|null
    {
        return $this->where('user_id', $user_id)
                    ->findAll();
    }

    public function saveProduct(array $data): bool
    {
        return $this->save($data);
    }
}




