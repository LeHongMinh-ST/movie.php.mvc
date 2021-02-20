<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Category.php';
require_once 'app/models/User.php';

class CategoryController extends Controller
{
    public function index()
    {
        $model = new Category();

        $categories = $model->all();

        foreach ($categories as $category) {
            $userModel = new User();
            $user = $userModel->find($category->user_id);
            $category->user_id = $user->name;
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
            $data['user_id'] = $_SESSION['auth']['id'];
            $category = new Category();

            $success = $category->create($data);
            if ($success) {
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

        return $this->views('categories/update', [
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $data = $_POST;

        try {
            $category = new Category();

            $success = $category->update($id, $data);
            if ($success) {
                return $this->redirect(URL . '/admin/categories');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function destroy($id)
    {
        $model = new Category();

        $category = $model->delete($id);

        return $this->redirect(URL . '/admin/categories');
    }
}