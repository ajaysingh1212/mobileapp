<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:sanctum']], function () {
    // Message
    Route::apiResource('messages', 'MessageApiController');

    // View Data
    Route::apiResource('view-datas', 'ViewDataApiController');

    // Address
    Route::post('addresses/media', 'AddressApiController@storeMedia')->name('addresses.storeMedia');
    Route::apiResource('addresses', 'AddressApiController');

    // App Setting
    Route::post('app-settings/media', 'AppSettingApiController@storeMedia')->name('app-settings.storeMedia');
    Route::apiResource('app-settings', 'AppSettingApiController');
});
