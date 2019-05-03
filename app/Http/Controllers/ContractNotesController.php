<?php

	namespace App\Http\Controllers;	

	use App\ContractNotes;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Request;
	use Symfony\Component\HttpFoundation\Response;
	
	class ContractNotesController extends Controller {
		
		public function View($id){
			try{
				$note = App\ContractNotes::find($id);
				if($note){
					return response()->json($note, Response::HTTP_OK);	
				}else{
					return response()->json(null, Response::HTTP_OK);
				}
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}	
		
		public function NewNote(Request $request){
			try{	 	
				$nota = App\ContractNotes::insertGetId($nota);
				return response()->json($contract, Response::HTTP_CREATED);
			}catch(QueryException $exception){
				return response()->json(['error' => 'Erro ao tentar se comunicar com o banco de dados'], Response::HTTP_INTERNAL_SERVER_ERROR);
			}
		}
			
		
	}
