<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*  api  1f54bd990f1cdfb230adb312546d765d
Tarefas:
    -Endpoint para filtrar filmes;
    -Endpoint para listagem de filmes por Genero escolhido;     
                
    */

class TestController extends Controller
{
    // Endpoint para listar os filmes + Populares; 
    public function voteCountMovies(){
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=1f54bd990f1cdfb230adb312546d765d&language=en-US&sort_by=vote_count.desc&include_adult=false&include_video=false&page=1";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = json_decode(curl_exec($ch));
    
        foreach ($response->results as $title) {
    
            echo "----------------------------------------------------------------<br>";
            echo "<tb><strong>Titulo</strong>: ".$title->title;
            echo "<li> linguagem: " . $title->original_language;
            echo "<li> overview: " . $title->overview;
            echo "<li> popularity: " . $title->popularity;
            echo "<li> release_date: " . $title->release_date;
            echo "<li> media da nota: " . $title->vote_average."  | <a> quantidade de votos: ".$title->vote_count."<br>" ;
        }
        return view('voteCountMovies', ['' => $response]);
    }
    // -Endpoint para listagem de lançamentos;    
    public function latestMovies(){
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=1f54bd990f1cdfb230adb312546d765d&language=en-US&sort_by=primary_release_date.desc&include_adult=false&include_video=false&page=1";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = json_decode(curl_exec($ch));

        foreach ($response->results as $title) {
            
            echo "----------------------------------------------------------------<br>";
            echo "<tb><strong>Titulo</strong>: ".$title->title;
            echo "<li> linguagem: " . $title->original_language;
            echo "<li> overview: " . $title->overview;
            echo "<li> popularity: " . $title->popularity;
            echo "<li> release_date: " . $title->release_date;
            echo "<li> media da nota: " . $title->vote_average."  | <a> quantidade de votos: ".$title->vote_count."<br>" ;
           
        }
        return view('latestMovies', ['' => $response]);
    
    }
// -Endpoint para listagem de todos os filmes;  
    public function allMovies(){
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=1f54bd990f1cdfb230adb312546d765d&language=en-US&sort_by=original_title.asc&include_adult=false&include_video=false&page=1";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
      
        $response = json_decode(curl_exec($ch));

        $data = json_encode($response);

        foreach ($response->results as $title) {
            
            echo "----------------------------------------------------------------<br>";
            echo "<tb><strong>Titulo</strong>: ".$title->title;
            echo "<li> linguagem: " . $title->original_language;
            echo "<li> overview: " . $title->overview;
            echo "<li> popularity: " . $title->popularity;
            echo "<li> release_date: " . $title->release_date;
            echo "<li> media da nota: " . $title->vote_average."  | <a> quantidade de votos: ".$title->vote_count."<br>" ;
           
        }
        return view('allMovies', ['data' => $data]);
    }
    
    public function morePopularMovies(){
        $url = "https://api.themoviedb.org/3/discover/movie?api_key=1f54bd990f1cdfb230adb312546d765d&language=en-US&sort_by=original_title.asc&include_adult=false&include_video=false&page=1";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
        $response = json_decode(curl_exec($ch));

        foreach ($response->results as $title) {
            
            echo "----------------------------------------------------------------<br>";
            echo "<tb><strong>Titulo</strong>: ".$title->title;
            echo "<li> linguagem: " . $title->original_language;
            echo "<li> overview: " . $title->overview;
            echo "<li> popularity: " . $title->popularity;
            echo "<li> release_date: " . $title->release_date;
            echo "<li> media da nota: " . $title->vote_average."  | <a> quantidade de votos: ".$title->vote_count."<br>" ;
            
        }
        return view('filtroMovies', ['' => $response]);
}   
}
