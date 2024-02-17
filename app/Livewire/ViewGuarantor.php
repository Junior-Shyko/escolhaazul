<?php

namespace App\Livewire;

use App\Models\RentalData;
use Livewire\Component;
use App\Models\User;

class ViewGuarantor extends Component
{
    public ?array $guarantor = null;//Para obter la na view

    public function mount(object $infolist): void
    {
        //Fiador da proposta
        $this->guarantor = self::allGuarantor($infolist->guarantor()->get());
    }

    /**
     * Consulta no banco todos os fiadores da proposta e retorna um array informando se o fiador ja inicou a proposta
     * @param $guarantor object
    */
    protected function allGuarantor($guarantor): array
    {
        $statusGuarantor = [];//Array para retornar com os dados
        foreach ($guarantor as $item)
        {
            //Consulta se o e-mail já existe como usuário, sendo assim, iniciou o preenchimento do cadastro
            $guarantoInit = User::where('email', $item->email)->get();
            //Iniciando como null, se tiver valor, vai ser preenchido posteriormente
            $rentalGuarantor = null;
            $idGuarantor = null;
            //Montando array para merge
            $guarantorItem['name'] = $item->name;
            $guarantorItem['email'] = $item->email;
            $guarantorItem['idGuarantor'] = $idGuarantor;//id do fiador
            $guarantorItem['idRental'] = $rentalGuarantor;//id da proposta
            $guarantorItem['isset'] = count($guarantoInit);
            if(count($guarantoInit) > 0){
                //Consultando a proposta do fiador
                $rentalGuarantor = RentalData::where('user_id',$guarantoInit[0]->id)->first();
                $guarantorItem['idRental'] =  $rentalGuarantor->id;
                $guarantorItem['idGuarantor'] = $guarantoInit[0]->id;
            }
            //Gerando array para view
            array_push($statusGuarantor, $guarantorItem);
        }
       return $statusGuarantor;
    }


    public function render()
    {
        return view('livewire.view-guarantor');
    }


}
