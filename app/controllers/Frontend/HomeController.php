<?php
require_once 'app/core/Controller.php';
require_once 'app/models/Movie.php';
require_once 'app/models/Video.php';
require_once 'app/models/Category.php';

class HomeController extends Controller
{
    public function index()
    {
        $modelMovie = new Movie();
        $movies = $modelMovie->limit(4)->orderBy('id', 'DESC')->get();

        foreach ($movies as $movie) {
            $modelCategory = new Category();
            $movie->category = $modelCategory->where('id', '=', $movie->category_id)->get();
        }

        $news = $modelMovie->limit(6)->orderBy('id', 'DESC')->get();
        foreach ($news as $new) {
            $modelCategory = new Category();
            $new->category = $modelCategory->where('id', '=', $new->category_id)->get();
        }

        $newMovies = $modelMovie->where(['type' => 0])->limit(6)->orderBy('id', 'DESC')->get();
        foreach ($newMovies as $newMovie) {
            $modelCategory = new Category();
            $newMovie->category = $modelCategory->where('id', '=', $newMovie->category_id)->get();
        }

        $newTVSeries = $modelMovie->where(['type' => 1])->limit(6)->orderBy('id', 'DESC')->get();
        foreach ($newTVSeries as $newTVSerie) {
            $modelCategory = new Category();
            $newTVSerie->category = $modelCategory->where('id', '=', $newTVSerie->category_id)->get();
        }

        return $this->views('frontend/pages/home', [
            'movies' => $movies,
            'news' => $news,
            'newMovies' => $newMovies,
            'newTVSeries' => $newTVSeries,
        ], MASTER_FRONTEND);
    }

    public function getAllMovie()
    {
        $modelMovie = new Movie();
        $movies = $modelMovie->where(['type' => 0])->orderBy('id', 'DESC')->get();
        foreach ($movies as $newMovie) {
            $modelCategory = new Category();
            $newMovie->category = $modelCategory->where('id', '=', $newMovie->category_id)->get();
        }

        return $this->views('frontend/pages/catalog', [
            'movies' => $movies,
            'title' => 'Phim lẻ'

        ], MASTER_FRONTEND);
    }

    public function getAllTVSeries()
    {
        $modelMovie = new Movie();
        $movies = $modelMovie->where(['type' => 1])->orderBy('id', 'DESC')->get();
        foreach ($movies as $newMovie) {
            $modelCategory = new Category();
            $newMovie->category = $modelCategory->where('id', '=', $newMovie->category_id)->get();
        }

        return $this->views('frontend/pages/catalog', [
            'movies' => $movies,
            'title' => 'Phim bộ'
        ], MASTER_FRONTEND);
    }

    public function getMovieOfCategory($slug)
    {

        $modelCategory = new Category();
        $modelMovie = new Movie();

        $category = $modelCategory->first(['slug' => $slug]);
        $movies = $modelMovie->where(['category_id' => $category->id])->get();

        foreach ($movies as $newMovie) {
            $modelCategory = new Category();
            $newMovie->category = $modelCategory->where('id', '=', $newMovie->category_id)->get();
        }

        return $this->views('frontend/pages/catalog', [
            'movies' => $movies,
            'title' => $category->name
        ], MASTER_FRONTEND);
    }

    public function showMovieDetail($slug)
    {
        $modelMovie = new Movie();
        $modelVideo = new Video();

        $movie = $modelMovie->first(['slug' => $slug]);

        $modelCategory = new Category();
        $movie->category = $modelCategory->where('id', '=', $movie->category_id)->get();

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

        $modelCategory = new Category();
        $movie->category = $modelCategory->where('id', '=', $movie->category_id)->get();

        $videos = $modelVideo->where(['movie_id' => $movie->id])->get();


        return $this->views('frontend/pages/tv-series-detail', [
            'movie' => $movie,
            'video' => $video,
            'videos' => $videos,
        ], MASTER_FRONTEND);
    }

    public function search(){
        $data = $_POST;

        $modelMovie = new Movie();
        $movies = $modelMovie->where('name','LIKE','%'.$data['key'].'%')->orderBy('id', 'DESC')->get();
        foreach ($movies as $movie) {
            $modelCategory = new Category();
            $movie->category = $modelCategory->where('id', '=', $movie->category_id)->get();
        }

        return $this->views('frontend/pages/catalog', [
            'movies' => $movies,
            'key' => 'Từ khóa: '.$data['key']

        ], MASTER_FRONTEND);
    }

    public function about(){
        return $this->views('frontend/pages/about',[],MASTER_FRONTEND);
    }
}