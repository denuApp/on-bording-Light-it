<?php

use App\Models\Post;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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

Route::get('/', function () {


    // $posts = array_map(function($file){
    //     $document = YamlFrontMatter::parseFile($file);

    //     return new Post(
    //         $document->title,
    //         $document->excerpt,
    //         $document->date,
    //         $document->body,
    //         $document->slug
    //     );
    // }, $files );



    //return view('posts', ['posts' => $post] );

     return view('posts', [
         'posts' => Post::all()
     ]);

});

Route::get('post/{post}', function ($slug) {

    //Finf a post by a slug and pass it to a view called 'post'

    return view('post', [
        'post' => Post::find($slug)
    ]);


})-> where('post', '[A-z_\-]+');