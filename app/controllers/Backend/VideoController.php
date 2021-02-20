<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Video.php';
require_once 'app/models/Movie.php';
require_once 'app/models/User.php';

class VideoController extends Controller
{
    public function index()
    {
        $model = new Video();

        $videos = $model->all();

        foreach ($videos as $video) {
            $userModel = new User();
            $movieModel = new Movie();

            $user = $userModel->find($video->user_id);
            $video->user_id = $user->name;

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
            $data['user_id'] = $_SESSION['auth']['id'];
            $video = new Video();

            $success = $video->create($data);
            if ($success) {
                return $this->redirect(URL . '/admin/videos');
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
        $modelMovie = new Movie();
        $modelVideo = new Video();
        $movies = $modelMovie->all();
        $video = $modelVideo->find($id);

        return $this->views('videos/update', [
            'movies' => $movies,
            'video' => $video
        ]);
    }

    public function update($id)
    {
        $data = $_POST;

        try {
            $data['user_id'] = $_SESSION['auth']['id'];
            $video = new Video();

            $success = $video->update($id,$data);
            if ($success) {
                return $this->redirect(URL . '/admin/videos');
            }

        } catch (\Exception $e) {
            return $this->redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function destroy($id)
    {
        $model = new Video();

        $model->delete($id);

        return $this->redirect(URL . '/admin/videos');
    }

}