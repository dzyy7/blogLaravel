<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ['title' => 'Home Page']);
});
Route::get('/posts', function () {
    $posts = [
        ['title' => 'Judul Artikel 1',
        'author' => 'Muhammad Dzaky',
        'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Recusandae saepe dolorum
                vel vitae quas iusto
                tenetur labore dolores amet temporibus, ad eaque sed possimus quibusdam. Voluptate dolore incidunt nam
                ad!'
        ],
        ['title' => 'Judul Artikel 2',
        'author' => 'Muhammad Dzaky',
        'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem est fuga amet
                sequi, libero voluptatibus provident non laborum. Facilis exercitationem sit quaerat doloremque fuga.
                Deserunt sunt neque tenetur debitis quam.'
        ],

    ];
    return view('posts', ['title' => 'Blog Page','posts' => $posts]);
});
Route::get('/about', function () {
    return view('about', ['title' => 'About Page']);
});
Route::get('/contact', function () {
    return view('contact' , ['title' => 'Contact Page']);
});