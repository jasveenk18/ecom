<?php

namespace App\Controllers;

use mysqli; // Make sure to import the mysqli class
use App\Models\LoginDetails;
use App\Models\MyAddress;

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

                $newdata = [
                    'id'  => $returnData['ID'],
                    'email'     => $returnData['email_id'],
                    'logged_in_status' => true,
                ];
                
                session()->set($newdata);

            } else {
                echo "Incorrect login details";
            }
        } else {
            echo "User name not found";
        }
    }
    public function saveAddress()
    {
        $myAddressModel = new MyAddress();

        $data = [
            'house_no' => $this->request->getPost('house_no'),
            'address_line1' => $this->request->getPost('address_line1'),
            'address_line2' => $this->request->getPost('address_line2'),
            'locality' => $this->request->getPost('locality'),
            'city' => $this->request->getPost('city'),
            'zipcode' => $this->request->getPost('zipcode')


        ];

        $myAddressModel->saveAddress($data);

        //return redirect()->to('/family');
    }

    public function listUser()
    {
        $loginFn = new LoginDetails();
        $userData =  $loginFn->getUserList();

        $data111['userDetails'] =         $userData;
        return view('listUser', $data111); // Renders the loginView 
    }



    public function address(): string
    {

        echo "Welcome : ".session()->get('email');
        return view('address'); // Renders the loginView 
    }

    public function logout(){
        $data = [
            'id' ,
            'email' , 
            'logged_in_status' 
        ];
        session()->remove($data);
    }
}
