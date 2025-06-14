<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\admin\BlogController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\RoleController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\AvailabilityController;
use App\Http\Controllers\frontend\AuthConroller;
use App\Http\Controllers\admin\BookingController;
use App\Http\Controllers\admin\ContentController;
use App\Http\Controllers\admin\InquiryController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ServiceController;
use App\Http\Controllers\frontend\CartController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\frontend\AboutController;
use App\Http\Controllers\frontend\OrderController;
use App\Http\Controllers\admin\ContactUsController;
use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\HomebannerController;
use App\Http\Controllers\admin\PermissionController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ProfileController;
use App\Http\Controllers\frontend\BlogviewController;
// use App\Http\Middleware\ProviderAuthenticate;
use App\Http\Controllers\admin\ResetPasswordController;
use App\Http\Controllers\frontend\ProductviewController;
use App\Http\Controllers\frontend\ServiceViewController;
use App\Http\Controllers\admin\OrderManagementController;
use App\Http\Controllers\admin\ProviderController;
use App\Http\Controllers\frontend\ForgotPasswordController;


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
Route::get('/trainers/{id}/services', [HomeController::class, 'trainerservices'])->name('provider.service');
Route::get('/trainers', [HomeController::class, 'trainers'])->name('trainers');

Route::get('/booking-details/{id}', [ServiceViewController::class, 'booking'])->name('booking-details');
Route::post('/appointment/stripe-session', [ServiceViewController::class, 'createStripeAppointmentSession'])->name('appointment.stripe.session');
Route::get('/appointment/stripe-success', [ServiceViewController::class, 'stripeAppointmentSuccess'])->name('appointment.stripe.success');
Route::get('/appointment/stripe-cancel', [ServiceViewController::class, 'stripeAppointmentCancel'])->name('appointment.stripe.cancel');


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

Route::get('/logout', [AuthConroller::class, 'logout'])->name('logout');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ResetPasswordController::class, 'reset'])->name('password.update');

Route::middleware(['auth', 'permission'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/profile', [AuthConroller::class, 'profile'])->name('profile');
    Route::put('/profile-update', [AuthConroller::class, 'profileUpdate'])->name('profile.update');
    Route::get('/denied', [PermissionController::class, 'denied'])->name('permission-denied');
    Route::resource('product-category', CategoryController::class);
    Route::resource('product', ProductController::class);
    Route::resource('service', ServiceController::class);
    Route::resource('all-users', UserController::class);
    Route::resource('permission', PermissionController::class);
    Route::resource('role', RoleController::class);
    Route::resource('blogs-upload', BlogController::class);
    Route::delete('/product-image/{id}', [ProductController::class, 'deleteImage'])->name('images.destroy');
    Route::resource('contact-queries', ContactUsController::class);

    Route::get('/order', [OrderManagementController::class, 'index'])->name('orders.management');
    Route::get('/order/show/{id}', [OrderManagementController::class, 'show'])->name('order.show');
    Route::put('/admin/orders/{id}/update-status', [OrderManagementController::class, 'updateStatus'])->name('admin.orders.updateStatus');


    Route::resource('/provider', ProviderController::class);
    
    Route::resource('/bookings', BookingController::class);
    // Route::resource('/booking/{id}', BookingController::class);
    Route::post('/bookings/{booking}/ajax-update-status', [BookingController::class, 'ajaxUpdateStatus'])->name('admin.bookings.ajaxUpdateStatus');

    Route::controller(AvailabilityController::class)->prefix('avail')->name('avail.')->group(function () {
        Route::get('/index', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::delete('/delete/{id}', 'delete')->name('delete');
        Route::post('/avail/change-status', 'changeStatus')->name('changeStatus');
    });
});

Route::resource('homebanner', HomebannerController::class);
Route::get('blogs-view', [BlogViewController::class, 'all_blogs'])->name('blogs.all_blogs');
Route::get('blogs-view/{slug}', [BlogViewController::class, 'detail'])->name('blogs.detail');
Route::resource('content', ContentController::class);
Route::get('about-us', [AboutController::class, 'index'])->name('about.us');
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/by-category/{id}', [HomeController::class, 'getByCategory'])->name('products.byCategory');
Route::get('/product-view', [ProductviewController::class, 'index'])->name('productview.index');
Route::get('/product-detail/{slug}', [ProductviewController::class, 'productdetail'])->name('productview.productdetail');
Route::get('/all-services', [ServiceViewController::class, 'index'])->name('services.index');
Route::post('/comments', [BlogViewController::class, 'comments'])->name('blog.comment.submit');
Route::get('contact-us', [ContactController::class, 'index'])->name('contact.us');
Route::Post('contact-save', [ContactController::class, 'store'])->name('contact.save');
Route::get('/inquiry', [InquiryController::class, 'query'])->name('inquiry');


Route::controller(CartController::class)->prefix('cart')->name('cart.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/add', 'add')->name('add');
    Route::post('/update', 'update')->name('update');
    Route::post('/remove', 'remove')->name('remove');
    Route::post('/clear', 'clear')->name('clear');
    Route::get('/mini', 'miniCart')->name('mini');
    Route::get('/checkout', 'checkout')->name('checkout');
});

Route::controller(OrderController::class)->prefix('order')->name('order.')->group(function () {
    Route::post('/checkout', 'createStripeSession')->name('checkout'); // Stripe session create
    Route::get('/success', 'stripeSuccess')->name('success');          // Stripe redirect success
    Route::get('/cancel', 'stripeCancel')->name('cancel');            // Stripe redirect cancel
});



Route::middleware('auth')->group(function () {
    Route::controller(App\Http\Controllers\frontend\AccountController::class)
        ->prefix('account')
        ->name('account.')
        ->group(function () {
            Route::get('/profile', 'profile')->name('profile');
            Route::get('/orders', 'orders')->name('order');
            Route::get('/edit', 'edit')->name('edit');
            Route::put('/editprofile', 'editprofile')->name('editprofile');
            Route::get('/booking', 'booking')->name('booking');
            Route::post('/wishlist', 'wishlist')->name('wishlist');
            Route::get('/password', 'showResetForm')->name('password');
            Route::put('/change-password', 'changePassword')->name('changePassword');
            Route::get('/orders/{orderId}', 'orderDetails')->name('account.orders.details');
        });
});
