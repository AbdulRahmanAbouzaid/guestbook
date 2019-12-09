<?php 


class UsersController extends Controller {

    public function showRegisterForm()
    {
        require 'views/register.view.php';
    }


    public function register()
    {
        $this->validate($_POST, [
            'email' => 'required|unique:users',
            'password' => 'required|confirmed|minSize:6',
            'username' => 'required',
        ]);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $user_id = User::create($_POST);

        session_start();
        $_SESSION['user_id'] = $user->id;

        return $this->redirectTo('/');
    }
}