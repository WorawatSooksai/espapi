<?php

app()->get('/', function () {
    response()->json(['message' => 'Congrats!! You\'re on Leaf API']);
});


app()->get('/Var', 'VariablesController@index');
app()->post('/Var', 'VariablesController@store');
app()->get('/Var/{id}', 'VariablesController@show');

app()->get('/Log','LogsController@index');
app()->post('/Log','LogsController@store');
app()->get('/Log_show/{v_name}','LogsController@show');
app()->get('/Log_last/{v_name}','LogsController@last');
app()->get('/Log_last/{v_name}','LogsController@last');
app()->get('/storeByGET/{v_name}/{value}','LogsController@storeByGET');