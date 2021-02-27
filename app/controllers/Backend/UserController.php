<?php
require_once 'app/core/Controller.php';
require_once 'app/models/User.php';

class UserController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuth()) {
            return $this->redirect(URL . '/admin/login');
        }
    }

    public function index()
    {
        $auth = $_SESSION['auth'];
        if ($auth['role'] !=1) {
            echo '403';
            exit();
        }

        $model = new User();

        $user = $model->all();

        return $this->views('users/index', [
            'users' => $user
        ]);
    }

    public function create()
    {
        return $this->views('users/create');
    }

    public function store()
    {
        $data = $_POST;

        try {
            $data['password'] = md5('123456');
            $model = new User();

            $users = $model->all();

            if ($data['name'] == ''){
                $_SESSION['error']['name'] = "Vui lòng nhập tên người dùng";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if ($data['email'] == ''){
                $_SESSION['error']['email'] = "Vui lòng nhập email";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            foreach ($users as $user){
                if($data['email'] == $user->email){
                    $_SESSION['error']['email'] = "Email đã tồn tại !";
                    return $this->redirect($_SERVER['HTTP_REFERER']);
                }
            }

            $success = $model->create($data);
            if ($success) {
                $_SESSION['success'] = "Tạo mới thành công";
                return $this->redirect(URL . '/admin/users');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $model = new User();

        $user = $model->find($id);

        return $this->views('users/update',[
            'user'=>$user
        ]);

    }

    public function update($id)
    {
        $data = $_POST;

        try {
            $model = new User();

            $users = $model->where('id','<>',$id)->get();

            if ($data['name'] == ''){
                $_SESSION['error']['name'] = "Vui lòng nhập tên người dùng";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if ($data['email'] == ''){
                $_SESSION['error']['email'] = "Vui lòng nhập email";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            foreach ($users as $user){
                if($data['email'] == $user->email){
                    $_SESSION['error']['email'] = "Email đã tồn tại !";
                    return $this->redirect($_SERVER['HTTP_REFERER']);
                }
            }
            $success = $model->update($id,$data);
            if ($success) {
                $_SESSION['success'] = "Cập nhật thành công";
                return $this->redirect(URL . '/admin/users');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }

    }

    public function destroy($id)
    {
        $model = new User();

        $model->delete($id);
        $_SESSION['success'] = "Xóa thành công";
        return $this->redirect(URL . '/admin/users');
    }

    public function getFormResetPassword(){
        return $this->views('users/reset-password');
    }

    public function getFomrResetPasswordUser($id){
        return $this->views('users/reset-password-user',[
            'user_id'=>$id
        ]);
    }

    public function resetPassword(){
        $data = $_POST;

        try {
            $auth = $_SESSION['auth'];

            if ($data['password'] ==''){
                $_SESSION['error']['password'] = "Mật khẩu không được để trống !";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if ($data['old_password'] ==''){
                $_SESSION['error']['old_password'] = "Mật khẩu cũ không được để trống !";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if (md5($data['old_password']) != $auth['password']){
                $_SESSION['error']['old_password'] = "Mật khẩu không chính xác";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if ($data['password'] != $data['confirm_password']){
                $_SESSION['error']['password'] = "Mật khẩu và Mật khẩu xác nhận không trùng khớp !";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            $input['password'] = md5($data['password']);

            $model = new User();



            $model->update($auth['id'],$input);
            $_SESSION['success'] = "Cập nhật mật khẩu thành công";
            return $this->redirect(URL.'/admin');

        }catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }


    public function resetPasswordUser($id){
        $data = $_POST;

        try {

            if ($data['password'] ==''){
                $_SESSION['error']['password'] = "Mật khẩu không được để trống !";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if ($data['password'] != $data['confirm_password']){
                $_SESSION['error']['password'] = "Mật khẩu và Mật khẩu xác nhận không trùng khớp !";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            $input['password'] = md5($data['password']);

            $model = new User();


            $model->update($id,$input);
            $_SESSION['success'] = "Cập nhật mật khẩu thành công";
            return $this->redirect(URL.'/admin/users');

        }catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }
}