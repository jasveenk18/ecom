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


        // echo "Your User Name is :" . $postData['uName'] . "</br>";

        // echo "Your User Password is :" .   $password . " </br>";
        $loginFn = new LoginDetails();
        $returnData =  $loginFn->getLoginDetails($userName);
        // echo "< /br>";
        // print_r($returnData);
        $message  = "";
        $loginStatus = 'error';

        if ($returnData) {
            if ($returnData['password'] == $password) {
                // echo "User Found email id : " . $returnData['email_id'];

                $newdata = [
                    'id'  => $returnData['ID'],
                    'email'     => $returnData['email_id'],
                    'logged_in_status' => true,
                ];
                
                session()->set($newdata);
                $message =  "You are successfully loged in";

                $loginStatus = true;
            } else {
                $loginStatus = 'error';
                $message =  "Incorrect login details";
            }
        } else {
            $loginStatus = 'error';
            $message =  "User name not found";
        }
        var_dump( $loginStatus);
        $_SESSION['loginMessage'] = $message;
        $_SESSION['loginStatus'] = $loginStatus;
        
        session()->markAsFlashdata('loginMessage');
        session()->markAsFlashdata('loginStatus');
        // die;
        return redirect()->to('/'); 


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
            'zipcode' => $this->request->getPost('zipcode'),
            'user_id' => session()->get('id')


        ];
        // print_r($data);die;
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
        return redirect()->to('/'); 
    }
    public function showForm()
    {
        return view('address_form');
    }
    

    public function duplicateAddress()
    {
        // Load the model
        $duplicateAddress = new \App\Models\MyAddress();
    
        // Get the form data
        $houseNo = $this->request->getPost('house_no');
        $addressLine1 = $this->request->getPost('address_line_1');
        $addressLine2 = $this->request->getPost('address_line_2');
        $locality = $this->request->getPost('locality');
        $city = $this->request->getPost('city');
        $zipCode = $this->request->getPost('zip_code');
    
        // Check if the address already exists
        if ($duplicateAddress->addressExists($houseNo, $addressLine1, $addressLine2, $locality, $city, $zipCode)) {
            // Address already exists, handle accordingly
            return redirect()->back()->withInput()->with('error', 'This address is already registered.');
        }
    
        // Save the address if it does not exist
        $data = [
            'house_no' => $houseNo,
            'address_line_1' => $addressLine1,
            'address_line_2' => $addressLine2,
            'locality' => $locality,
            'city' => $city,
            'zip_code' => $zipCode,
            'user_id' => session()->get('id')
        ];
    
        if ($duplicateAddress->insert($data)) {
            return redirect()->to('/addresses')->with('success', 'Address saved successfully.');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to save the address.');
        }
    }
    public function showAllAddresses()
    {

        // echo "ii";die;
        $addressModel = new MyAddress();
        $user_ID = session()->get('id');
        // Fetch all addresses
        $data['addresses'] = $addressModel->getAllAddresses($user_ID);
            // print_r($data['addresses']);die;
        // Load the view and pass the addresses data
        return view('allAddress', $data);
    }
    public function showFormPage()
    {
        // Get the user ID from session
        $user_id = session()->get('user_id');
        
        if ($user_id) {
            // Load your address model
            $addressModel = new MyAddress();

            // Fetch addresses for the logged-in user
            $addresses = $addressModel->getAllAddresses($user_id);

            // Pass addresses to the view
            return view('your_form_page', ['addresses' => $addresses]);
        } else {
            // Handle the case where there is no logged-in user
            return redirect()->to('/login')->with('error', 'Please log in first');
        }
    }
    public function editAddress($id)
    
    {

        
        $model = new MyAddress();
        $data['address'] = $model->find($id);
        // echo "<pre>";
        // print_r($data['address']);die;
        if (empty($data['address'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Address not found');
        }

        return view('editAddress', $data);
    }

    public function updateAddress()
    {
        $model = new MyAddress();

        $data = [
            'house_no' => $this->request->getPost('house_no'),
            'address_line1' => $this->request->getPost('address_line1'),
            'address_line2' => $this->request->getPost('address_line2'),
            'locality' => $this->request->getPost('locality'),
            'city' => $this->request->getPost('city'),
            'zipcode' => $this->request->getPost('zipcode')
        ];

        $id = $this->request->getPost('tableId');
        if ($model->update($id, $data)) {
            return redirect()->to('/AllAddresses')->with('success', 'Address updated successfully');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to update address');
        }
    }
}








