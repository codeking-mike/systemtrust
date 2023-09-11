<?php

use App\Http\Controllers\DashboardController;
use App\Models\Task;
use App\Models\User;
use App\Models\Brand;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\SolarmachineController;

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

/*
 COMMON RESOURCE ROUTES
 index --- show all resource
 show--- show a single resource
 create - to create a resource
 store -- store new resource in database
 edit -- show form to edit a resource
 update -- update the resource in the database
 destroy -- delete resource from database

*/



Route::get('/', function () {
    $data = [
        'title' => 'Systemtrust ERP'
    ]; 
    return view('welcome', $data);
})->name('login');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

//user CRUD routing
Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])->middleware('auth');
Route::get('/edituser/{user}', [UserController::class, 'show'])->middleware('auth');
//submit form post data to create new user
Route::post('/users', [UserController::class, 'store']);
//user logout
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
//user logout
Route::post('/users/authenticate', [UserController::class, 'authenticate']);


//clients CRUD routing
Route::get('/clients', [ClientController::class, 'index'])->middleware('auth');
Route::get('/clients/create', [ClientController::class, 'create'])->middleware('auth');
Route::get('/brands', [BrandController::class, 'index'])->middleware('auth');

//task CRUD routing
Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth');
Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth');
Route::get('/taskview/{task}', [TaskController::class, 'show'])->middleware('auth');
Route::get('/tasks/completed', [TaskController::class, 'completed'])->middleware('auth');

//machine routing
Route::get('/machine', [MachineController::class, 'index'])->middleware('auth');
Route::get('/machine/create', [MachineController::class, 'create'])->middleware('auth');
Route::get('/editmachine/{machine}', [MachineController::class, 'show'])->middleware('auth');
Route::get('/solarmachines', [SolarmachineController::class, 'index'])->middleware('auth');
Route::get('/solarmachines/create', [SolarmachineController::class, 'create'])->middleware('auth');
Route::get('/ups', [UpsController::class, 'index'])->middleware('auth');
Route::get('/ups/create', [UpsController::class, 'create'])->middleware('auth');
Route::get('/editups/{ups}', [UpsController::class, 'show'])->middleware('auth');

//expenses routing
Route::get('/expenses', [ExpenseController::class, 'index'])->middleware('auth');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->middleware('auth');


//attendance sign-in
Route::get('/attendance', [AttendanceController::class, 'index'])->middleware('auth');
Route::post('/attendance/checkin', [AttendanceController::class, 'checkin']);


//submit form post data to controller
Route::post('/clients', [ClientController::class, 'store']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::post('/tasks/show', [TaskController::class, 'update']);
Route::post('/machine', [MachineController::class, 'store']);
Route::post('/solarmachines', [SolarmachineController::class, 'store']);
Route::post('/expenses', [ExpenseController::class, 'store']);
Route::post('/ups', [UpsController::class, 'store']);


