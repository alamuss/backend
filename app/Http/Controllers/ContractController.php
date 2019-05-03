<?php

	namespace App\Http\Controllers;	

	use App\Contract;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Symfony\Component\HttpFoundation\Response;
	
	class ContractController extends Controller {
		
		public function View($id){
			try{
				$contract = App\Contract::find($id);
				if($contract){
					return response()->json($contract, Response::HTTP_OK);	
				}else{
					return response()->json(null, Response::HTTP_OK);
				}
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}	
		
		public function Create(Request $request){
			 
			try{	 	
				$contract = App\Contract::insertGetId($request);
				return response()->json($contract, Response::HTTP_CREATED);
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
		
		public function GetView($id){
			try{
				$contract = App\ContractUser::find($id);
				if($contract){
					return response()->json($contract, Response::HTTP_OK);	
				}else{
					return response()->json(null, Response::HTTP_OK);
				}
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}	
		
		public function Update($id, Request $request){
			try{
				$user = App\ContractUser::find($id)->update($request->all());
				return response()->json($user, Response::HTTP_OK);	
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
		
		public function Invitation_user(Request $request){
			 
			try{
				//determinar a lógica do convite	 	
				$contract = App\InvitationUser::insertGetId($request);
				return response()->json($contract, Response::HTTP_CREATED);
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
			
		
	}
