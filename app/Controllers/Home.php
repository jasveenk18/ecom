<?php

namespace App\Controllers;

use mysqli; // Make sure to import the mysqli class
use App\Models\LoginDetails;

class Home extends BaseController
{
    public function index(): string
    {
        return view('welcome_message'); // Renders the welcome_message view
    }

    public function login(): string
    {

        return view('loginView'); // Renders the loginView 
    }

    private function getDbConnection()
    {
        $servername = "localhost";
        $username = "abc";
        $password = "123";
        $dbname = "ecom2";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }

    public function loginSubmit()
    {


        $postData = $this->request->getPost();

        $userName = $postData['uName'];
        $password = $postData['password'];


        echo "Your User Name is :" . $postData['uName'] . "</br>";

        echo "Your User Password is :" .   $password . " </br>";
        $loginFn = new LoginDetails();
        $returnData =  $loginFn->getLoginDetails($userName);
        echo "< /br>";
        print_r($returnData);

        if ($returnData) {
            if ($returnData['password'] == $password) {
                echo "User Found email id : " . $returnData['email_id'];
            } else {
                echo "Incorrect login details";
            }
        } else {
            echo "User name not found";
        }
    }
    public function save()
    {
        $model = new FamilyMemberModel();

        $data = [
            'name' => $this->request->getPost('name'),
            'relationship' => $this->request->getPost('relationship'),
            'age' => $this->request->getPost('age'),
            'occupation' => $this->request->getPost('occupation')
        ];

        $model->save($data);

        return redirect()->to('/family');
    }

    // Create family_members table (Run this once, then you can remove or comment it out)
    public function createTable()
    {
        $db = \Config\Database::connect();
        $forge = \Config\Database::forge();

        $forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 6,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => FALSE
            ],
            'relationship' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
                'null' => FALSE
            ],
            'age' => [
                'type' => 'INT',
                'constraint' => 3,
                'null' => FALSE
            ],
            'occupation' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
                'null' => TRUE
            ],
            'reg_date' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'on_update' => 'CURRENT_TIMESTAMP'
            ]
        ]);

        $forge->addKey('id', TRUE);
        $forge->createTable('family_members', TRUE);

        echo "Table family_members created successfully";
    }

}
    