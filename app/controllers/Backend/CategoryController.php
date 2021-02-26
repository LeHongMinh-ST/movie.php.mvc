<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Category.php';
require_once 'app/models/User.php';

class CategoryController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuth()) {
            return $this->redirect(URL . '/admin/login');
        }
    }

    public function index()
    {
        $model = new Category();

        $categories = $model->all();

        foreach ($categories as $category) {
            $userModel = new User();
            $user = $userModel->find($category->user_id);
            $category->user = $user->name;
        }

        return $this->views('categories/index', [
            'categories' => $categories
        ]);

    }

    public function create()
    {
        $model = new Category();
        $categories = $model->where(['parent_id' => 0])->get();

        return $this->views('categories/create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {

        $data = $_POST;

        try {
            if ($data['name'] == '') {
                $_SESSION['error']['name'] = "Vui lòng nhập tên danh mục";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            $data['user_id'] = $_SESSION['auth']['id'];
            $data['slug'] = to_slug($data['name']);
            $category = new Category();

            $success = $category->create($data);
            if ($success) {
                $_SESSION['success'] = "Tạo mới thành công";
                return $this->redirect(URL . '/admin/categories');
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
        $model = new Category();

        $category = $model->find($id);
        $categories = $model->where(['parent_id' => 0])->get();

        if ($category->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
            echo 'ERROR - 403';
            exit();
        }

        return $this->views('categories/update', [
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $data = $_POST;

        try {

            if ($data['name'] == '') {
                $_SESSION['error']['name'] = "Vui lòng nhập tên danh mục";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            $model = new Category();
            $category = $model->find();

            if ($category->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
                echo 'ERROR - 403';
                exit();
            }
            $data['slug'] = to_slug($data['name']) . strtotime(date('Y-m-d H:i:s'));
            $success = $model->update($id, $data);
            if ($success) {
                $_SESSION['success'] = "Cập nhật thành công";
                return $this->redirect(URL . '/admin/categories');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function destroy($id)
    {
        $model = new Category();
        $category = $model->find();
        if ($category->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
            echo 'ERROR - 403';
            exit();
        }
        $model->delete($id);
        $_SESSION['success'] = "Xóa thành công";
        return $this->redirect(URL . '/admin/categories');
    }
}