<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class , 'index']);

Route::get('/redirect', [HomeController::class , 'redirect']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_speciality_view', [AdminController::class , 'add_speciality']);

Route::get('/add_doctor_view', [AdminController::class , 'add_doctor']);

Route::post('/upload_doctor', [AdminController::class , 'upload_doctor']);

Route::post('/upload_speciality', [AdminController::class , 'upload_speciality']);

Route::get('/view_doctor', [AdminController::class , 'view_doctor']);

Route::get('/edit_doctor/{id}', [AdminController::class , 'edit_doctor']);

Route::post('/update_doctor/{id}', [AdminController::class , 'update_doctor']);

Route::get('/delete_doctor/{id}', [AdminController::class , 'delete_doctor']);

Route::get('/delete_speciality/{id}', [AdminController::class , 'delete_speciality']);

Route::post('/appointment', [HomeController::class , 'appointment']);

Route::get('/myappointment', [HomeController::class , 'myappointment']);

Route::get('/cancel_appoint/{id}', [HomeController::class , 'cancel_appoint']);

Route::get('show_appointment', [AdminController::class , 'show_appointment']);

Route::get('/approve_appoint/{id}', [AdminController::class , 'approve_appoint']);

Route::get('/cancel_appoint/{id}', [AdminController::class , 'cancel_appoint']);

Route::get('/delete_appoint/{id}', [AdminController::class , 'delete_appoint']);

Route::get('/message/{id}', [AdminController::class , 'message']);

Route::get('/send_mail_page/{id}', [AdminController::class , 'send_mail_page']);

Route::post('/send_email', [AdminController::class, 'sendEmail']);

Route::get('/search', [HomeController::class, 'search'])->name('search');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::get('/doctors_page', [HomeController::class, 'doctors_page'])->name('doctors_page');

Route::get('/blog_page', [HomeController::class, 'blog_page'])->name('blog_page');

Route::get('/contact_page', [HomeController::class, 'contact_page'])->name('contact_page');


Route::get('/add_blog', [AdminController::class , 'add_blog']);

Route::post('/upload_blog', [AdminController::class, 'upload_blog']);

Route::get('/view_blog', [AdminController::class , 'view_blog']);

Route::get('/edit_blog/{id}', [AdminController::class , 'edit_blog']);

Route::post('/update_blog/{id}', [AdminController::class , 'update_blog']);

Route::get('/delete_blog/{id}', [AdminController::class , 'delete_blog']);


Route::get('/blog_details_page/{id}', [HomeController::class, 'blog_details_page'])->name('blog_details_page');



