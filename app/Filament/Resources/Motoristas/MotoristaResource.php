<?php

namespace App\Filament\Resources\Motoristas;

use App\Filament\Resources\Motoristas\Pages\CreateMotorista;
use App\Filament\Resources\Motoristas\Pages\EditMotorista;
use App\Filament\Resources\Motoristas\Pages\ListMotoristas;
use App\Filament\Resources\Motoristas\Schemas\MotoristaForm;
use App\Filament\Resources\Motoristas\Tables\MotoristasTable;
use App\Models\Motorista;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class MotoristaResource extends Resource
{
    protected static ?string $model = Motorista::class;

    protected static ?string $modelLabel = 'motorista';

    protected static ?string $pluralModelLabel = 'motoristas';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'nome';

    public static function form(Schema $schema): Schema
    {
        return MotoristaForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return MotoristasTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListMotoristas::route('/'),
            'create' => CreateMotorista::route('/create'),
            'edit' => EditMotorista::route('/{record}/edit'),
        ];
    }
}
