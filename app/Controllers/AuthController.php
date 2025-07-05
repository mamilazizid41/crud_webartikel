<?php
namespace App\Controllers;
use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller {
    public function login() {
        return view('auth/login');
    }

    public function register() {
        return view('auth/register');
    }

    public function attemptRegister() {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);

        $model->save(['username' => $username, 'password' => $password]);
        return redirect()->to('/login')->with('success', 'User registered successfully');
    }

    public function attemptLogin() {
        $model = new UserModel();
        $user = $model->where('username', $this->request->getPost('username'))->first();
        if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
            session()->set('logged_in', true);
            return redirect()->to('/');
        }
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    public function logout() {
        session()->destroy();
        return redirect()->to('login');
    }
}