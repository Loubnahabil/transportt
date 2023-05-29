<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Models\File;
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
    return view('auth.login');
});

Route::group(['middleware'=>'auth'],function()
{
    Route::get('home',function()
    {
        return view('home');
    });
    Route::get('home',function()
    {
        return view('home');
    });
});

Auth::routes();

// -----------------------------home----------------------------------------//
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('auth')->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->middleware('auth')->name('profile');

// -----------------------------login----------------------------------------//
Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'authenticate']);
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// ------------------------------ register ---------------------------------//
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'storeUser'])->name('register');

// ----------------------------- forget password ----------------------------//
Route::get('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'getEmail'])->name('forget-password');
Route::post('forget-password', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'postEmail'])->name('forget-password');

// ----------------------------- reset password -----------------------------//
Route::get('reset-password/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'getPassword']);
Route::post('reset-password', [App\Http\Controllers\Auth\ResetPasswordController::class, 'updatePassword']);



// ----------------------------- customers -----------------------------//
Route::get('form/allcustomers/page', [App\Http\Controllers\CustomerController::class, 'allCustomers'])->middleware('auth')->name('form/allcustomers/page');
Route::get('form/addcustomer/page', [App\Http\Controllers\CustomerController::class, 'addCustomer'])->middleware('auth')->name('form/addcustomer/page');
Route::post('form/addcustomer/save', [App\Http\Controllers\CustomerController::class, 'saveCustomer'])->middleware('auth')->name('form/addcustomer/save');
Route::get('form/customer/edit/{bkg_customer_id}', [App\Http\Controllers\CustomerController::class, 'updateCustomer']);
Route::post('form/customer/update', [App\Http\Controllers\CustomerController::class, 'updateRecord'])->middleware('auth')->name('form/customer/update');
Route::post('form/customer/delete', [App\Http\Controllers\CustomerController::class, 'deleteRecord'])->middleware('auth')->name('form/customer/delete');

// ----------------------------- vehicules -----------------------------//
Route::get('form/allvehicules/page', [App\Http\Controllers\VehiculeController::class, 'allVehicules'])->middleware('auth')->name('form/allvehicules/page');
Route::get('form/addvehicule/page', [App\Http\Controllers\VehiculeController::class, 'addVehicule'])->middleware('auth')->name('form/addvehicule/page');
Route::post('form/addvehicule/save', [App\Http\Controllers\VehiculeController::class, 'saveVehicule'])->middleware('auth')->name('form/addvehicule/save');
Route::get('form/vehicule/edit/{id}', [App\Http\Controllers\VehiculeController::class, 'updateVehicule'])->middleware('auth');
Route::put('form/vehicule/update/{id}', [App\Http\Controllers\VehiculeController::class, 'updateRecord'])->middleware('auth')->name('form/vehicule/update');
Route::post('form/vehicule/delete', [App\Http\Controllers\VehiculeController::class, 'deleteRecord'])->middleware('auth')->name('form/vehicule/delete');
Route::get('form/viewvehicule/{id}', [App\Http\Controllers\VehiculeController::class, 'viewVehicule'])->middleware('auth')->name('form/vehicule/view');



// ----------------------------- marchandises -----------------------------//
Route::get('form/allmarchandises/page', [App\Http\Controllers\MarchandiseController::class, 'allmarchandises'])->middleware('auth')->name('form/allmarchandises/page');
Route::get('form/addmarchandise/page', [App\Http\Controllers\MarchandiseController::class, 'addmarchandise'])->middleware('auth')->name('form/addmarchandise/page');
Route::post('form/addmarchandise/save', [App\Http\Controllers\MarchandiseController::class, 'savemarchandise'])->middleware('auth')->name('form/addmarchandise/save');
Route::get('form/marchandise/edit/{id}', [App\Http\Controllers\MarchandiseController::class, 'updatemarchandise'])->middleware('auth');
Route::put('form/marchandise/update/{id}', [App\Http\Controllers\MarchandiseController::class, 'updateRecord'])->middleware('auth')->name('form/marchandise/update');
Route::post('form/marchandise/delete', [App\Http\Controllers\MarchandiseController::class, 'deleteRecord'])->middleware('auth')->name('form/marchandise/delete');
Route::get('form/viewmarchandise/{id}', [App\Http\Controllers\MarchandiseController::class, 'viewMarchandise'])->middleware('auth')->name('form/marchandise/view');

// ----------------------------- clients -----------------------------//
Route::get('form/allclients/page', [App\Http\Controllers\ClientController::class, 'allclients'])->middleware('auth')->name('form/allclients/page');
Route::get('form/addclient/page', [App\Http\Controllers\ClientController::class, 'addclient'])->middleware('auth')->name('form/addclient/page');
Route::post('form/addclient/save', [App\Http\Controllers\ClientController::class, 'saveclient'])->middleware('auth')->name('form/addclient/save');
Route::get('form/client/edit/{id}', [App\Http\Controllers\ClientController::class, 'updateclient'])->middleware('auth');
Route::put('form/client/update/{id}', [App\Http\Controllers\ClientController::class, 'updateRecord'])->middleware('auth')->name('form/client/update');
Route::post('form/client/delete', [App\Http\Controllers\ClientController::class, 'deleteRecord'])->middleware('auth')->name('form/client/delete');
Route::get('form/viewclient/{id}', [App\Http\Controllers\ClientController::class, 'viewClient'])->middleware('auth')->name('form/client/view');


// ----------------------------- chauffeurs -----------------------------//
Route::get('form/allchauffeurs/page', [App\Http\Controllers\ChauffeurController::class, 'allchauffeurs'])->middleware('auth')->name('form/allchauffeurs/page');
Route::get('form/addchauffeur/page', [App\Http\Controllers\ChauffeurController::class, 'addchauffeur'])->middleware('auth')->name('form/addchauffeur/page');
Route::post('form/addchauffeur/save', [App\Http\Controllers\ChauffeurController::class, 'savechauffeur'])->middleware('auth')->name('form/addchauffeur/save');
Route::get('form/chauffeur/edit/{id}', [App\Http\Controllers\ChauffeurController::class, 'updatechauffeur'])->middleware('auth');
Route::put('form/chauffeur/update/{id}', [App\Http\Controllers\ChauffeurController::class, 'updateRecord'])->middleware('auth')->name('form/chauffeur/update');
Route::post('form/chauffeur/delete', [App\Http\Controllers\ChauffeurController::class, 'deleteRecord'])->middleware('auth')->name('form/chauffeur/delete');
Route::get('form/viewchauffeur/{id}', [App\Http\Controllers\ChauffeurController::class, 'viewChauffeur'])->middleware('auth')->name('form/chauffeur/view');


// Voyage
Route::get('form/allvoyages/page', [App\Http\Controllers\VoyageController::class, 'allvoyages'])->middleware('auth')->name('form/allvoyages/page');
Route::get('form/addvoyage/page', [App\Http\Controllers\VoyageController::class, 'addvoyage'])->middleware('auth')->name('form/addvoyage/page');
Route::post('form/addvoyage/save', [App\Http\Controllers\VoyageController::class, 'savevoyage'])->middleware('auth')->name('form/addvoyage/save');
Route::get('form/voyage/edit/{id}', [App\Http\Controllers\VoyageController::class, 'updatevoyage'])->middleware('auth');
Route::put('form/voyage/update/{id}', [App\Http\Controllers\VoyageController::class, 'updateRecord'])->middleware('auth')->name('form/voyage/update');
Route::post('form/voyage/delete', [App\Http\Controllers\VoyageController::class, 'deleteRecord'])->middleware('auth')->name('form/voyage/delete');
Route::get('form/viewvoyage/{id}', [App\Http\Controllers\VoyageController::class, 'viewVoyage'])->middleware('auth')->name('form/voyage/view');

//file upload 
Route::post('/upload', function (Request $request) {
    if ($request->hasFile('filepond')) {
        $file = $request->file('filepond');
        $filename = $file->getClientOriginalName();
        $path = $file->storeAs('uploads', $filename, 'public');
        return response()->json(['path' => $path]);
    }
    return response()->json(['error' => 'No file was uploaded.']);
})->middleware('auth');


Route::post('file/upload', 'FileController@upload')->name('file.upload');
