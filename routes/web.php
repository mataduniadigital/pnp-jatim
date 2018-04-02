<?php

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
    Route::get('/', ['uses' => 'LayoutController@indexHome']);
    Route::get('pengumuman-berkas', ['uses' => 'LayoutController@indexPengumuman']);
    Route::get('contact-person', ['uses' => 'LayoutController@indexContact']);
    Route::get('generate', ['uses' => 'FunctionController@actionGenerateNomor']);
    // Route::get('daftar', ['uses' => 'LayoutController@indexDaftar']);
    // Route::get('upload-berkas', ['uses' => 'LayoutController@indexUploadBerkas']);

    // Route::post('daftar', ['uses' => 'FunctionController@actionPelamarDaftar']);
    Route::post('signin', ['uses' => 'FunctionController@actionPelamarLogin']);

    Route::group(['middleware' => ['auth']], function () {
        Route::get('signout', ['uses' => 'FunctionController@actionPelamarLogout']);
        Route::get('kartu-saya', ['uses' => 'LayoutController@indexKartuSaya']);
        Route::post('saya-setuju', ['uses' => 'FunctionController@actionAgreeWithResult']);
        // Route::post('upload-berkas', ['uses' => 'FunctionController@actionPelamarUploadBerkas']);
        // Route::post('finish-upload', ['uses' => 'FunctionController@actionPelamarFinishUpload']);
        Route::get('ubah-password', ['uses' => 'LayoutController@indexUbahPassword']);
        Route::post('ubah-password', ['uses' => 'FunctionController@actionUbahPassword']);
    });