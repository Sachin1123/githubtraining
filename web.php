<?php
use app\Http\Controllers\API\ApitestController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TestController;
use App\Http\Middleware\Admin;
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
    return view('welcome');
});

Auth::routes();
Route::middleware([Admin::class])->group(function () {
   
    });
    Route::get('/home', [HomeController::class, 'index'])->name('home');   
    Route::get('/add', [HomeController::class, 'add'])->name('add');  
    Route::get('/manage', [HomeController::class, 'manage'])->name('manage');
    Route::get('/delete/{id}', [HomeController::class, 'delete'])->name('delete');
Auth::routes();


Route::post('store', [HomeController::class, 'store'])->name('store');
Route::get('index', [TestController::class, 'index'])->name('index');
Route::post('register', 'API\ApitestController@register');