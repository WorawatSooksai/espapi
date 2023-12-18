<?php

app()->get('/', function () {
    response()->json(['message' => 'Congrats!! You\'re on Leaf API']);
});

app()->get('/Var', 'VariablesController@index');
app()->post('/Var', 'VariablesController@store');
