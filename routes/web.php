<?php

use App\Http\Controllers\LeaveController;
use App\Http\Controllers\NotificationController;
use App\Models\Task;
use App\Models\User;
use App\Models\Brand;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\SendMail;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\MachineController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JobreportController;
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
Route::get('/alpine', function (){
    return view('alpine', ['title'=>'Alpine JS Tutorial']);
});


//user CRUD routing
Route::get('/users', [UserController::class, 'index'])->middleware('auth');
Route::get('/users/create', [UserController::class, 'create'])->middleware('auth');
Route::get('/edituser/{id}', [UserController::class, 'show'])->middleware('auth');
Route::get('/profile/{id}', [UserController::class, 'profile'])->middleware('auth');
//submit form post data to create new user
Route::post('/users', [UserController::class, 'store']);
//update user details 
Route::put('/update/{id}', [UserController::class, 'update']);
Route::put('/users/password/{id}', [UserController::class, 'password']);
//user logout
Route::get('/logout', [UserController::class, 'logout'])->middleware('auth');
//user logout
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
//delete user
Route::get('/deleteuser/{id}', [UserController::class, 'delete']);
Route::get('/settings/{id}', [UserController::class, 'settings']);


//clients CRUD routing
Route::get('/clients', [ClientController::class, 'index'])->middleware('auth');
Route::get('/clients/create', [ClientController::class, 'create'])->middleware('auth');
Route::get('/deleteclient/{id}', [ClientController::class, 'delete']);
Route::get('/viewclient/{id}', [ClientController::class, 'show'])->middleware('auth');
Route::put('/clients/{id}', [ClientController::class, 'update'])->middleware('auth');
Route::get('/clients/home', [ClientController::class, 'home'])->middleware('auth');
Route::get('/clients/corporate', [ClientController::class, 'corporate'])->middleware('auth');


//task CRUD routing
Route::get('/tasks', [TaskController::class, 'index'])->middleware('auth');
Route::get('/tasks/create', [TaskController::class, 'create'])->middleware('auth');
Route::get('/taskview/{id}', [TaskController::class, 'show'])->middleware('auth');
Route::get('/tasks/completed', [TaskController::class, 'completed'])->middleware('auth');
Route::put('/tasks/{id}', [TaskController::class, 'update']);
Route::get('/tasks/list', [TaskController::class, 'list']);
Route::get('/submittask/{id}', [TaskController::class, 'submitreport']);
Route::put('/tasks/{id}/report', [TaskController::class, 'report']);
Route::get('/taskreport/{id}', [TaskController::class, 'viewreport']);
Route::get('/deletetask/{id}', [TaskController::class, 'delete']);
Route::get('/tasks/all', [TaskController::class, 'getAll']);

//machine routing
Route::get('/machine', [MachineController::class, 'index'])->middleware('auth');
Route::get('/machine/create', [MachineController::class, 'create'])->middleware('auth');
Route::get('/machine/list', [MachineController::class, 'list'])->middleware('auth');
Route::put('/machine/{id}', [MachineController::class, 'update']);
Route::get('/editmachine/{id}', [MachineController::class, 'show'])->middleware('auth');
Route::get('/deletemachine/{id}', [MachineController::class, 'delete']);
Route::get('/exportmachine', [MachineController::class, 'exportToExcel']);
Route::get('/viewmachines/{name}', [MachineController::class, 'viewmachines'])->middleware('auth');;
Route::get('/viewmachines2/{name}', [MachineController::class, 'viewmachines2'])->middleware('auth');;
Route::get('/viewmachines3/{name}', [MachineController::class, 'viewmachines3'])->middleware('auth');;
Route::get('/machine/add', [MachineController::class, 'add']);



Route::get('/solarmachines', [SolarmachineController::class, 'index'])->middleware('auth');
Route::get('/solarmachines/create', [SolarmachineController::class, 'create'])->middleware('auth');
Route::get('/solarmachines/list', [SolarmachineController::class, 'list'])->middleware('auth');
Route::get('/editsolar/{id}', [SolarmachineController::class, 'show'])->middleware('auth');
Route::put('/solarmachines/{id}', [SolarmachineController::class, 'update']);
Route::get('/deletesolar/{id}', [SolarmachineController::class, 'delete']);
Route::get('/exportsolar', [SolarmachineController::class, 'exportToExcel']);

