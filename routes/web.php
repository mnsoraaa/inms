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
    return view('/auth/login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*******************************************/
/*********** ProfileController *************/
/*******************************************/
Route::get('/profile', 'ProfileController@view');
Route::get('/{roleName}/profile/edit', 'ProfileController@profile_edit');
Route::get('/student/register', 'ProfileController@register_supervisor');
Route::post('/profile/add', 'ProfileController@add');
Route::post('/profile/edit/{id}', 'ProfileController@edit');

/*******************************************/
/*********** LogbookController *************/
/*******************************************/
Route::get('/{roleName}/logbook', 'LogbookController@index');
Route::get('/{roleName}/logbook/view/{id}', 'LogbookController@view');
Route::get('/{roleName}/logbook/student/{id}', 'LogbookController@logbook_student');
Route::get('/student/logbook/add', 'LogbookController@logbook_add');
Route::get('/student/logbook/edit/{id}', 'LogbookController@logbook_edit');
Route::post('/logbook/add', 'LogbookController@add');
Route::post('/logbook/edit/{id}', 'LogbookController@edit');
Route::post('/logbook/delete/{id}', 'LogbookController@delete');

/*******************************************/
/************ AssignController *************/
/*******************************************/
Route::get('/coordinator/assign', 'AssignController@assign');
Route::get('/coordinator/assign/edit/{id}', 'AssignController@assign_edit');
Route::get('/assign', 'AssignController@noStd');
Route::post('/assign/edit/{id}', 'AssignController@edit');

/*******************************************/
/********** EvaluationController ***********/
/*******************************************/
Route::get('/{roleName}/evaluation/{id?}', 'EvaluationController@index');
Route::get('/{roleName}/evaluation/edit/logbook/{id}', 'EvaluationController@evaluation_logbook_edit');
Route::get('/{roleName}/evaluation/edit/presentation/{id}', 'EvaluationController@evaluation_presentation_edit');
Route::get('/{roleName}/evaluation/edit/internship/{id}', 'EvaluationController@evaluation_internship_edit');
Route::post('/evaluation/add/logbook', 'EvaluationController@evaluation_logbook_add');
Route::post('/evaluation/add/presentation', 'EvaluationController@evaluation_presentation_add');
Route::post('/evaluation/add/internship', 'EvaluationController@evaluation_internship_add');

/*******************************************/
/*********** ScheduleController ************/
/*******************************************/
Route::get('/{roleName}/schedule', 'ScheduleController@index');
Route::get('/{roleName}/schedule/confirm/', 'ScheduleController@confirmation_view');
Route::post('/schedule/add', 'ScheduleController@add');
Route::post('/schedule/delete/{id}', 'ScheduleController@delete');
Route::post('/schedule/confirm/{id}', 'ScheduleController@confirmation');
	
/*******************************************/
/*********** GeneralController *************/
/*******************************************/
//Dashboard
Route::get('/{roleName}/dashboard', 'GeneralController@index');

//Announcement
Route::get('/coordinator/announcement', 'GeneralController@announcements');
Route::get('/coordinator/announcement/add', 'GeneralController@add_announcements');
Route::get('/coordinator/announcement/edit/{id}', 'GeneralController@edit_announcements');
Route::get('/coordinator/announcement/show/{id}', 'GeneralController@show_announcements');
Route::post('/announcement/add', 'GeneralController@announcements_add');
Route::post('/announcement/edit/{id}', 'GeneralController@announcements_edit');
Route::post('/announcement/delete/{id}', 'GeneralController@announcements_delete');

//FAQ
Route::get('/coordinator/faq', 'GeneralController@faqs');
Route::get('/coordinator/faq/add', 'GeneralController@add_faqs');
Route::get('/coordinator/faq/edit/{id}', 'GeneralController@edit_faqs');
Route::get('/coordinator/faq/show/{id}', 'GeneralController@show_faqs');
Route::post('/faq/add', 'GeneralController@faqs_add');
Route::post('/faq/edit/{id}', 'GeneralController@faqs_edit');
Route::post('/faq/delete/{id}', 'GeneralController@faqs_delete');

/*******************************************/
/*********** MessageController *************/
/*******************************************/
Route::get('/{roleName}/message', 'MessageController@index');
Route::get('/{roleName}/message/add', 'MessageController@message_add');
Route::get('/{roleName}/message/view/{id}', 'MessageController@message_view');
Route::post('/message/send', 'MessageController@sendMessage');

/*******************************************/
/*********** ReportController **************/
/*******************************************/
Route::get('/{roleName}/report/student', 'ReportController@ReportStd_index');//Report list of li student
Route::get('/{roleName}/report/facultysv', 'ReportController@ReportSV_index');//Report list of facultysv
Route::get('/{roleName}/report/releaseletter', 'ReportController@ReportReleaseLetter_index');//Report release letter student