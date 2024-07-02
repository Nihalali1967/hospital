<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/form', [FormController::class, 'showForm'])->name('show.form');
Route::post('/form', [FormController::class, 'processForm'])->name('process.form');
Route::get('/form-data', [FormController::class, 'showFormData'])->name('show.form.data');
Route::get('/show-data', [FormController::class, 'showStoredData'])->name('show.stored.data'); // New route for showing stored data
Route::get('/form/{id}/edit', [FormController::class, 'editForm'])->name('edit.form');
Route::post('/form/{id}', [FormController::class, 'updateForm'])->name('update.form');
Route::GET('/show', [FormController::class, 'showForm']);
Route::get('/show', [FormController::class, 'showStoredData'])->name('show.stored.data');


Route::get('/', function () {
    return view('welcome');
});