Route::get('/ups', [UpsController::class, 'index'])->middleware('auth');
Route::get('/ups/create', [UpsController::class, 'create'])->middleware('auth');
Route::get('/editups/{id}', [UpsController::class, 'show'])->middleware('auth');
Route::get('/ups/list', [UpsController::class, 'list'])->middleware('auth');
Route::put('/ups/{id}', [UpsController::class, 'update']);
Route::get('/deleteups/{id}', [UpsController::class, 'delete']);
Route::get('/exportups', [UpsController::class, 'exportToExcel']);


//expenses routing
Route::get('/expenses', [ExpenseController::class, 'index'])->middleware('auth');
Route::get('/expenses/create', [ExpenseController::class, 'create'])->middleware('auth');
Route::post('/expenses', [ExpenseController::class, 'store']);
Route::get('/showexpense/{id}', [ExpenseController::class, 'show'])->middleware('auth');
Route::put('/expenses/{id}', [ExpenseController::class, 'update']);
Route::get('/expenses/processed', [ExpenseController::class, 'updateall']);
Route::get('/deleteexpense/{id}', [ExpenseController::class, 'delete']);
Route::get('/exportexpenses', [ExpenseController::class, 'exportToExcel']);

//leave routing
Route::get('/leave', [LeaveController::class, 'index'])->middleware('auth');
Route::get('/leave/apply', [LeaveController::class, 'create'])->middleware('auth');
Route::get('/leave/history', [LeaveController::class, 'history'])->middleware('auth');
Route::post('/leaves', [LeaveController::class, 'store']);
Route::get('/showleave/{id}', [LeaveController::class, 'show'])->middleware('auth');
Route::put('/leaves/{id}', [LeaveController::class, 'update']);
Route::get('/deleteleave/{id}', [LeaveController::class, 'delete']);
Route::get('/exportleaves', [LeaveController::class, 'exportToExcel']);

//report routing
Route::get('/reports', [JobreportController::class, 'index'])->middleware('auth');
Route::get('/reports/nonsolar', [JobreportController::class, 'nonsolar'])->middleware('auth');
Route::get('/reports/solar', [JobreportController::class, 'solar'])->middleware('auth');
Route::get('/reports/ups', [JobreportController::class, 'ups'])->middleware('auth');
Route::post('/reports/create/jcc1', [JobreportController::class, 'store'])->middleware('auth');
Route::post('/reports/create/jcc2', [JobreportController::class, 'store3'])->middleware('auth');
Route::post('/reports/create/jcc', [JobreportController::class, 'store2'])->middleware('auth');
Route::get('/editreport/{id}', [JobreportController::class, 'edit'])->middleware('auth');
Route::get('/deletereport/{id}', [JobreportController::class, 'delete']);
Route::get('/jcc1/{id}', [JobreportController::class, 'jcc1'])->middleware('auth');
Route::get('/jcc/{id}', [JobreportController::class, 'jcc'])->middleware('auth');
Route::get('/jcc2/{id}', [JobreportController::class, 'jcc2'])->middleware('auth');


//site history
Route::get('/sitehistory/{id}', [HistoryController::class, 'index']);

//attendance sign-in
Route::get('/attendance', [AttendanceController::class, 'index'])->middleware('auth');
Route::get('/attendance/history', [AttendanceController::class, 'history'])->middleware('auth');
Route::post('/attendance/checkin', [AttendanceController::class, 'checkin']);
Route::put('/attendance/{id}', [AttendanceController::class, 'checkout']);
Route::get('/exportattendance', [AttendanceController::class, 'exportToExcel']);

//submit form post data to controller
Route::post('/clients', [ClientController::class, 'store']);
Route::post('/tasks', [TaskController::class, 'store']);
Route::post('/tasks/show', [TaskController::class, 'update']);
Route::post('/machine', [MachineController::class, 'store']);
Route::post('/solarmachines', [SolarmachineController::class, 'store']);

Route::post('/ups', [UpsController::class, 'store']);

Route::get('/sendmail', [SendMail::class, 'index']);

//notifications
Route::get('/notifications', [NotificationController::class, 'index']);
Route::get('/notifications/create', [NotificationController::class, 'create']);
Route::post('/notice', [NotificationController::class, 'store']);




