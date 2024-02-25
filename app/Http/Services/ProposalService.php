<?php

namespace App\Http\Services;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class ProposalService {

    static public function createOrUpdate($entity, $request)
    {
        //Verifica se tem os dados
        $generalEntity = $entity->where(
            ['object_id' => $request->proposal_id, 'object_type' => 'personal']
        )->first();
        // Se nao tiver registro então cria um registro
        if( is_null($generalEntity) )
        {
            try {
                $request['object_id'] = $request->proposal_id;
                
                // unset($request->proposal_id);
                $entity->create($request->all());

                return response()->json([
                    'message' => 'Criado', 
                    'status' => Response::HTTP_OK]
                );
            } catch (\Throwable $th) {
            } catch (\Throwable $th) {
                throw $th;
            }
            
        }else{
            //Se já tiver um registro, então atualiza
            try {
                $request['object_id'] = $request->proposal_id;
                unset($request['proposal_id']);
                $generalEntity->update($request->all());
                return response()->json(['message' => 'Atualizado', 'status' => Response::HTTP_OK]);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }    
}