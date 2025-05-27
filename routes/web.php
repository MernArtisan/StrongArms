<?php

use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\AuthConroller;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\frontend\BlogviewController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\frontend\ProductviewController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\HomebannerController;
use App\Http\Controllers\frontend\ForgotPasswordController;
use App\Http\Controllers\admin\ResetPasswordController;
use App\Http\Controllers\frontend\ServiceViewController;
use App\Http\Controllers\admin\ContentController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\frontend\ContactController;
use Illuminate\Support\Facades\Artisan;

Route::get('/cleareverything', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    Artisan::call('optimize:clear');
    return "Cache is cleared";
});


Route::get('/', [HomeController::class, 'index']);

Route::group(['middleware' => ['admin.guest']], function () {
    Route::get('/login', [AuthConroller::class, 'login'])->name('login');
    Route::post('/authenticate', [AuthConroller::class, 'Authenticate'])->name('authenticate');
    Route::get('/register', [AuthConroller::class, 'register'])->name('register');
    Route::get('/register-trainer', [AuthConroller::class, 'RegisterTrainer'])->name('register.trainer');
    Route::Post('/register-submit', [AuthConroller::class, 'registerSubmit'])->name('register.submit');
    Route::Post('/register-trainer-submit', [AuthConroller::class, 'registerTrainerSubmit'])->name('registertrainer.submit');
    Route::put('/profile/update', [AuthConroller::class, 'update'])->name('profile.update');
    Route::post('/profile/change-password', [AuthConroller::class, 'changePassword'])->name('profile.changePassword');
});


Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');
Route::middleware('auth')->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AuthConroller::class, 'profile'])->name('profile');
    Route::put('/profile-update', [AuthConroller::class, 'profileUpdate'])->name('profile.update');
    Route::get('/logout', [AuthConroller::class, 'logout'])->name('logout');
    Route::get('/denied', [PermissionController::class, 'denied'])->name('permission-denied');
    Route::resource('product-category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('all-users', UserController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('blogs-upload', BlogController::class);
    Route::delete('/product-image/{id}', [ProductController::class, 'deleteImage'])->name('images.destroy');
});
 
    Route::resource('homebanner', HomebannerController::class);
    Route::get('blogs-view', [BlogViewController::class,'all_blogs'])->name('blogs.all_blogs');
    Route::get('blogs-view/{slug}', [BlogViewController::class,'detail'])->name('blogs.detail');
    Route::resource('content', ContentController::class);
    Route::get('about-us', [AboutController::class, 'index'])->name('about.us');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/products/by-category/{id}', [HomeController::class, 'getByCategory'])->name('products.byCategory');
    Route::get('/product-view', [ProductviewController::class, 'index'])->name('productview.index');
    Route::get('/product-detail/{slug}', [ProductviewController::class, 'productdetail'])->name('productview.productdetail');
    Route::get('/all-services', [ServiceViewController::class, 'index'])->name('services.index');
    Route::post('/comments', [BlogViewController::class, 'comments'])->name('blog.comment.submit');
    Route::get('contact-us', [ContactController::class, 'index'])->name('contact.us');
    Route::Post('contact-save',[ContactController::class,'store'])->name('contact.save');
    Route::get('/inquiry', [InquiryController::class, 'query'])->name('inquiry');
 
    Route::prefix('cart')->name('cart.')->group(function () {
        Route::get('/', [CartController::class, 'index'])->name('index');
        Route::post('/add', [CartController::class, 'add'])->name('add');
        Route::post('/update', [CartController::class, 'update'])->name('update');
        Route::post('/remove', [CartController::class, 'remove'])->name('remove');
        Route::post('/clear', [CartController::class, 'clear'])->name('clear');// web.php
        Route::get('/cart/mini', [CartController::class, 'miniCart'])->name('mini');

    });
        