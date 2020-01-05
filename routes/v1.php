<?php
$router->group(['prefix' => 'v1' , 'namespace' => 'V1'] , function () use ($router) {

    /*  >>>>>>>>>>>>>>>>>>>>>>>>>>>> Products <<<<<<<<<<<<<<<<<<<<<<<<<<<<  */
//    $router->group(['middleware' => 'auth'] , function () use ($router) {
        $router->get('/products', 'ProductController@index');
        $router->post('/products', 'ProductController@store');
        $router->patch('/products/{product}', 'ProductController@update');
        $router->get('/products/{product}', 'ProductController@show');
        $router->delete('/products/{product}', 'ProductController@destroy');
        $router->get('/products/status/{product}', 'ProductController@status');
//    });
    /*  >>>>>>>>>>>>>>>>>>>>>>>>>>>> Products <<<<<<<<<<<<<<<<<<<<<<<<<<<<  */

});
