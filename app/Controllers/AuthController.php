<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class AuthController extends BaseController
{
    private $userModel;
    public function __construct() {
        $this->userModel = new UserModel();
    }
    public function index()
    {
        //
    }

    public function login()
    {
        $title = 'Login';
        $components = [
            'header' => view('components/Header.php', ['title' => $title]),
            'navbar' => view('components/Navbar.php'),
            'footer' => view('components/Footer.php'),
        ];

        echo view('authentication/Login.php', [
            'components' => $components,
        ]);
    }

    public function postLogin()
    {
        $email = $_POST['email'];
        $password = hash('sha256', $_POST['password']);

        $user = $this->userModel->where('email', $email)->first();

        if ($user) {
            if ($user->password == $password) {
                unset($user->password);
                $_SESSION['user'] = $user;

                return redirect()->to(url_to('home'));
            }
        }
    }

    public function signUp()
    {
        $title = 'Registrar';
        $components = [
            'header' => view('components/Header.php', ['title' => $title]),
            'navbar' => view('components/Navbar.php'),
            'footer' => view('components/Footer.php'),
        ];

        echo view('authentication/SignUp.php', [
            'components' => $components,
        ]);
    }

    public function postSignup() {
        $data = [
            'name' => $_POST['name'],
            'email' => $_POST['email'],
            'password' => hash('sha256', $_POST['password']),
            'role' => 'USER',
            'receive_emails' => $_POST['receive_emails'] ?? false,
        ];

        $this->userModel->insert($data);

        return redirect()->to(url_to('login'));
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to(url_to('home'));
    }
}
