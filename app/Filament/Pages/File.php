<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class File extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationGroup = 'Dados';
    protected static ?string $navigationLabel = 'Arquivos';

    protected static ?string $title = 'Arquivos';
    protected ?string $subheading = 'Todos os arquivos da proposta';
    protected static bool $shouldRegisterNavigation = false;


    protected static string $view = 'filament.pages.file';
}
