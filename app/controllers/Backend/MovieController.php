<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Movie.php';
require_once 'app/models/User.php';
require_once 'app/models/Category.php';
require_once 'app/models/Video.php';

class MovieController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuth()) {
            return $this->redirect(URL . '/admin/login');
        }
    }

    public function index()
    {
        $model = new Movie();

        $movies = $model->all();

        foreach ($movies as $movie) {
            $userModel = new User();
            $user = $userModel->find($movie->user_id);
            $movie->user = $user->name;

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
            if ($data['name'] == ''){
                $_SESSION['error']['name'] = "Vui lòng nhập tên phim";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            $data['user_id'] = $_SESSION['auth']['id'];

            $data['slug'] = to_slug($data['name']) . strtotime(date('Y-m-d H:i:s'));

            if ($_FILES['image']['name'] != "")
                $data['image'] = file_upload('/publics/storage/image', 'image', 5000000, array('JPG', 'png'));


            $movie = new Movie();

            $success = $movie->create($data);
            if ($success) {
                $_SESSION['success'] = "Tạo mới thành công";
                return $this->redirect(URL . '/admin/movies');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function show($id)
    {
        $model = new Movie();

        $movie = $model->find($id);

        if ($movie->type == 1)
            $this->redirect(URL.'/tv-series/'.$movie->slug);
        else
            $this->redirect(URL.'/movies/'.$movie->slug);
    }

    public function edit($id)
    {
        $model = new Movie();

        $movie = $model->find($id);
        $model = new Category();
        $categories = $model->all();

        if ($movie->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
            echo 'ERROR - 403';
            exit();
        }

        return $this->views('movies/update', [
            'movie' => $movie,
            'categories' => $categories
        ]);
    }

    public function update($id)
    {
        $data = $_POST;

        try {
            if ($data['name'] == ''){
                $_SESSION['error']['name'] = "Vui lòng nhập tên phim";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if ($_FILES['image']['name'] != "")
                $data['image'] = file_upload('/publics/storage/image', 'image', 5000000, array('JPG', 'png'));

            $data['slug'] = to_slug($data['name']) . strtotime(date('Y-m-d H:i:s'));

            $model = new Movie();

            $movie = $model->find($id);

            if ($movie->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
                echo 'ERROR - 403';
                exit();
            }

            $success = $model->update($id, $data);
            if ($success) {
                $_SESSION['success'] = "Cập nhật thành công";
                return $this->redirect(URL . '/admin/movies');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function destroy($id)
    {
        $model = new Movie();

        $movie = $model->find($id);

        if ($movie->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
            echo 'ERROR - 403';
            exit();
        }

        $modelVideo = new Video();
        $videos = $modelVideo->where('movie_id','=',$movie->id)->get();

        foreach ($videos as $video){
            $data = [
              'movie_id'=>null
            ];
            $modelVideo->update($video->id,$data);
        }

        $model->delete($id);
        $_SESSION['success'] = "Xóa thành công";
        return $this->redirect(URL . '/admin/movies');
    }

}