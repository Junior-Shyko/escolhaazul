<?php

namespace App\Livewire;

use App\Models\User;
use Filament\Tables;
use Livewire\Component;
use File as FileLaravel;
use App\Models\RentalData;
use Filament\Tables\Table;
use Filament\Actions\Action;
use Illuminate\Http\Request;
use App\Services\FileService;
use Livewire\Attributes\Rule;
use Livewire\WithFileUploads;
use App\Models\File as FileApp;
use App\Models\File as FileModel;
use Filament\Actions\CreateAction;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Actions\Concerns\InteractsWithActions;



class File extends Component implements HasTable, HasForms,HasActions
{
    use InteractsWithTable, InteractsWithForms, InteractsWithActions, WithFileUploads;

    public FileModel $file;
    public ?int $id = null;
    public ?string $user = null;

    #[Rule([
        'photos.*' => ['required','mimes:jpeg,png,jpg,gif,svg,pdf','max:1000'],
    ])]

    public $photos = [];
    
    public FileService $fileService;

    public function boot(FileService $fileService)
    {
        $this->fileService = $fileService;
    }

    public function save()
    {
        $this->validate();
        foreach ($this->photos as $photo) {
            $file = [
                'name' => 'proposal-'.$photo->getFilename(),
                'object_id' => $this->id,
                'object_type' => 'RentalData',
            ];

            try {
                $this->fileService->createFile($file);
                $photo->storeAs('public','proposal-'. $photo->getFilename());
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
        // if (null !== $request->get('id')) {
        //     $this->id = $request->get('id');
        //     $this->files = \App\Models\File::where('object_id',$this->id)
        //     ->orderBy('id', 'DESC')->get();

        //     $this->rental = count($this->files) > 0 ?
        //                     $this->files[0]->rental()->with('user')->first() :
        //                     auth()->user()->rentalData->first();
        //     $this->user = !is_null($this->rental) ?
        //                     $this->rental->user->name :
        //                     $this->getUserIsRentalNull();
        // }
        if (null !== $request->get('id')) {
            $this->id = $request->get('id');
        }
    }

    public function render()
    {
        $files = FileApp::where('object_id', $this->id)
        ->orderBy('id', 'DESC')
        ->get()
        ->map(function ($file) {
            return [
                'id' => $file->id,
                'name' => $file->name,
                'object_id' => $file->object_id,
                'object_type' => $file->object_type,
            ];
        });

        $rental = null;
        if ($files->isNotEmpty()) {
            $firstFile = FileApp::find($files->first()['id']);
            $rental = $firstFile->rental()->with('user')->first();
            $rental = $rental ? [
                'id' => $rental->id,
                'user' => [
                    'name' => $rental->user->name,
                ],
            ] : null;
        }

        if (!$rental) {
            $rentalData = auth()->user()->rentalData()->first();
            if ($rentalData) {
                $user = $rentalData->user()->first();
                $rental = [
                    'id' => $rentalData->id,
                    'user' => [
                        'name' => $user->name,
                    ],
                ];
            }
        }

        $user = $rental ? $rental['user']['name'] : $this->getUserIsRentalNull();

        return view('livewire.file', [
            'files' => $files,
            'rental' => $rental,
            'user' => $user,
        ]);
    }

    public function getUserIsRentalNull()
    {
        $rental = RentalData::find($this->id);
        $user = User::find($rental->user_id);
        return $user->name;
    }

    public function table(Table $table): Table
    {
        $idProposal = request()->get('id');
        return $table
            ->query(\App\Models\File::where('object_id', '=', $this->id))
            ->columns([
                ImageColumn::make('name')
                    ->label('Imagem')
                    ->state(function ($record) {
                        $ext = substr($record->name,-4);
                        if($ext == '.pdf'){
                            return url('storage/pdf.jpg');
                        }
                        return url('storage/'.$record->name);
                    })
                    ->width(150)
                    ->height(150)

            ])
            ->actions([
                Tables\Actions\DeleteAction::make('delete')
                ->label('Excluir')
                ->requiresConfirmation()
                ->color('danger')

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
            ]);
    }

    public function deletefile(FileModel $file)
    {
        try {
            $id = $file->object_id;
             //Excluindo o arquivo e o Registro
            if (FileLaravel::exists(storage_path('app/public/'.$file->name))) {
                FileLaravel::exists(storage_path('app/public/'.$file->name));
                $file->delete();
                Notification::make()
                    ->title('Sucesso!')
                    ->success()
                    ->body('O Arquivo e o registro foram excluídos.')
                    ->send();
            }
             return $this->redirect('file?id='.$id);
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
