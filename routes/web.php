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

    Route::group(['prefix'=>'event'], function() {
        Route::match(['get'], '/add', ['uses'=>'EventController@getCreateView', 'as'=>'event.add.view']);
        Route::match(['post'], '/add', ['uses'=>'EventController@create', 'as'=>'event.add']);
        Route::match(['get'], '/list', ['uses'=>'EventController@getList', 'as'=>'event.list']);
        Route::match(['get'], '/list/completed', ['uses'=>'EventController@getCompletedList', 'as'=>'event.completed.list']);
        Route::match(['get'], '/{id}/status', ['uses' => 'EventController@toggleStatus', 'as' => 'event.status']);
        Route::match(['get'], '/{id}/delete', ['uses' => 'EventController@delete', 'as' => 'event.delete']);
        Route::match(['get'], '/{id}', ['uses' => 'EventController@getById', 'as' => 'event']);
        Route::match(['get'], '/edit/{id}', ['uses' => 'EventController@getUpdateView', 'as' => 'event.edit.view']);
        Route::match(['put'], '/edit', ['uses' => 'EventController@update', 'as' => 'event.edit']);
    });

    Route::group(['prefix'=>'page'], function() {
        Route::match(['get'], '/team', ['uses' => 'PersonalController@getTeamPage', 'as' => 'page.team']);
        Route::match(['get'], '/event', ['uses' => 'PersonalController@getEventPage', 'as' => 'page.event']);
    });

    Route::group(['prefix'=>'todo'], function() {
        Route::post('/add', ['uses'=>'TodoController@add', 'as'=>'todo.add']);
        Route::match(['get'], '/list', ['uses' => 'TodoController@getTodayList', 'as' => 'todo.set.list']);
        Route::match(['get'], '/{id?}', ['uses' => 'TodoController@getById', 'as' => 'todo.set']);
        Route::match(['get', 'post'], '/edit/{id?}', ['uses' => 'TodoController@editFromId', 'as' => 'todo.edit']);
        Route::match(['get'], '/{id?}/status', ['uses' => 'TodoController@toggleStatus', 'as' => 'todo.status']);
        Route::match(['get'], '/{id?}/delete', ['uses' => 'TodoController@delete', 'as' => 'todo.delete']);
    });

    Route::group(['prefix'=>'team'], function() {
        Route::match(['post'], '/edit', ['uses' => 'TeamsController@editFromId', 'as' => 'team.edit']);
        Route::post('/add', ['uses'=>'TeamsController@add', 'as'=>'team.add']);
        Route::get('/get', ['uses'=>'TeamsController@getUserTeam', 'as'=>'team.get']);
        Route::get('/list', ['uses'=>'TeamsController@getListTeam', 'as'=>'team.list']);
        Route::get('/invite', ['uses'=>'TeamsController@checkInvite', 'as'=>'team.invite']);
        Route::get('/invite/{user}', ['uses'=>'TeamsController@sendInvite', 'as'=>'team.invite.send']);
        Route::get('/get/invite', ['uses'=>'TeamsController@getInvite', 'as'=>'team.get.invite']);
        Route::get('/confirm/{id?}', ['uses'=>'TeamsController@confirmInvite', 'as'=>'team.confirm.invite']);

        Route::group(['prefix'=>'todo'], function() {
            Route::post('/create', ['uses'=>'TodosteamController@add', 'as'=>'team.todo.add']);
            Route::get('/list/{team}', ['uses'=>'TodosteamController@getList', 'as'=>'team.todo.list']);
            Route::match(['get'], '/{id?}', ['uses' => 'TodosteamController@setFromId', 'as' => 'team.todo.set']);
            Route::match(['get', 'post'], '/edit/{id?}', ['uses' => 'TodosteamController@editFromId', 'as' => 'team.todo.edit']);
            Route::match(['get'], '/{id?}/status', ['uses' => 'TodosteamController@status', 'as' => 'team.todo.status']);
            Route::match(['get'], '/{id?}/delete', ['uses' => 'TodosteamController@delete', 'as' => 'team.todo.delete']);
        });

    });

    Route::group(['prefix'=>'comment'], function() {
        Route::post('/add', ['uses'=>'CommentController@add', 'as'=>'comment.add']);
    });

    Route::get('/u/{name?}', ['uses' => 'PersonalController@personalPage', 'as' => 'personalPage']);
    Route::get('/t/{id?}', ['uses' => 'TeamsController@teamPage', 'as' => 'teamPage']);
    Route::get('/tstatistic', ['uses' => 'StatisticController@todayStatistic', 'as' => 'teamPage']);

});

Route::group(['prefix'=>'api'], function() {

    Route::match(['post'], '/reg', ['uses'=>'\Api\UserController@reg', 'as'=>'api.reg']);


});
