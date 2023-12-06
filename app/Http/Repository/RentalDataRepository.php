<?php

namespace App\Http\Repository;

use App\Models\User;
use App\Models\RentalData;

class RentalDataRepository
{

    static public function getDataReport(RentalData $rental)
    {
        dump($rental->user_id);
        $user = User::find($rental->user_id);
        dump($user->dataPersonal()->get());
        dump($user->propoertie()->get());
        dump($user->realState()->get());
        dump($user->referencePersonal()->get());
        dump($user->files()->where('object_type', 'personal')->get());
        dump($user->commercial()->where('object_type', 'personal')->get());
        dump($user->bank()->where('object_type', 'personal')->get());
        dump($user->address()->where('object_type', 'address_personal')->get());
    }

    /**
     * Função que retorna o(s) id(s) de um determinado model que o usuário logado tenha relacionamento
     *
     * @return array
     */
    static public function getEntityToProposal($model, $fieldEntity = 'object_id'): array
    {
        //Buscando a proposta do usuario logado
        $rental = auth()->user()->rentalData()->get();
        //Entidade genérica
        $entity = [];
        //Consultando uma entidade e preenchendo o array
        foreach ($rental as $key => $valRental) {
            $entity = $model::where($fieldEntity, $valRental->id)->get();
        }
        $ids = [];
        //Loop para estrair os ids
        foreach ($entity as $key => $value) {
            array_push($ids, $value->id);
        }
        //Array de ids
        return $ids;
    }

    public function getEmploymentRelationship(): array
    {
        return [
            'Aposentado/pensionista' => 'Aposentado/pensionista',
            'Autônomo' => 'Autônomo',
            'Empresário' => 'Empresário',
            'Funcionário público' => 'Funcionário público',
            'Registro CLT' => 'Registro CLT',
            'Profisional liberal' => 'Profisional liberal',
            'Outros' => 'Outros'
        ];
    }
}
