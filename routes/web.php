<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\CareerController;


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

/* User route start */

Route::get('/',  [UserController::class, 'home'])->name('home');
Route::get('/teachers', [UserController::class, 'teachers'])->name('teachers');
Route::get('/events', [UserController::class, 'events'])->name('events');

Route::get('/notice', [UserController::class, 'notice'])->name('notice');
Route::get('/noticeDetails/{id}', [UserController::class, 'noticeDetails'])->name('noticeDetails');

Route::get('/result', [UserController::class, 'result'])->name('result');
Route::get('/admission', [UserController::class, 'admission'])->name('admission');

Route::get('/career', [UserController::class, 'career'])->name('career');
Route::get('/careerDetails/{id}', [UserController::class, 'careerDetails'])->name('careerDetails');

Route::get('/about', [UserController::class, 'about'])->name('about');
Route::get('/contact', [UserController::class, 'contact'])->name('contact');

Route::get('/testPage', [UserController::class, 'testPage'])->name('testPage'); 

// Route::get('/phpinfo', function() {
//     return phpinfo();
// });

/* User route end */


/* Admin route start */
Auth::routes();
/* Logout route start */
    // Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
/* Logout route end */
Route::group(['middleware'=>'auth'], function () {

    // dashboard
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    //--teacher [start]--//
    Route::get('/teacherList', [TeacherController::class, 'teacherList'])->name('teacherList');
    Route::post('/teacherAdd', [TeacherController::class, 'teacherAdd'])->name('teacherAdd');
    Route::get('/teacherDelete/{id}', [TeacherController::class, 'teacherDelete'])->name('teacherDelete');
    Route::get('/teacherEdit/{id}', [TeacherController::class, 'teacherEdit'])->name('teacherEdit');
    Route::post('/teacherUpdate', [TeacherController::class, 'teacherUpdate'])->name('teacherUpdate');
    //--teacher [end]--//

    //--event [start]--//
    Route::get('/eventList', [EventController::class, 'eventList'])->name('eventList');
    Route::post('/eventAdd', [EventController::class, 'eventAdd'])->name('eventAdd');
    Route::get('/eventDelete/{id}', [EventController::class, 'eventDelete'])->name('eventDelete');
    Route::get('/eventEdit/{id}', [EventController::class, 'eventEdit'])->name('eventEdit');
    Route::post('/eventUpdate', [EventController::class, 'eventUpdate'])->name('eventUpdate');
    //--event [end]--//

    //--notice [start]--//
    Route::get('/noticeList', [NoticeController::class, 'noticeList'])->name('noticeList');
    Route::post('/noticeAdd', [NoticeController::class, 'noticeAdd'])->name('noticeAdd');
    Route::get('/noticeDelete/{id}', [NoticeController::class, 'noticeDelete'])->name('noticeDelete');
    Route::get('/noticeEdit/{id}', [NoticeController::class, 'noticeEdit'])->name('noticeEdit');
    Route::post('/noticeUpdate', [NoticeController::class, 'noticeUpdate'])->name('noticeUpdate');
    //--notice [end]--//

    //--result [start]--//
    Route::get('/resultList', [ResultController::class, 'resultList'])->name('resultList');
    Route::post('/resultAdd', [ResultController::class, 'resultAdd'])->name('resultAdd');
    Route::get('/resultDelete/{id}', [ResultController::class, 'resultDelete'])->name('resultDelete');
    Route::get('/resultEdit/{id}', [ResultController::class, 'resultEdit'])->name('resultEdit');
    Route::post('/resultUpdate', [ResultController::class, 'resultUpdate'])->name('resultUpdate');
    //--result [end]--//

    //--career [start]--//
    Route::get('/careerList', [CareerController::class, 'careerList'])->name('careerList');
    Route::post('/careerAdd', [CareerController::class, 'careerAdd'])->name('careerAdd');
    Route::get('/careerDelete/{id}', [CareerController::class, 'careerDelete'])->name('careerDelete');
    Route::get('/careerEdit/{id}', [CareerController::class, 'careerEdit'])->name('careerEdit');
    Route::post('/careerUpdate', [CareerController::class, 'careerUpdate'])->name('careerUpdate');
    //--career [end]--//
    
    // Route::get('/test', 'SalesController@test')->name('test');

    
});
/* Admin route end */
