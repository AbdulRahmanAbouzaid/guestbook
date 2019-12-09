<?php 


class UsersController extends Controller {

    public function showRegisterForm()
    {
        $this->middleware('guest');
        require 'views/register.view.php';
    }


    public function register()
    {
        $this->middleware('guest');

        $this->validate($_POST, [
            'email' => 'required|unique:users',
            'password' => 'required|email|confirmed|minSize:6|maxSize:16',
            'username' => 'required|noSpecialChars|minSize:8|maxSize:25',
        ]);

        $_POST['password'] = password_hash($_POST['password'], PASSWORD_BCRYPT, ['cost' => 12]);

        $user_id = User::create($_POST);

        session_start();
        $_SESSION['user_id'] = $user->id;

        return $this->redirectTo('/');
    }



    public function showLoginForm()
    {
        $this->middleware('guest');
        require 'views/login.view.php';
    }



    public function login()
    {
        $this->middleware('guest');

        session_start();        

        $this->validate($_POST, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $_POST['email'];
        if($result = User::where('email', '=', $email)){
            $user = $result[0];
            $input_password = $_POST['password'];
            if(password_verify($input_password, $user->password)){
                $_SESSION['user_id'] = $user->id;
                return $this->redirectTo('/');
            }
        }
        $_SESSION['errors'][] = 'Invalid Email or Password, please try agian';

        return $this->redirectTo('/login');
    }


    public function logout()
    {
        $this->middleware('auth');

        session_start();
        unset($_SESSION['user_id']);
        session_destroy();
        return $this->redirectTo('login');
    }
}