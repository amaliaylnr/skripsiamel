<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // cek role, apakah sebagai superadmin? jika tidak maka redirect ke dashboard.
        if(session()->get('role') != 'superadmin'){
            return redirect()->to('dashboard');
        }
        return view('welcome_message');
    }
}
