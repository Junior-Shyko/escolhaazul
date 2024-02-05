<?php

namespace App\Http\Repository;

use App\Models\DataPersonal;
use App\Models\User;
use App\Models\RentalData;
use Illuminate\Support\Facades\DB;
use PhpParser\Node\Expr\Cast\Object_;

class RentalDataRepository
{
    const DELETE = 'delete';

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

    public function getMaritalStatus(): array
    {
        return [
            'Casado' => 'Casado',
            'Desquitado' => 'Desquitado',
            'Divorciado' => 'Divorciado',
            'União Estável' => 'União Estável',
            'Solteiro' => 'Solteiro',
            'Separado' => 'Separado',
            'Viúvo' => 'Viúvo'
        ];
    }

    /**
     * Retorna o usuário pelo id dos dados pessoais
     *
     * @param [integer] $id
     * @return User
     */
    static public function getUserDataPersonal($id)
    {

        $personal = DataPersonal::find($id);
        if(!is_null($personal))
        {
            $user = User::find($personal->user_id);
            return $user;
        }else{
            $user = User::find($id);
            return $user;
        }
    }

    static public function getUserData($id)
    {
        $user = User::find($id);
        return $user;
    }

    /**
     * Formata id e nome do usuário para retornar como array
     *
     * @param [type] $form
     * @return array
     */
    static public function getUserToForm($form): array
    {

        //Modo de edição de form
        if ($form->getOperation() == 'edit' || $form->getOperation() == 'view' ) {
            //Instancia um usuário se tiver object_id
            if(isset($form->getRecord()->object_id))
            {
                $user = self::getUserDataPersonal($form->getRecord()->object_id);
                $nameUser = $user->name;
                $idUser = $user->id;
            }else{
                //instanciando com o proprio registro passado
                $nameUser = $form->getRecord()->name;
                $idUser = $form->getRecord()->id;
            }

        }
        else{
            //Busca o usuário que está no id da url
            $idFromURL = request()->get('id');
            if($idFromURL !== null){
                $user = self::getUserData($idFromURL);

                $nameUser = $user->name;
                $idUser = $user->id;

            }else{
                $idUser = $form->getLivewire()->data['user_id'];
                $nameUser = null;
            }
        }
        return ['idUser' => $idUser,'nameUser' => $nameUser];
    }

    /**
     * Retorna um titulo diferente para cada situação
     *
     * @param [string] $type
     * @param [string] $model
     * @return void
     */
    public static function titleModalRole($type = self::DELETE, $model): string
    {
        $roles = auth()->user()->getRoleNames();
        $title = '';
        foreach ($roles as $role) {
           if( ($role == 'superAdmin' || $role == 'admin' || $role == 'manager') && $type == 'delete')
           {
            $title = 'Excluir '.$model;
           }
           if($role == 'common' && $type == 'delete')
           {
                if($model == 'Usuário'){
                    $title = 'Excluir sua conta';
                }else{
                    $title = 'Excluir '.$model;
                }

           }
        }

        return $title;
    }
}
