<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function index()
    {
        $title = 'Daftar User';
        $model = new UserModel();
        $users = $model->findAll();

        return view('user/index', compact('users', 'title'));
    }

    public function login()
    {
        helper(['form']);

        // Check if this is a POST request (form submission)
        if ($this->request->getMethod() !== 'POST') {
            return view('user/login');
        }

        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        $session = session();
        $model = new UserModel();

        $user = $model->where('useremail', $email)->first();

        if ($user) {
            $hashedPassword = $user['userpassword'];

            // Test password verification
            $passwordMatch = password_verify($password, $hashedPassword);

            if ($passwordMatch) {
                $sessionData = [
                    'user_id'    => $user['id'],
                    'username'   => $user['username'],
                    'useremail'  => $user['useremail'],
                    'isLoggedIn' => true,
                ];

                $session->set($sessionData);
                return redirect()->to('/admin/artikel');
            } else {
                $session->setFlashdata('flash_msg', 'Password salah.');
                return redirect()->to('/user/login');
            }
        } else {
            $session->setFlashdata('flash_msg', 'Email tidak terdaftar.');
            return redirect()->to('/user/login');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/user/login');
    }
}
