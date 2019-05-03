<?php

	namespace App\Http\Controllers;	

	use App\Sign;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Symfony\Component\HttpFoundation\Response;
	
	class SignController extends Controller {
		
		public function Token($id){
			try{
				$token = App\Sign::find($id);
				if($token){
					return response()->json($token, Response::HTTP_OK);	
				}else{
					return response()->json(null, Response::HTTP_OK);
				}
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}	
		
		public function Sign(Request $request){
			try{	 	
				$sign = App\Sign::insertGetId($sign);
				return response()->json($sign, Response::HTTP_CREATED);
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
			
		
	}
