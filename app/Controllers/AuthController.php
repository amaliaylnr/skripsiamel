<?php

namespace App\Controllers;

use App\Models\AuthModel;
use CodeIgniter\RESTful\ResourceController;

class AuthController extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format
     *
     * @return mixed
     */
    public function index()
    {
        helper(['form']);
        $data = [];
        return view('auth/login', $data);
    }

    public function login()
    {
        $session = session();
        $userModel = new AuthModel();
        $nipd = $this->request->getVar('nipd');
        $password = $this->request->getVar('password');
        
        $data = $userModel->where('nipd', $nipd)->first();
        
        if($data){
            $pass = $data['password'];
            $authenticatePassword = password_verify($password, $pass); #emdehateam
            if($authenticatePassword){
                $ses_data = [
                    'id' => $data['id_user'],
                    'nipd' => $data['nipd'],
                    'email' => $data['email'],
                    'role'  => $data['role'],
                    'isLoggedIn' => TRUE
                ];
                $session->set($ses_data);
                return redirect()->to('dashboard');
            
            }else{
                $session->setFlashdata('msg', ' Password is incorrect.');
                return redirect()->to('login');
            }
        }else{
            $session->setFlashdata('msg', 'NIPD does not exist.');
            return redirect()->to('login');
        }
    }
    public function register()
    {
        helper(['form']);
        $data = [];
        return view('auth/register', $data);
    }

    /**
     * Return the properties of a resource object
     *
     * @return mixed
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties
     *
     * @return mixed
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters
     *
     * @return mixed
     */
    public function create()
    {
        helper(['form']);
        $rules = [
            'nipd'          => 'required|min_length[15]|max_length[20]|is_unique[users.nipd]',
            'email'         => 'required|min_length[4]|max_length[100]|valid_email|is_unique[users.email]',
            'password'      => 'required|min_length[4]|max_length[50]',
            'confirmpassword'  => 'matches[password]'
        ];
          
        if($this->validate($rules)){
            $userModel = new AuthModel();
            $data = [
                'nipd'     => $this->request->getVar('nipd'),
                'email'    => $this->request->getVar('email'),
                'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
                'role'     => 'admin',
            ];
            $userModel->save($data);
            return redirect()->to('login');
        }else{
            $data['validation'] = $this->validator;
            echo view('auth/register', $data);
        }
    }

    /**
     * Return the editable properties of a resource object
     *
     * @return mixed
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties
     *
     * @return mixed
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model
     *
     * @return mixed
     */
    public function delete($id = null)
    {
        //
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('login');
    }
}
