<?php 

	namespace App\Http\Controllers;	

	use App\User;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Symfony\Component\HttpFoundation\Response;
	
	
	
	class UserController extends Controller {
		
			
		public function Create(Request $request){
			 
			try{	 	
				$user = App\User::insertGetId($request);
				return response()->json($user, Response::HTTP_CREATED);
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
		
		public function Update($id, Request $request){
			try{
				$user = App\User::find($id)->update($request->all());
				return response()->json($user, Response::HTTP_OK);	
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
		
		public function Info($id){
			try{
				$user = App\User::find($id);
				if($user){
					return response()->json($user, Response::HTTP_OK);	
				}else{
					return response()->json(null, Response::HTTP_OK);
				}
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}	
			
			
		}
	}
 ?>