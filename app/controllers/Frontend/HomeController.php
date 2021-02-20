<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Movie.php';
require_once 'app/models/Video.php';

class HomeController extends Controller
{
    public function index()
    {
        $modelMovie = new Movie();
        $movies = $modelMovie->limit(5)->orderBy('id', 'DESC')->get();
        return $this->views('frontend/pages/home', [
            'movies' => $movies
        ], MASTER_FRONTEND);
    }

    public function getAllMovie()
    {

    }

    public function showMovieDetail($slug)
    {
        $modelMovie = new Movie();
        $modelVideo = new Video();

        $movie = $modelMovie->first(['slug' => $slug]);
        $video = $modelVideo->first(['movie_id' => $movie->id]);

        return $this->views('frontend/pages/movie-detail', [
            'movie' => $movie,
            'video' => $video,
        ], MASTER_FRONTEND);
    }

    public function showTVSeriesDetail($slug, $id = null)
    {
        $modelMovie = new Movie();
        $modelVideo = new Video();

        $movie = $modelMovie->first(['slug' => $slug]);
        if ($id == null)
            $video = $modelVideo->first(['movie_id' => $movie->id]);
        else
            $video = $modelVideo->first(['id' => $id]);

        $videos = $modelVideo->where(['movie_id' => $movie->id])->get();



        return $this->views('frontend/pages/tv-series-detail', [
            'movie' => $movie,
            'video' => $video,
            'videos' => $videos,
        ], MASTER_FRONTEND);
    }
}