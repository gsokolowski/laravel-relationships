<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Article;
use App\User;

Route::get('/', function () {


    echo 'Type in url /articles or /profile/Greg';
});

Route::get('/articles', function () {

    $articles = Article::all();
    return View('articles/articles')->with('articles', $articles);
});

Route::get('/profile/{username}', function ($username) {

    $user = User::where('name', $username )->firstorFail();

    if(! $user ) {
        abort('404');
    }
    //dd($user);


    return View('profile/profile')->with('user', $user);
});
