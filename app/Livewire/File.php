<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Actions\Contracts\HasActions;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables;
use Livewire\Component;
use App\Models\File as FileModel;

class File extends Component implements HasTable, HasForms,HasActions
{
    use InteractsWithTable, InteractsWithForms, InteractsWithActions;

    public FileModel $file;

    protected int $id;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-user-group';
    }

    public function render()
    {
        $idProposal = request()->get('id');
        $files = \App\Models\File::where('object_id', $idProposal)->get();
        $rental = count($files) > 0 ? $files[0]->rental()->with('user')->first() : null;
        $user = !is_null($rental) ? $rental->user->name : null;

        return view('livewire.file')->with(['files' => $files,
            'rental' => $rental,
            'user' => $user,
            'idProposal' => $idProposal
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\File::where('object_id', '=', 5))
            ->columns([
//                Tables\Columns\TextColumn::make('name'),
                ImageColumn::make('name')
                    ->defaultImageUrl(url('/upload/170362657081.png'))

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
            ]);
    }

    public function deletefile(FileModel $file)
    {

        try {
            $file->delete();
        }catch (\Exception $e){
            dump($e->getMessage());
        }
    }





}
