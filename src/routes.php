<?php
# packages/maxiaofei/opencenter-for-laravel/src/routes.php
Route::get('hello', function(){
    echo 'Hello from the opencenter-for-laravel package!';
});

#Controller
Route::get('hello-world/hello/{name}', 'MaXiaofei\OpencenterForLaravel\Controllers\HelloWorldController@hello');
Route::get('hello-world/world/{name}', 'MaXiaofei\OpencenterForLaravel\Controllers\HelloWorldController@world');

Route::middleware(['maxiaofei.api'])->group(function ($router) {
    $router->get('maxiaofei/api', function () {
        return 'api success';
    });
});
