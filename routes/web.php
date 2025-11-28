<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Message
    Route::delete('messages/destroy', 'MessageController@massDestroy')->name('messages.massDestroy');
    Route::resource('messages', 'MessageController');

    // View Data
    Route::delete('view-datas/destroy', 'ViewDataController@massDestroy')->name('view-datas.massDestroy');
    Route::resource('view-datas', 'ViewDataController');

    // Address
    Route::delete('addresses/destroy', 'AddressController@massDestroy')->name('addresses.massDestroy');
    Route::post('addresses/media', 'AddressController@storeMedia')->name('addresses.storeMedia');
    Route::post('addresses/ckmedia', 'AddressController@storeCKEditorImages')->name('addresses.storeCKEditorImages');
    Route::resource('addresses', 'AddressController');

    // App Setting
    Route::delete('app-settings/destroy', 'AppSettingController@massDestroy')->name('app-settings.massDestroy');
    Route::post('app-settings/media', 'AppSettingController@storeMedia')->name('app-settings.storeMedia');
    Route::post('app-settings/ckmedia', 'AppSettingController@storeCKEditorImages')->name('app-settings.storeCKEditorImages');
    Route::resource('app-settings', 'AppSettingController');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
    // Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
