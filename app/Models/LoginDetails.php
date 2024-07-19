<?php

namespace App\Models;

use CodeIgniter\Model;

class LoginDetails extends Model
{
    protected $table            = 'logindetails';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [];
    protected $DBGroup    = "default";

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

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


    public function getLoginDetails(string $userName ): array|null{


        $query = $this->db->table("loginDetails")
                ->select("ID,email_id,login_id,password")
                ->where("login_id",$userName)
                ->get()->getRowArray();

        return $query;
    }
    public function getSignupDetails(string $userName ): array|null{
      $data = [
    
        'email_id'       => 'My email',
        'login_id'        => 'My loginid',
        'password' => "",
    ];
    return null;
  
  }


  public function getUserList(): array|null
  {


    $query = $this->db->table("loginDetails")
            ->select("ID,email_id,login_id,password")
            ->get()->getResultArray();

    return $query;
  }
}

    






