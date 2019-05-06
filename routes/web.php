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

Route::get('/', 'WelcomeController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('goal-matching','GoalsettingController@goal_matching')->name('goal-matching');
Route::get('back', function () {
    return redirect('home');
})->name('back');
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
Route::post('get-divisi','DireksiController@get_divisi')->name('get-divisi');
Route::get('direksi.edit-target/{id}/edit','DireksiController@edit_target')->name('direksi.edit-target');
Route::match(['put', 'patch'], 'direksi.update-target/{id}','DireksiController@update_target')->name('direksi.update-target');
Route::get('update-program','DireksiController@update_status')->name('update-program');
// Route::get('direksi','GoalsettingController@index_direksi');
// Route::post('direksi-insert','GoalsettingController@insert_misi_direksi')->name('direksi-insert');
// Route::post('direksi-edit','GoalsettingController@edit_misi_direksi')->name('direksi-edit');
// Route::post('direksi-update','GoalsettingController@update_misi_direksi')->name('direksi-update');
// Route::post('direksi-delete','GoalsettingController@delete_misi_direksi')->name('direksi-delete');

// -------------------------------------------------------------------------------
//                                 MANAJER

Route::resource('vice-president', 'ManajerController');
Route::post('assign-task-to-dvp', 'ManajerController@assign_task')->name('assign-task-to-dvp');
Route::get('vice-president.reject-page/{id}', 'ManajerController@reject_page')->name('vice-president.reject-page');
Route::match(['put', 'patch'], 'vice-president.reject/{id}','ManajerController@reject_task')->name('vice-president.reject');
Route::get('vice-president.peringatkan-page/{id}', 'ManajerController@peringatkan_page')->name('vice-president.peringatkan-page');
Route::match(['put', 'patch'], 'vice-president.peringatkan/{id}','ManajerController@peringatkan_task')->name('vice-president.peringatkan');
Route::get('vice-president.batalkan-page/{id}', 'ManajerController@batalkan_page')->name('vice-president.batalkan-page');
Route::match(['put', 'patch'], 'vice-president.batalkan/{id}','ManajerController@batalkan_task')->name('vice-president.batalkan');
Route::get('vice-president.peringatkan-page/{id}', 'ManajerController@peringatkan_page')->name('vice-president.peringatkan-page');
Route::match(['put', 'patch'], 'vice-president.konfirmasi/{id}','ManajerController@konfirmasi')->name('vice-president.konfirmasi');
// Route::get('manajer','GoalsettingController@index_manajer');
// Route::post('manajer-insert','GoalsettingController@insert_misi_manajer')->name('manajer-insert');
// Route::post('manajer-edit','GoalsettingController@edit_misi_manajer')->name('manajer-edit');
// Route::post('manajer-update','GoalsettingController@update_misi_manajer')->name('manajer-update');
// Route::post('manajer-delete','GoalsettingController@delete_misi_manajer')->name('manajer-delete');
// -------------------------------------------------------------------------------
//                                 DEPUTY VICE DIRECTOR

Route::resource('deputy-vice-president', 'DVPController');
Route::post('assign-task-to-officer', 'DVPController@assign_task')->name('assign-task-to-officer');
Route::match(['put', 'patch'], 'deputy-vice-president.proses/{id}','DVPController@proses')->name('deputy-vice-president.proses');
Route::match(['put', 'patch'], 'deputy-vice-president.batal-selesai/{id}','DVPController@batal_selesai')->name('deputy-vice-president.batal-selesai');
Route::get('deputy-vice-president.selesai-page/{id}', 'DVPController@selesai_page')->name('deputy-vice-president.selesai-page');
Route::match(['put', 'patch'], 'deputy-vice-president.selesai/{id}','DVPController@selesai')->name('deputy-vice-president.selesai');
Route::get('deputy-vice-president.tunda-page/{id}', 'DVPController@tunda_page')->name('deputy-vice-president.tunda-page');
Route::match(['put', 'patch'], 'deputy-vice-president.tunda/{id}','DVPController@tunda_task')->name('deputy-vice-president.tunda');
Route::get('deputy-vice-president.reject-page/{id}', 'DVPController@reject_page')->name('deputy-vice-president.reject-page');
Route::match(['put', 'patch'], 'deputy-vice-president.reject/{id}','DVPController@reject_task')->name('deputy-vice-president.reject');
Route::get('deputy-vice-president.peringatkan-page/{id}', 'DVPController@peringatkan_page')->name('deputy-vice-president.peringatkan-page');
Route::match(['put', 'patch'], 'deputy-vice-president.peringatkan/{id}','DVPController@peringatkan_task')->name('deputy-vice-president.peringatkan');
Route::get('deputy-vice-president.batalkan-page/{id}', 'DVPController@batalkan_page')->name('deputy-vice-president.batalkan-page');
Route::match(['put', 'patch'], 'deputy-vice-president.batalkan/{id}','DVPController@batalkan_task')->name('deputy-vice-president.batalkan');
Route::get('deputy-vice-president.peringatkan-page/{id}', 'DVPController@peringatkan_page')->name('deputy-vice-president.peringatkan-page');
Route::match(['put', 'patch'], 'deputy-vice-president.konfirmasi/{id}','DVPController@konfirmasi')->name('deputy-vice-president.konfirmasi');
// Route::get('supervisor','GoalsettingController@index_supervisor');
// Route::post('supervisor-insert','GoalsettingController@insert_misi_supervisor')->name('supervisor-insert');
// Route::post('supervisor-edit','GoalsettingController@edit_misi_supervisor')->name('supervisor-edit');
// Route::post('supervisor-update','GoalsettingController@update_misi_supervisor')->name('supervisor-update');
// Route::post('supervisor-delete','GoalsettingController@delete_misi_supervisor')->name('supervisor-delete');
// -------------------------------------------------------------------------------
//                                 Officer & TNO
Route::match(['put', 'patch'], 'officer.proses/{id}','OfficerController@proses')->name('officer.proses');
Route::match(['put', 'patch'], 'officer.batal-selesai/{id}','OfficerController@batal_selesai')->name('officer.batal-selesai');
Route::get('officer.selesai-page/{id}', 'OfficerController@selesai_page')->name('officer.selesai-page');
Route::match(['put', 'patch'], 'officer.selesai/{id}','OfficerController@selesai')->name('officer.selesai');
Route::get('officer.tunda-page/{id}', 'OfficerController@tunda_page')->name('officer.tunda-page');
Route::match(['put', 'patch'], 'officer.tunda/{id}','OfficerController@tunda_task')->name('officer.tunda');
// -------------------------------------------------------------------------------
//                                 USER ROUTES
// -------------------------------------------------------------------------------

Route::resource('users', 'UserController');
Route::get('profile/{id}','UserController@myprofile')->name('profile');
Route::get('edit-password/{id}','UserController@editpassword')->name('edit-password');
Route::post('upload-pp','UserController@uploadpp')->name('upload-pp');
Route::match(['put', 'patch'], 'update-password/{id}','UserController@updatepassword')->name('update-password');
Route::match(['put', 'patch'], 'update-profile/{id}','UserController@updateprofile')->name('update-profile');

// -------------------------------------------------------------------------------
//                                TASKS ROUTES
// -------------------------------------------------------------------------------


// -------------------------------------------------------------------------------
//                               LOGBOOK ROUTES
// -------------------------------------------------------------------------------

Route::resource('logbook','LogbookController');
Route::get('logbook-harian','LogbookController@export_harian')->name('logbook-harian');
Route::get('logbook-mingguan','LogbookController@export_mingguan')->name('logbook-mingguan');
Route::get('logbook-bulanan','LogbookController@export_bulanan')->name('logbook-bulanan');
Route::get('logbook-harian/{id}','LogbookController@export_harian_coachee')->name('logbook-harian-coachee');
Route::get('logbook-mingguan/{id}','LogbookController@export_mingguan_coachee')->name('logbook-mingguan-coachee');
Route::get('logbook-bulanan/{id}','LogbookController@export_bulanan_coachee')->name('logbook-bulanan-coachee');
// -------------------------------------------------------------------------------
//                               GOALMATCHING ROUTES
// -------------------------------------------------------------------------------

Route::resource('goalmatching','goalmatchingController');
Route::get('goalmatching-coach','goalmatchingController@index_coach')->name('goalmatching-coach');
Route::get('goalmatching-coachee','goalmatchingController@index_coachee')->name('goalmatching-coachee');
Route::get('goalmatching-evaluasi','goalmatchingController@index_evaluasi')->name('goalmatching-evaluasi');

// -------------------------------------------------------------------------------
//                               SUPERADMIN ROUTES
// -------------------------------------------------------------------------------

Route::resource('superadmin','SuperadminController');
Route::get('user','SuperadminController@user_index');
