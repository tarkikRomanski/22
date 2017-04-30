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


});

Route::group(['prefix'=>'api'], function() {

    Route::match(['post'], '/reg', ['uses'=>'\Api\UserController@reg', 'as'=>'api.reg']);

});