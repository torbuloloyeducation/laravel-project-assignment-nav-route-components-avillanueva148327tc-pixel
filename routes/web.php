<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome', [
    'greeting' => 'Hello, World!',
    'name' => 'John Doe',
    'age' => 30,
    'tasks' => [
        'Learn Laravel',
        'Build a project',
        'Deploy to production',
    ],
]);

Route::get('/about', function () {
    return view('about');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/formtest', function(){
    $emails = session()->get('$emails', []);

    return view('formtest',[
        'emails' => $emails,
    ]);
});

Route::post('/formtest', function(){
    $email = request('email');

    session()->push('$emails', $email);

    return redirect('/formtest');
});

Route::get('/delete-emails', function(){
    session()->forget('$emails');
    return redirect('/formtest');
});

Route::get('/services', function () {
    return view('services');
});


Route::get('/showcases', function () {
    return view('showcases');
});

Route::get('/blog', function () {
    return view('blog');
});