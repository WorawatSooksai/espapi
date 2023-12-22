<?php
use Leaf\Helpers\Authentication;

$middleware = function () {
    // some middleware operation here
    $token = Authentication::getBearerToken();       
    $user = Authentication::validate($token,"662021xxx@espapi");
    if(empty($user)){
        response()->json(['message' => 'please use api/login to get token']);
        
    }
  };

app()->get('/', function () {
    response()->json(['message' => 'Congrats!! You\'re on Leaf API']);
});

app()->group('/api',['middleware' => $middleware, function () { 
    app()->get('/Var', 'VariablesController@index');
    app()->post('/Var', 'VariablesController@store');
    app()->get('/Var/{id}', 'VariablesController@show');
    app()->get('/Log','LogsController@index');
    app()->post('/Log','LogsController@store');
    app()->get('/Log_show/{v_name}','LogsController@show');
    app()->get('/Log_last/{v_name}','LogsController@last');
    app()->get('/storeByGET/{v_name}/{value}','LogsController@storeByGET');
   
        
}]);



app()->post('/register','UsersController@register');
app()->post('/login','UsersController@login');

