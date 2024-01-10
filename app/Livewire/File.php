<?php

namespace App\Livewire;

use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Filament\Tables;
use Livewire\Component;
use App\Models\File as FileModel;

class File extends Component implements HasTable, HasForms
{
    use InteractsWithTable, InteractsWithForms;

    public static function getNavigationIcon(): ?string
    {
        return 'heroicon-o-user-group';
    }

    public function render()
    {
        $idProposal = request()->get('id', null);
        $files = \App\Models\File::where('object_id', $idProposal)->get();
        $rental = count($files) > 0 ? $files[0]->rental()->with('user')->first() : null;
        $user = !is_null($rental) ? $rental->user->name : null;
        return view('livewire.file')->with(['file' => $files,
            'rental' => $rental,
            'user' => $user,
            'idProposal' => $idProposal
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(\App\Models\File::where('object_id', '=', 4))
            ->columns([
//                Tables\Columns\TextColumn::make('name'),
                ImageColumn::make('name')
                    ->defaultImageUrl(url('/upload/170362657081.png'))

            ])
            ->headerActions([
                Tables\Actions\CreateAction::make()
            ]);
    }


}
