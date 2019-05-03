<?php

	namespace App\Http\Controllers;	

	use App\Plan;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Symfony\Component\HttpFoundation\Response;
	
	class PlanController extends Controller {
		
		public function View($id){
			try{
				$plan = App\Plan::find($id);
				if($plan){
					return response()->json($plan, Response::HTTP_OK);	
				}else{
					return response()->json(null, Response::HTTP_OK);
				}
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}	
		
		public function Buy(Request $request){
			try{	 	
				$plan = App\Plan::insertGetId($plan);
				return response()->json($plan, Response::HTTP_CREATED);
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
			
		
	}
