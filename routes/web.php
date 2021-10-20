<?php
use App\Http\Controllers\SaveController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpKernel\Profiler\Profile;

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
    return view('index');
})->name('index');


Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    //Profile
    Route::get('configuration', [ProfileController::class, 'configuration'])->name('profile');
    Route::put('configuration', [ProfileController::class, 'update'])->name('profile.update');

    Route::get('nick/{nick}', [ProfileController::class, 'index']);

    //My photos
    Route::view('photos', 'image.myPhotos')->name('my.photos');

    //Image
    Route::get('image/create', [ImageController::class, 'create'])->name('image.create');
    Route::post('image/update', [ImageController::class, 'store'])->name('image.store');
    Route::get('image/delete/{image}', [ImageController::class, 'delete'])->name('image.delete');


    //comment
    Route::post('comment', [CommentController::class, 'store'])->name('comment.store');
    Route::post('comment/eliminate', [CommentController::class, 'eliminate'])->name('comment.eliminate');

    //like
    Route::get('like/{image_id}', [LikeController::class, 'like'])->name('like');
    Route::get('remove/{image_id}', [LikeController::class, 'remove'])->name('like.remove');

    //follow
    Route::get('follow/{follow_id}', [FollowController::class, 'follow'])->name('follow');
    Route::get('follow/remove/{follow_id}', [FollowController::class, 'unfollow'])->name('follow.remove');

    //saved
    Route::get('save/{image_id}', [SaveController::class, 'save'])->name('save');
    Route::get('save/remove/{image_id}', [SaveController::class, 'remove'])->name('save.remove');

    //Search People
    Route::get('search/{nick}', [SearchController::class, 'search'])->name('search');
});



require __DIR__.'/auth.php';
