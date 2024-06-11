<?php

namespace App\Models;

class post
{
    private static $blog_posts = [
        [
            "tittle" => "judul pertama",
            "slug" => "judul-pertama",
            "author" => "ihsannn",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda molestias reiciendis libero tempore, repudiandae nobis, suscipit repellendus iste sequi repellat quas nisi adipisci! Harum laborum alias omnis ea earum nemo debitis incidunt asperiores deleniti, eos pariatur expedita voluptatem dolorum sed, qui unde cum recusandae necessitatibus. Voluptate, aut ratione? Rerum, odit. Molestiae soluta odit perferendis fuga, mollitia fugit distinctio eligendi quibusdam eveniet eaque obcaecati a officia quidem repellendus eum vero fugiat ut rem reiciendis nisi sequi. Culpa ipsum voluptatum fuga sed laboriosam doloribus dignissimos vero quidem voluptate eveniet doloremque soluta minus porro deserunt totam ex velit, excepturi repellat molestias consequatur rerum?"
        ],
        [
            "tittle" => "judul kedua",
            "slug" => "judul-kedua",
            "author" => "ihsan",
            "body" => "Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda molestias reiciendis libero tempore, repudiandae nobis, suscipit repellendus iste sequi repellat quas nisi adipisci! Harum laborum alias omnis ea earum nemo debitis incidunt asperiores deleniti, eos pariatur expedita voluptatem dolorum sed, qui unde cum recusandae necessitatibus. Voluptate, aut ratione? Rerum, odit. Molestiae soluta odit perferendis fuga, mollitia fugit distinctio eligendi quibusdam eveniet eaque obcaecati a officia quidem repellendus eum vero fugiat ut rem reiciendis nisi sequi. Culpa ipsum voluptatum fuga sed laboriosam doloribus dignissimos vero quidem voluptate eveniet doloremque soluta minus porro deserunt totam ex velit, excepturi repellat molestias consequatur rerum?"
        ]

    ];

    public static function all()
    {

        return collect(self::$blog_posts);
    }

    public static function find($slug)
    {
        $post = static::all();
        // $new_post = [];
        // foreach ($post as $p) {
        //     if ($p['slug'] === $slug)
        //         $new_post = $p;
        // }
        return $post->firstWhere('slug', $slug);
    }
}
