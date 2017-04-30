<?php



Auth::routes();

Route::get('/', function (){
   return redirect('/home');
});

Route::group(['middleware'=>'auth'], function() {
    Route::get('/home', ['use' => 'HomeController@index', 'as' => 'home']);
    Route::get('/welcome', function () {
        return view('welcome');
    });
    Route::get('/home', 'HomeController@index');


});

Route::group(['prefix'=>'api'], function() {

    Route::match(['post'], '/reg', ['uses'=>'\Api\UserController@reg', 'as'=>'api.reg']);

});