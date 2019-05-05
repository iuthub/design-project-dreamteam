<?php
	
	use Illuminate\Routing\Router;
	
	Admin::registerAuthRoutes();
	
	Route::group([
		'prefix' => config('admin.route.prefix'),
		'namespace' => config('admin.route.namespace'),
		'middleware' => config('admin.route.middleware'),
	], function(Router $router){
		
		$router->get('/create', 'AnimalController@create');
		
		$router->group(['prefix'=>'contacts'], function(Router $inner_router){
			$inner_router->get('/', "ContactController@index");
			$inner_router->post('/', 'ContactController@store');
			$inner_router->get('/{id}', 'ContactController@show');
			$inner_router->put('/{id}', 'ContactController@update');
			$inner_router->get('/create', 'ContactController@create');
			$inner_router->get('/{id}/edit', 'ContactController@edit');
			$inner_router->get('/{id}/store', 'ContactController@store');
			$inner_router->delete('/{id}/', 'ContactController@destroy');
		});
		
		$router->get('', "AnimalController@index");
		$router->post('/', 'AnimalController@store');
		$router->get('/{id}', 'AnimalController@show');
		$router->put('/{id}', 'AnimalController@update');
		$router->get('/{id}/edit', 'AnimalController@edit');
		$router->get('/{id}/store', 'AnimalController@store');
		$router->delete('/{id}/', 'AnimalController@destroy');
	});
