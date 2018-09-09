<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

use App\Task;
use Illuminate\Http\Request;

Route::group(['middleware' => ['web']], function () {
    /**
     * Show Task Dashboard
     */
    Route::get('/', function () {

        return view('tasks1');
    });

    /**
     * Add New Task
     */
    Route::post('/task', function (Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new Task;
        $task->name = $request->name;
        $task->save();

        return redirect('/');
    });

    /**
     * Delete Task
     */
    Route::delete('/task/{id}', function ($id) {
        Task::findOrFail($id)->delete();

        return redirect('/');
    });

    Route::get('/country-listening', 'CountryController@index');

// *********** Routs for cities module *************

Route::post('/city-register', 'CitiesController@insert');

Route::match(['get', 'post'], '/city-listening', 'CitiesController@index');

Route::match(['get', 'post'], '/read-city/{id}', 'CitiesController@show');

Route::post('/edit-city/{id}', 'CitiesController@update');

Route::post('/delete-city/{id}', 'CitiesController@destroy');


// *********** Routs for institute module *************

Route::post('/institute-register', 'InstituteController@insert');

Route::match(['get', 'post'], '/institute-listening', 'InstituteController@index');

Route::match(['get', 'post'], '/read-institute/{id}', 'InstituteController@show');

Route::match(['post', 'put'], '/edit-institute/{id}', 'InstituteController@update');

Route::match(['delete', 'post'], '/delete-institute/{id}', 'InstituteController@destroy');


// *********** Routs for subject module *************

Route::post('/subject-register', 'SubjectsController@insert');

Route::match(['get', 'post'], '/subject-listening', 'SubjectsController@index');

Route::match(['post', 'put'], '/edit-subject/', 'SubjectsController@update');

Route::post('/delete-subject/{id}', 'SubjectsController@destroy');



// *********** Routs for pages module *************

Route::post('/page-register', 'PagesController@insert');

Route::match(['get', 'post'], '/page-listening', 'PagesController@index');

Route::match(['get', 'post'], '/read-page/{id}', 'PagesController@show');

Route::post('/edit-page/{id}', 'PagesController@update');

Route::post('/delete-page/{id}', 'PagesController@destroy');



// *********** Routs for Paper module *************

Route::post('/paper-register', 'PaperController@insert');

Route::match(['get', 'post'], '/paper-listening', 'PaperController@index');

Route::match(['get', 'post'], '/read-paper/{id}', 'PaperController@show');

Route::post('/edit-paper/{id}', 'PaperController@update');

Route::post('/delete-paper/{id}', 'PaperController@destroy');



});

Route::group(['middleware' => 'web'], function () {
    Route::auth();

    Route::get('/home', 'HomeController@index');
//    Route::post('/login', 'HomeController@login');
});
