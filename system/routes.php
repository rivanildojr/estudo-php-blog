<?php

    use Pecee\SimpleRouter\SimpleRouter;

    SimpleRouter::setDefaultNamespace('system\core\Controller');

    SimpleRouter::group(['prefix' => BASE_URL], function() {
        SimpleRouter::get('/', 'HomeController@index');

        SimpleRouter::get('/sobre', 'AboutController@index');
    });

    SimpleRouter::start();