<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function index()
    {
        return view('login');  // Muestra la vista de login
    }

    public function login()
    {
        $session = session();
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->where('username', $username)->first();

        if ($user && password_verify($password, $user['password'])) {
            $session->set('logged_in', true);
            $session->set('user_id', $user['id']);
            return redirect()->to('/dashboard');  // Redirige al dashboard después de loguearse
        } else {
            $session->setFlashdata('error', 'Usuario o contraseña incorrectos.');
            return redirect()->to('/');  // Redirige al login con un mensaje de error
        }
    }

    public function register()
    {
        return view('register');  // Muestra la vista de registro
    }

    public function registerUser()
    {
        $userModel = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
        ];

        if ($userModel->insert($data)) {
            return redirect()->to('/');  // Redirige al login después de registrarse
        } else {
            return redirect()->back()->with('error', 'Hubo un problema al registrarte.');  // Muestra un error en caso de fallo
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();  // Destruye la sesión
        return redirect()->to('/');  // Redirige al login después de cerrar sesión
    }
}
