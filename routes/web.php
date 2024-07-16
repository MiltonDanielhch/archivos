<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\documentController;
use App\Http\Controllers\voyager\DocumentController;

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

Route::get('login', function () {
    return redirect('admin/login');
})->name('login');

Route::get('/', function () {
    return redirect('admin');
});

Route::get('maintenance', function () {
    return view('errors.maintenance');
})->name('errors.maintenance');

Route::group(['prefix' => 'admin', 'middleware' => 'desarrollo.creativo'], function () {
    Voyager::routes();
    Route::get('/documents_list', [DocumentController::class, "list"])->name('documents.list');
    Route::post('/documents_delete', [DocumentController::class, "delete"])->name('documents.delete');
    Route::get('/documents_qr/{id}',[DocumentController::class, "showQrCode"])->name('documents.showQrCode')->middleware('auth'); 
});
Route::get('/validate_documents/{id}', [DocumentController::class, "showDetails"])->name('documents.showdetails');
// Clear cache
Route::get('/admin/clear-cache', function() {
    Artisan::call('optimize:clear');
    return redirect('/admin/profile')->with(['message' => 'Cache eliminada.', 'alert-type' => 'success']);
})->name('clear.cache');
