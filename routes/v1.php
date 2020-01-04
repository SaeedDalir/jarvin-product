<?php
$router->group(['prefix' => 'v1' , 'namespace' => 'V1'] , function () use ($router) {

    /*  >>>>>>>>>>>>>>>>>>>>>>>>>>>> Products <<<<<<<<<<<<<<<<<<<<<<<<<<<<  */
    $router->group(['middleware' => 'auth'] , function () use ($router) {
        $router->get('/products', 'ProductController@index');
        $router->get('/products/create', 'ProductController@create');
        $router->post('/products', 'ProductController@store');
        $router->get('/products/{product}/edit', 'ProductController@edit');
        $router->patch('/products/{product}', 'ProductController@update');
        $router->delete('/products/{product}', 'ProductController@destroy');
        $router->get('/products/status/{product}', 'ProductController@status');
    });
    /*  >>>>>>>>>>>>>>>>>>>>>>>>>>>> Products <<<<<<<<<<<<<<<<<<<<<<<<<<<<  */

});
