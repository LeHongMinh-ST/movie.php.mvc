<?php
require_once 'app/core/Controller.php';
require_once 'app/models/User.php';

class LoginController extends Controller
{
    public function showFormLogin()
    {
        if ($this->isAuth()) {
            return $this->redirect(self::HOME_ADMIN);
        }
        return $this->views(null, [], 'auth/login');
    }

    public function login()
    {
        $input = $_POST;
        $modelUser = new User();
        $users = $modelUser->get();

        foreach ($users as $user) {
            $user = (array) $user;
            if ($user['email'] == $input['email']) {
                if ($user['password'] == md5($input['password'])) {
                    $_SESSION['auth'] = $user;
                    return $this->redirect(self::HOME_ADMIN);
                }

                $_SESSION['error']['password'] = "Mật khẩu không chính xác";
                return $this->redirect(self::LOGIN);
            }
        }
        $_SESSION['error']['email'] = "Email không tồn tại";
        return $this->redirect(self::LOGIN);
    }

    public function logout()
    {
        if ($this->isAuth()) {
            unset($_SESSION['auth']);
            return $this->redirect(self::LOGIN);
        }
    }
}