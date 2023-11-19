<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/test', function () {
    return view('masterLayout.test');
});

Route::get('/form', function () {
    return view('auth.registerForm');
});


// HOME PAGE
Route::get('/', [ProductController::class,'showProducts'])->name('home');

//
Route::prefix('/cust')->name('customer.')->middleware(['auth'])->group(function () {
    Route::get('products', [ProductController::class, 'showProducts'])->name('products');
    Route::resource('profiles', UserProfileController::class);
});

// REGISTER FORM
Route::prefix('/auth')->name('auth.')->group(function () {
    Route::get('signin', [AuthController::class, 'getSigninForm'])->name('signin')->middleware(['guest']);
    Route::get('signup', [AuthController::class, 'getSignupForm'])->name('signup')->middleware(['guest']);
    Route::post('register', [AuthController::class, 'register'])->name('register');
    Route::post('signin', [AuthController::class, 'signinUser'])->name('signinUser');
    Route::post('logout', [AuthController::class, 'logoutUser'])->name('logout')->middleware(['auth']);

    // CART
    Route::post('carts/{product}', [CartController::class, 'store'])->name('carts.store');
    Route::get('carts', [CartController::class, 'index'])->name('carts.index');
    Route::delete('carts/{cart}', [CartController::class, 'destroy'])->name('carts.destroy');

    //BUYING ITEMS
    Route::post('buy/{cart}', [CartController::class, 'buyItems'])->name('carts.buyItems');

});
 

//ADMIN ACCESS
Route::prefix('/admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
    Route::resource('/products', ProductController::class);
    Route::resource('/sales', SaleController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/brands', BrandController::class);


});


// EMAIL NOTIFICATION
Route::prefix('/mail')->name('mail.')->middleware(['auth'])->group(function () {
    Route::post('products/{product}', [NotificationController::class, 'store'])->name('notify.store');
    Route::post('notifies/{notify}', [NotificationController::class, 'sendNotification'])->name('notify.send');
    
});

//EMAIL VERIFICATION
Route::get('verify/{token}', [AuthController::class, 'verify'])->name('verify');













// Route::prefix('/admin')->name('admin.')->middleware(['auth','admin'])->group(function () {
//     Route::resource('/showings', ShowingController::class);
//     Route::get('/show', [ShowingController::class, 'showingList'])->name('showings.list');
//     Route::get('/ShowingView/{showing}', [ShowingController::class, 'view'])->name('showings.view');
//     Route::resource('/movies', MovieController::class);
//     //Route::get('login', [authController::class, 'getLoginForm']);
//     Route::post('logout', [authController::class, 'logoutUser']);
//     Route::resource('/users', UserController::class);
//     Route::resource('/tickets', TicketController::class);

// });


