<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MensajeController;

Route::get('/', [PostController::class, 'index'])->name('posts.index');

Route::get('posts/{post:slug}', [PostController::class, 'show']);



Route::post('posts/{post:slug}/comments', [CommentController::class, 'store']);


Route::post('newsletter',function() {

    request()->validate(['email' => 'required|email']);

$mailchimp = new \MailchimpMarketing\ApiClient();

$mailchimp->setConfig([
    'apiKey' =>config('services.mailchimp.key'),
    'server' => 'us17'
]);
try{

    $mailchimp->lists->addListMember('f1203b629f',[
        'email_address'=> request('email'),
        'status' => 'subscribed'
    ]);




  }catch (Exception $e){
      throw \Illuminate\Validation\ValidationException::withMessages([
         'email' => 'No se puede añadir este correo :('
     ]);
  }


return redirect('/')->with('success','Estás suscrito illo');

});


//Perfil

Route::get('perfil/{username}', [UserController::class, 'show'])->name('perfil.show');

Route::get('perfil/{username}/edit', [UserController::class, 'edit'])->name('perfil.edit');
Route::put('perfil/{username}', [UserController::class, 'update'])->name('perfil.update');



//Admin

Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->name('admin.edit.post');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

//Foro

Route::get('/foro', [MensajeController::class, 'index'])->name('foro.index');
Route::post('/foro', [MensajeController::class, 'store'])->name('foro.store');
Route::delete('/foro/{mensaje}', [MensajeController::class, 'destroy'])->name('mensaje.destroy');

//Comentarios

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

//About Us

Route::get('/aboutus', function () {
    return view('layouts.aboutus');
})->name('aboutus');
