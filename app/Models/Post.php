<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Post{
    public static function all(){
        return [
            [
            'id' => 1,
            'slug' => 'judul-artikel-1',
            'title' => 'Judul Artikel 1',
            'author' => 'Muhammad Dzaky',
            'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae saepe dolorum
                    vel vitae quas iusto
                    tenetur labore dolores amet temporibus, ad eaque sed possimus quibusdam. Voluptate dolore incidunt nam
                    ad!'
            ],
            [
            'id' => 2,
            'slug' => 'judul-artikel-2',
            'title' => 'Judul Artikel 2',
            'author' => 'Muhammad Dzaky',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem est fuga amet
                    sequi, libero voluptatibus provident non laborum. Facilis exercitationem sit quaerat doloremque fuga.
                    Deserunt sunt neque tenetur debitis quam.'
            ],
        ];
    }
    public static function find($slug){
        // return Arr::first(static::all(), function ($post) use ($slug) {
        // return $post['slug'] == $slug;
        // });
        return Arr::first(static::all(), fn($post) => $post['slug'] == $slug) ?? abort(404);
        }
    }