<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/submit', function () {
    return view('submit');
});

Route::post('/submit', function () {
    return ('Form submitted successfully!');
});

Route::put('/update', function () {
    return ('Form updated successfully!');
});

Route::delete('/delete', function () {
    return ('Form deleted successfully!');
});

Route::prefix("/admin")->group(function () {
    Route::get('/student', function () {
        return view("admin.student");
    });

    Route::get('employee', function () {
        return view("admin.employee");
    });

    Route::get('/lecture', function () {
        return view("admin.lecture");
    });
});

Route::match(['get', 'post', 'delete'], '/feedback', function (Request $request) {
    if ($request->isMethod('post')) {
        return 'Form submitted';
    }else if($request->isMethod('delete')){
        return 'Form deleted';
    }
    return view('feedback');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::post('/submit-contact', function (Request $request) {
    $name = $request->input('name');
    return "Received name: $name";
});

Route::get('/users', function () {
    return view('users', ['username',
    'age'=>70]);
});

Route::get('profile/{username}', function ($username) {
    return view('profile', ['username'=>$username]);
});

// 2.4 Route Fall Back => Fallback route for undefined pages
Route::fallback(function () {
    return response()->view('fallback', [], 404);
});