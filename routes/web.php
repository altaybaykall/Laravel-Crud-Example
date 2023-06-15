<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
}
);



Route::group(['prefix' => 'haberler', 'as' => 'haberlers.'], function () {


    Route::get('/', [\App\Http\Controllers\NukoController::class, 'getAllNews']);
    Route::get('/userid/{detay}',[\App\Http\Controllers\NukoController::class, 'getNewsDetail'])->name('detaylar');
    Route::post('edit',[\App\Http\Controllers\NukoController::class,'edit'])->name('edit');
    Route::get('add',[\App\Http\Controllers\NukoController::class,'add'])->name('add');
    Route::post('add',[\App\Http\Controllers\NukoController::class,'save'])->name('save');
    Route::Get('/delete/{news_id}',[\App\Http\Controllers\NukoController::class,'delete'])->name('delete');
});


Route::group(['prefix'=>'casper','as'=>'casper.'],function() {
   Route::Get('/',[\App\Http\Controllers\NukoController::class,'first'])->name('first');
   route::Get('/casperid/{id}',[Controllers\NukoController::class, 'second'])->name('second');
   Route::post('edit',[Controllers\NukoController::class ,'third'])->name('third');
    Route::get('add',[\App\Http\Controllers\NukoController::class,'fourth'])->name('fourth');
    Route::post('add',[\App\Http\Controllers\NukoController::class,'five'])->name('five');
    Route::get('/delete/{id}',[Controllers\NukoController::class,'numsix'])->name('numsix');


});

