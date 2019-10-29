<?php
$route[] = ['/' , 'HomeController@index'];
$route[] = ['/store' , 'HomeController@store'];
$route[] = ['/{id}' , 'HomeController@show'];
$route[] = ['/{id}/update' , 'HomeController@update'];
$route[] = ['/{id}/delete' , 'HomeController@delete'];
return $route;