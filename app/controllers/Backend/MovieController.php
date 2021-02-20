<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Movie.php';
require_once 'app/models/User.php';
require_once 'app/models/Category.php';

class MovieController extends Controller
{
    public function index()
    {
        $model = new Movie();

        $movies = $model->all();

        foreach ($movies as $movie) {
            $userModel = new User();
            $user = $userModel->find($movie->user_id);
            $movie->user_id = $user->name;

            $categoryModel = new Category();

            if (!empty($movie->category_id)) {
                $category = $categoryModel->find($movie->category_id);
                $movie->category_id = $category->name;
            } else {
                $movie->category_id = "Chưa có danh mục";
            }

        }

        return $this->views('movies/index', [
            'movies' => $movies
        ]);
    }

    public function create()
    {
        $model = new Category();
        $categories = $model->all();

        return $this->views('movies/create', [
            'categories' => $categories
        ]);
    }

    public function store()
    {
        $data = $_POST;

        try {
            $data['user_id'] = $_SESSION['auth']['id'];

            $data['slug'] = to_slug($data['name']) . strtotime(date('Y-m-d H:i:s'));

            if ($_FILES['image']['name'] != "")
                $data['image'] = file_upload('/publics/storage/image', 'image', 5000000, array('JPG', 'png'));


            $movie = new Movie();

            $success = $movie->create($data);
            if ($success) {
                return $this->redirect(URL . '/admin/movies');
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
        $model = new Movie();

        $movie = $model->find($id);
        $model = new Category();
        $categories = $model->all();

        return $this->views('movies/update', [
            'movie' => $movie,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $data = $_POST;

        try {

            if ($_FILES['image']['name'] != "")
                $data['image'] = file_upload('/publics/storage/image', 'image', 5000000, array('JPG', 'png'));

            $data['slug'] = to_slug($data['name']) . strtotime(date('Y-m-d H:i:s'));

            $movie = new Movie();

            $success = $movie->update($id, $data);
            if ($success) {
                return $this->redirect(URL . '/admin/movies');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function destroy($id)
    {
        $model = new Movie();

        $model->delete($id);

        return $this->redirect(URL . '/admin/movies');
    }

}