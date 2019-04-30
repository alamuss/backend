<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*$router->get('/', function () use ($router) {
    return $router->app->version();
});*/

$router->group(['prefix'=>'v1'], function () use ($router){
	
	//use
	$router->group(['prefix' => 'user'], function() use ($router){
		$router->post('user/create', 'UserController@Create');			
		$router->get('info/{id}', 'UserController@Info');
		$router->put('update/{id}', 'UserController@Update');
	});
	
	
	//team
	$router->group(['prefix' => 'team'], function() use ($router){
		$router->get('Invitation_user/{email}', 'TeamController@Invitation_user');
	});
	
	//contract
	$router->group(['prefix' => 'contract'], function() use ($router){
		$router->post('view', 'ContractController@View');
		$router->get('create', 'ContractController@Create');
		$router->get('view/{contract}', 'ContractController@GetView');
		$router->put('update/{contract}',  'ContractController@Update');
		$router->post('Invitation_User/{contract}/{user}', 'ContractController@Invitation_user');
	});	
	
	
	//contract/{contract}/notes
	$router->group(['prefix' => 'contract/{contract}/notes'], function() use ($router){
		$router->post('new', 'ContractNotesController@New');
		$router->get('view', 'ContractNotesController@View');
	});
	
	//plan
	$router->group(['prefix' => 'plan'], function() use ($router){
		$router->post('buy/{plan_id}', 'PlanController@Buy');
		$router->get('view', 'PlanController@View');
	});	
	
	
	//client
	$router->group(['prefix' => 'client'], function() use ($router){
		$router->post('create', 'ClientController@Create');
		$router->get('view', 'ClientController@View');
	});
	
	//sign
	$router->group(['prefix' => 'sign'], function() use ($router){
		$router->post('sign/{contract}', 'SignController@Sign');
		$router->get('token/{contract}', 'SingController@Token');
	});
});