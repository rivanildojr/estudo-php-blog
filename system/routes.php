<?php

    use Pecee\SimpleRouter\SimpleRouter;
    use system\core\Helpers\Helpers;

    try {
        SimpleRouter::setDefaultNamespace('system\controllers');

        SimpleRouter::group(['prefix' => BASE_URL], function() {
            SimpleRouter::get('/', 'HomeController@index');

            SimpleRouter::get('/sobre', 'AboutController@index');

            SimpleRouter::get('/post/{id}', 'PostController@index');

            SimpleRouter::get('/categoria/{id}', 'CategoryController@index');

            SimpleRouter::post('/busca', 'SearchController@index');

            SimpleRouter::get('404', 'NotFoundController@index');
        });

        SimpleRouter::start();
    } catch (Pecee\SimpleRouter\Exceptions\NotFoundHttpException $e) {
        Helpers::redirect('404');
    }