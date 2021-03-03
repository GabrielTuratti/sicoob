<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('/morePopularMovies','TestController@morePopularMovies' );

Route::get('/latestMovies','TestController@latestMovies' );

Route::get('/allMovies', 'TestController@allMovies');

Route::get('/voteCountMovies', 'TestController@voteCountMovies');

