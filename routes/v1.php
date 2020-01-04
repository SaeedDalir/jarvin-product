<?php
$router->group(['prefix' => 'v1' , 'namespace' => 'V1'] , function () use ($router) {

    /*  >>>>>>>>>>>>>>>>>>>>>>>>>>>> Products <<<<<<<<<<<<<<<<<<<<<<<<<<<<  */
    $router->group(['middleware' => 'auth'] , function () use ($router) {
        $router->get('/products', 'ProductController@index')->name('admin.products.index');
        $router->get('/products/create', 'ProductController@create')->name('admin.products.create');
        $router->post('/products', 'ProductController@store')->name('admin.products.store');
        $router->get('/products/{product}/edit', 'ProductController@edit')->name('admin.products.edit');
        $router->patch('/products/{product}', 'ProductController@update')->name('admin.products.update');
        $router->delete('/products/{product}', 'ProductController@destroy')->name('admin.products.delete');
        $router->get('/products/status/{product}', 'ProductController@status')->name('admin.products.status');
    });
    /*  >>>>>>>>>>>>>>>>>>>>>>>>>>>> Products <<<<<<<<<<<<<<<<<<<<<<<<<<<<  */

});
