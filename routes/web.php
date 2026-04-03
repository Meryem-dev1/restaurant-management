<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\Admin\TableController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuControllerr;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ChefController;
use App\Http\Controllers\Admin\ServerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ChefPanel\ChefController as PanelChefController ;
use App\Http\Controllers\Frontend\ReservationController as FrontendReservationController ;
use App\Http\Controllers\ControllerTable;


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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Profile
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// Route Admin Dashboard
Route::middleware(['auth','role:admin'])->name('admin.')->prefix('admin')->group(function(){
    Route::get('/',[AdminController::class,'index'])->name('index');
    Route::resource('/categories',CategoryController::class);
    Route::resource('/menus',MenuController::class);
    Route::resource('/tables',TableController::class);
    Route::resource('/reservations',ReservationController::class);
    Route::resource('/users',UserController::class);
    Route::resource('/chefs',ChefController::class);
    Route::resource('/servers',ServerController::class);
    Route::resource('/orders',OrderController::class);
});

// Route Welcome Admin
Route::middleware(['auth','role:admin'])->group(function(){
    Route::get('admin/welcome',[AdminController::class,'accueil'])->name('admin.welcome');
    Route::get('reports',[ReportController::class,'index'])->name("reports.index");
    Route::post('reports/generate', [ReportController::class,'generate'])->name("reports.generate");
    Route::post('reports/export', [ReportController::class, 'export'])->name("reports.export");

});

// Route Home
Route::get("/",[HomeController::class,"index"])->name('home');

Route::get('/blog', function () {
    return view('blog');
});
Route::get('/menu', [MenuControllerr::class, 'showMenu'])->name('menu');
Route::get("about",[AboutController::class,"index"]);

Route::get('/contact', function () {
    return view('contact');
});

// Route Reservation
Route::get('/reservation',[FrontendReservationController::class,'index'])->name('reservation');
Route::post('/reservation/store',[FrontendReservationController::class,'store'])->name('reservations.store');


// Route Server
Route::middleware(['auth', 'role:server,admin'])->group(function() {
    Route::resource("orders", OrdersController::class);
    Route::resource("payments", PaymentController::class);
    Route::resource('tables', Controllertable::class);
});

// Route Chef
Route::middleware(['auth','role:chef'])->group(function(){
    Route::get('chef/dashboard',[PanelChefController::class,'index'])->name('chef.index');
});

require __DIR__.'/auth.php';
