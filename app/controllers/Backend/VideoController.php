<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Video.php';
require_once 'app/models/Movie.php';
require_once 'app/models/User.php';

class VideoController extends Controller
{
    public function __construct()
    {
        if (!$this->isAuth()) {
            return $this->redirect(URL . '/admin/login');
        }
    }

    public function index()
    {
        $model = new Video();

        $videos = $model->all();

        foreach ($videos as $video) {
            $userModel = new User();
            $movieModel = new Movie();

            $user = $userModel->find($video->user_id);
            $video->user = $user->name;

            if (!empty($video->movie_id)) {
                $movie = $movieModel->find($video->movie_id);
                $video->movie_id = $movie->name;
            } else {
                $video->movie_id = "Không có thuộc vào phim nào!";
            }
        }

        return $this->views('videos/index', [
            'videos' => $videos
        ]);
    }

    public function create()
    {
        $modelMovie = new Movie();
        $movies = $modelMovie->all();

        return $this->views('videos/create', [
            'movies' => $movies
        ]);
    }

    public function store()
    {
        $data = $_POST;

        try {

            if ($data['name'] == ''){
                $_SESSION['error']['name'] = "Vui lòng nhập tên video";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if ($data['source'] == ''){
                $_SESSION['error']['source'] = "Vui lòng mã nguồn video";
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            $data['user_id'] = $_SESSION['auth']['id'];
            $video = new Video();

            $success = $video->create($data);
            if ($success) {
                $_SESSION['success'] = "Tạo mới thành công";
                return $this->redirect(URL . '/admin/videos');
            }

        } catch (\Exception $e) {

            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function show($id)
    {
        $modelMovie = new Movie();
        $modelVideo = new Video();

        $video = $modelVideo->find($id);
        $movie = $modelMovie->find($video->movie_id);

        if ($movie->type == 1)
            $this->redirect(URL.'/tv-series/'.$movie->slug.'/'.$id);
        else
            $this->redirect(URL.'/movies/'.$movie->slug);
    }

    public function edit($id)
    {
        $modelMovie = new Movie();
        $modelVideo = new Video();
        $movies = $modelMovie->all();
        $video = $modelVideo->find($id);

        if ($video->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
            echo 'ERROR - 403';
            exit();
        }

        return $this->views('videos/update', [
            'movies' => $movies,
            'video' => $video
        ]);
    }

    public function update($id)
    {
        $data = $_POST;

        try {

            $error = false;
            if ($data['name'] == ''){
                $_SESSION['error']['name'] = "Vui lòng nhập tên video";
                $error = true;
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            if ($data['source'] == ''){
                $_SESSION['error']['source'] = "Vui lòng mã nguồn video";
                $error = true;
                return $this->redirect($_SERVER['HTTP_REFERER']);
            }

            $data['user_id'] = $_SESSION['auth']['id'];
            $model = new Video();

            $video = $model->find($id);

            if ($video->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
                echo 'ERROR - 403';
                exit();
            }

            $success = $model->update($id,$data);
            if ($success) {
                $_SESSION['success'] = "Cập nhật thành công";
                return $this->redirect(URL . '/admin/videos');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function destroy($id)
    {
        $model = new Video();

        $video = $model->find($id);

        if ($video->user_id != $_SESSION['auth']['id'] && $_SESSION['auth']['role'] != 1) {
            echo 'ERROR - 403';
            exit();
        }

        $model->delete($id);
        $_SESSION['success'] = "Xóa thành công";
        return $this->redirect(URL . '/admin/videos');
    }

}