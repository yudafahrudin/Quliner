<?php

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/list', 'ListController@index')->name('list');
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout')->name('logout');
Route::get('/profiles', 'ProfileController@index')->name('profile');
Route::get('/location', 'LocationController@index')->name('location');
Route::get('/detail/{uri}', 'DetailController@index')->name('detail');

Route::namespace('Admin\Auth')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
        Route::post('login', 'LoginController@login')->name('admin.login.post');
        Route::get('logout', 'LoginController@logout')->name('admin.logout');
        Route::post('logout', 'LoginController@logout')->name('admin.logout.post');
        Route::post('register', 'RegisterController@register')->name('admin.register.post');
    });
});

Route::group(['middleware' => ['authadmin:admin', 'checklang']], function() {
    Route::prefix('admin')->group(function () {
        Route::namespace('Admin')->group(function () {
            Route::get('dashboard', 'HomeController@index')->name('admin.dashboard');
            Route::get('language/{lang}', 'LocalitationController@setLocalitation')->name('language');
            Route::prefix('users')->group(function () {
                Route::namespace('User')->group(function () {
                    Route::get('/', 'UserListController@show')->name('user.show');
                    Route::get('/trash/all', 'UserTrashController@show')->name('show.trash.user');
                    Route::get('/show/{username}', 'UserController@showDetailUser')->name('show.user.detail');
                    Route::get('/edit/{id}', 'UserController@showEdit')->name('show.edit.user');
                    Route::post('/{id}/delete', 'UserController@delete')->name('delete.user');
                    Route::get('/{id}/restore', 'UserTrashController@restore')->name('restore.user');
                    Route::post('/{id}/edit', 'UserController@edit')->name('edit.user');
                    Route::delete('/{id}/destroy', 'UserTrashController@destroy')->name('destroy.user');
                    Route::get('/profile/{username}', 'UserController@showProfileUser')->name('user.profile');
                });
                Route::get('/add', 'Auth\RegisterController@showRegistrationForm')->name('user.add');
            });
            Route::prefix('categories')->group(function () {
                Route::namespace('Category')->group(function () {
                    Route::get('/', 'CategoryController@index')->name('admin.category.show');
                    Route::get('/add', 'CategoryController@create')->name('admin.category.create');
                    Route::get('/detail/{code}', 'CategoryController@detail')->name('admin.category.detail');
                    Route::post('/{id}/edit', 'CategoryController@edit')->name('admin.category.edit');
                    Route::delete('/{id}/delete', 'CategoryController@delete')->name('admin.category.delete');
                    Route::post('/store', 'CategoryController@store')->name('admin.category.store');
                });
            });

            Route::prefix('foodhomes')->group(function () {
                Route::namespace('Foodhome')->group(function () {
                    Route::get('/', 'FoodhomeController@index')->name('admin.foodhome.show');
                    Route::get('/add', 'FoodhomeController@create')->name('admin.foodhome.create');
                    Route::get('/detail/{code}', 'FoodhomeController@detail')->name('admin.foodhome.detail');
                    Route::post('/{id}/edit', 'FoodhomeController@edit')->name('admin.foodhome.edit');
                    Route::post('/store', 'FoodhomeController@store')->name('admin.foodhome.store');
                });
            });
        });
    });
});


//Breadcrumbs side
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('home', route('home'));
});

Breadcrumbs::register('user', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('user', route('user.show'));
});

Breadcrumbs::register('user.add', function ($breadcrumbs) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push('user add', route('user.add'));
});

Breadcrumbs::register('logs.created', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('logs_created', route('logs.created'));
});

Breadcrumbs::register('logs.create.detail', function ($breadcrumbs) {
    $breadcrumbs->parent('logs.created');
    $breadcrumbs->push('detail');
});


Breadcrumbs::register('user.profile', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user');
    $breadcrumbs->push($user->username, route('user.profile', $user->username));
});


