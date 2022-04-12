<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

// Su dung Request $request trong callback cua route

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

Route::get('/login', function () {
    // dd('login view');
    $email = 'tuannda3@fe.edu.vn';
    $password = '123456';
    // return view('auth.login')->with('emaill', $email);
    // view(ten view, mang gia tri truyen sang view)
    return view('auth.login', [
        'emaill' => $email,
        'password' => $password
    ]);
});

Route::get('/', function () {
    $students = [
        [
            'name' => 'Tuannda3',
            'age' => 20,
            'class' => 'WE16201',
            'id' => '1',
            'avatar' => "https://iap.poly.edu.vn/user/ph/PH13025.jpg"
        ],
        [
            'name' => 'Tuannda3',
            'age' => 20,
            'class' => 'WE16201',
            'id' => '2',
            'avatar' => "https://iap.poly.edu.vn/user/ph/PH13025.jpg"
        ],
    ];
    return view('home', ['students' => $students]);
})->name('home');


Route::middleware(['auth', 'authActive'])->prefix('/categories')->name('categories.')->group(function () {
    // Danh sach
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::get('/children/{id}', [CategoryController::class, 'children'])->name('children');
    // Tao moi
    Route::get('/create', [CategoryController::class, 'create'])->name('create');
    Route::post('/store', [CategoryController::class, 'store'])->name('store');
    // Chinh sua
    Route::get('/edit/{id}', [CategoryController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [CategoryController::class, 'update'])->name('update');
    // Xoa
    Route::delete('/{cate}', [CategoryController::class, 'delete'])->name('delete');
});

Route::middleware(['auth', 'authActive'])->prefix('/products')->name('products.')->group(function () {
    // Danh sach
    Route::get('/', [ProductController::class, 'index'])->name('index');
    // Tao moi
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::post('/store', [ProductController::class, 'store'])->name('store');
    // Chinh sua
    Route::get('/edit/{pro}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/update/{pro}', [ProductController::class, 'update'])->name('update');
    // Xoa
    Route::delete('/{pro}', [ProductController::class, 'delete'])->name('delete');
});

Route::middleware(['auth', 'authActive'])->prefix('/news')->name('news.')->group(function () {
    // Danh sach
    Route::get('/', [NewsController::class, 'index'])->name('index');
    // Tao moi
    Route::get('/create', [NewsController::class, 'create'])->name('create');
    Route::post('/store', [NewsController::class, 'store'])->name('store');
    // Chinh sua
    Route::get('/edit/{news}', [NewsController::class, 'edit'])->name('edit');
    Route::put('/update/{news}', [NewsController::class, 'update'])->name('update');
    // Xoa
    Route::delete('/{news}', [NewsController::class, 'delete'])->name('delete');
});

Route::middleware(['auth', 'authActive'])->prefix('/users')->name('users.')->group(function () {
    // Danh sach
    Route::get('/', [UserController::class, 'index'])->name('index');
    // Tao moi
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::post('/store', [UserController::class, 'store'])->name('store');
    // Chinh sua
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
    // Xoa
    Route::delete('/{id}', [UserController::class, 'delete'])->name('delete');
});

Route::middleware('guest')->prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/postlogin', [LoginController::class, 'postLogin'])->name('postlogin');
});

Route::get('/auth/logout', [LoginController::class, 'logout'])->middleware('auth')->name('auth.logout');
