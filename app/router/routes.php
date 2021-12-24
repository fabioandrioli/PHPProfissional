<?php

return [
    '/' => 'Home@index',
    '/user/create' => 'User@create',
   // '/user/[a-z0-9]+' => 'User@index'
   '/user/[0-9]+' => 'User@show',
   '/user/[0-9]/show/[a-z]+' => 'User@create',
   '/login' => 'Login@index',
];