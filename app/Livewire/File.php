<?php

namespace App\Livewire;

use App\Models\RentalData;
use App\Models\File as FileApp;
use Filament\Actions\Action;
use Filament\Actions\CreateAction;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Livewire\Component;
use App\Models\File as FileModel;
use File as FileLaravel;
use Illuminate\Http\Request;
use Filament\Notifications\Notification;
use Livewire\WithFileUploads;
use Livewire\Attributes\Rule;
use Filament\Forms\Components\TextInput;


class File extends Component implements HasTable, HasForms,HasActions
{
    use InteractsWithTable, InteractsWithForms, InteractsWithActions, WithFileUploads;

    public FileModel $file;
    public ?int $id = null;
    public ?object $rental = null;
    public ?object $files = null;
    public ?string $user = null;
    #[Rule([
        'photos.*' => ['required','mimes:jpeg,png,jpg,gif,svg,pdf','max:1000'], 
    ])]
    public $photos = [];

    public $update; 
    
    public function save()
    {
        $this->validate();
        foreach ($this->photos as $photo) {
            $file = [
                'name' => $photo->getFilename(),
                'object_id' => $this->id,
                'object_type' => 'RentalData',
            ];
            try {              
                FileApp::create($file);
                $photo->storeAs('upload', $photo->getFilename(), 'public');
                Notification::make()
                ->title('Sucesso!')
                ->success()
                ->body('O Arquivo foi enviado com sucesso')
                ->send();
                $this->redirect('../admin/file?id='.$this->id);
            } catch (\Throwable $th) {
                throw $th;
            }
        }
    }

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-user-group';
    }

    public function mount(Request $request){

        if (null !== $request->get('id')) {
            $this->id = $request->get('id');
            $this->files = \App\Models\File::where('object_id',$this->id)
            ->orderBy('id', 'DESC')->get();           
            $this->rental = count($this->files) > 0 ? $this->files[0]->rental()->with('user')->first() : auth()->user()->rentalData->first();
            $this->user = !is_null($this->rental) ? $this->rental->user->name : null;
        }


    }

    public function render()
    {
        return view('livewire.file');
    }

    public function table(Table $table): Table
    {
        $idProposal = request()->get('id');
        return $table
            ->query(\App\Models\File::where('object_id', '=', $this->id))
            ->columns([
                // ImageColumn::make('name')
                //     ->label('Imagem')
                //     ->state(function ($record) {
                //         $ext = substr($record->name,-4);
                //         if($ext == '.pdf'){
                //             return url('upload/pdf.jpg');
                //         }
                //         return url('upload/'.$record->name);
                //     })
                //     ->width(150)
                //     ->height(150)

            ])
            ->actions([
                Tables\Actions\DeleteAction::make('delete')
                    ->requiresConfirmation()
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
            ]);
    }

    public function deletefile(FileModel $file)
    {
        try {
            $id = $file->object_id;
            // dump(storage_path('app/public/upload/'.$file->name));
            // dump(FileLaravel::exists(storage_path('app/public/upload/'.$file->name)));
            //Excluindo o arquivo e o Registro
            if (FileLaravel::exists(storage_path('app/public/upload/'.$file->name))) {
                FileLaravel::exists(storage_path('app/public/upload/'.$file->name));
                $file->delete();
                Notification::make()
                    ->title('Sucesso!')
                    ->success()
                    ->body('O Arquivo e o registro foram excluídos.')
                    ->send();
            }
             return $this->redirect('file?id='.$id);
//
        }catch (\Exception $e){
            dump($e->getMessage());
        }
    }

    /*
     * Usado o metodo para view com $this->table
     * */
    public function deleteAction(): Action
    {
        return Action::make('delete')
            ->label('Excluir')
            ->requiresConfirmation()
            ->color('danger')
            ->action(function (array $arguments) {
                dump($arguments);
            });
    }

    public function getHeaderActions(): CreateAction
    {
        return 
            \Filament\Actions\CreateAction::make()
            ->label('Upload')
            ->model(FileModel::class)
            ->form([
                TextInput::make('title')
                    ->required()
                    ->maxLength(255)
            ])
        ;
    }




}
