<?php

	namespace App\Http\Controllers;	

	use App\Client;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Symfony\Component\HttpFoundation\Response;
	
	class ClientController extends Controller {
		
		public function View($id){
			try{
				$plan = App\Client::find($id);
				if($plan){
					return response()->json($plan, Response::HTTP_OK);	
				}else{
					return response()->json(null, Response::HTTP_OK);
				}
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}	
		
		public function Create(Request $request){
			try{	 	
				$client = App\Client::insertGetId($client);
				return response()->json($client, Response::HTTP_CREATED);
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
			
		
	}
