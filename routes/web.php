<?php



Auth::routes();

Route::get('/', function (){
   return redirect('/home');
});

Route::group(['middleware'=>'auth'], function() {
    Route::get('/home', ['uses' => 'HomeController@index', 'as' => 'home']);
    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::post('/todo/add', ['uses'=>'TodoController@add', 'as'=>'todo.add']);
    Route::match(['get'], '/todo/list', ['uses'=>'TodoController@setList', 'as'=>'todo.set.list']);
    Route::match(['get'], '/todo/{id?}', ['uses'=>'TodoController@setFromId', 'as'=>'todo.set']);
    Route::match(['get'], '/todo/{id?}/status', ['uses'=>'TodoController@status', 'as'=>'todo.status']);
    Route::match(['get'], '/todo/{id?}/delete', ['uses'=>'TodoController@delete', 'as'=>'todo.delete']);

});

Route::group(['prefix'=>'api'], function() {

    Route::match(['post'], '/reg', ['uses'=>'\Api\UserController@reg', 'as'=>'api.reg']);


});