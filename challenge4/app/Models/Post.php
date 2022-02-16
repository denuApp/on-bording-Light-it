<?php

namespace App\Models;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\File;
use Spatie\YamlFrontMatter\YamlFrontMatter;

class Post
{
    public $title;

    public $excerpt;

    public $date;

    public $body;

    public $slug;

    public function __construct($title, $excerpt, $date, $body, $slug)
    {
        $this->title = $title;
        $this->excerpt = $excerpt;
        $this->date = $date;
        $this->body = $body;
        $this->slug = $slug;

    }


    public static function find($slug)
    {

        //of all the blog posts, find the one whith a slug that matches the one that was requested
        //  if(! file_exists($path = resource_path("posts/{$slug}.html"))){

        //     throw new ModelNotFoundException();
        // }

        // return cache()->remember("post.{$slug}" , now()->addMinutes(30), fn() => file_get_contents($path));

        return static::all()->firstWhere('slug', $slug);


    }

    public static function findOrFail($slug)
    {


        $post = static::find($slug);

        if(! $post){
            throw new ModelNotFoundException();
        }

        return $post;



    }

    public static function all()
    {
        return cache()->rememberForever('posts.all', function () {



            return collect(File::files(resource_path("posts")))
                ->map(fn($file) => YamlFrontMatter::parseFile($file))
                ->map(fn($document) =>
                    new Post(
                    $document->title,
                    $document->excerpt,
                    $document->date,
                    $document->body(),
                    $document->slug
                    )
                )
                ->sortByDesc('date');
        });

    }




}
