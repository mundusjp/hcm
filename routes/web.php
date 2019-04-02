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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('goal-matching','GoalsettingController@goal_matching')->name('goal-matching');
// -------------------------------------------------------------------------------
//                               CRUD GOALSETTING
// -------------------------------------------------------------------------------
//                                  PERUSAHAAN

Route::resource('perusahaan', 'PerusahaanController');
// Route::get('perusahaan','GoalsettingController@index_perusahaan');
// Route::post('perusahaan-insert','GoalsettingController@insert_visi_perusahaan')->name('perusahaan-insert');
// Route::post('perusahaan-edit','GoalsettingController@edit_visi_perusahaan')->name('perusahaan-edit');
// Route::post('perusahaan-update','GoalsettingController@update_visi_perusahaan')->name('perusahaan-update');
// Route::post('perusahaan-delete','GoalsettingController@delete_visi_perusahaan')->name('perusahaan-delete');

// -------------------------------------------------------------------------------
//                                  DIREKSI

Route::resource('direksi', 'DireksiController');
// Route::get('direksi','GoalsettingController@index_direksi');
// Route::post('direksi-insert','GoalsettingController@insert_misi_direksi')->name('direksi-insert');
// Route::post('direksi-edit','GoalsettingController@edit_misi_direksi')->name('direksi-edit');
// Route::post('direksi-update','GoalsettingController@update_misi_direksi')->name('direksi-update');
// Route::post('direksi-delete','GoalsettingController@delete_misi_direksi')->name('direksi-delete');

// -------------------------------------------------------------------------------
//                                 MANAJER

Route::resource('vice-president', 'ManajerController');
// Route::get('manajer','GoalsettingController@index_manajer');
// Route::post('manajer-insert','GoalsettingController@insert_misi_manajer')->name('manajer-insert');
// Route::post('manajer-edit','GoalsettingController@edit_misi_manajer')->name('manajer-edit');
// Route::post('manajer-update','GoalsettingController@update_misi_manajer')->name('manajer-update');
// Route::post('manajer-delete','GoalsettingController@delete_misi_manajer')->name('manajer-delete');
// -------------------------------------------------------------------------------
//                                 SUPERVISOR

Route::resource('deputy-vice-president', 'DVPController');
// Route::get('supervisor','GoalsettingController@index_supervisor');
// Route::post('supervisor-insert','GoalsettingController@insert_misi_supervisor')->name('supervisor-insert');
// Route::post('supervisor-edit','GoalsettingController@edit_misi_supervisor')->name('supervisor-edit');
// Route::post('supervisor-update','GoalsettingController@update_misi_supervisor')->name('supervisor-update');
// Route::post('supervisor-delete','GoalsettingController@delete_misi_supervisor')->name('supervisor-delete');

// -------------------------------------------------------------------------------
//                                 USER ROUTES
// -------------------------------------------------------------------------------

Route::resource('users', 'UserController');

// -------------------------------------------------------------------------------
//                                TASKS ROUTES
// -------------------------------------------------------------------------------

Route::resource('tasks', 'TaskController');

// -------------------------------------------------------------------------------
//                               LOGBOOK ROUTES
// -------------------------------------------------------------------------------

Route::resource('logbook','LogbookController');
