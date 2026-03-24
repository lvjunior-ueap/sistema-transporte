<?php

namespace App\Filament\Resources\Veiculos;

use App\Filament\Resources\Veiculos\Pages\CreateVeiculo;
use App\Filament\Resources\Veiculos\Pages\EditVeiculo;
use App\Filament\Resources\Veiculos\Pages\ListVeiculos;
use App\Filament\Resources\Veiculos\Schemas\VeiculoForm;
use App\Filament\Resources\Veiculos\Tables\VeiculosTable;
use App\Models\Veiculo;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class VeiculoResource extends Resource
{
    protected static ?string $model = Veiculo::class;

    protected static ?string $modelLabel = 'veiculo';

    protected static ?string $pluralModelLabel = 'veiculos';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'placa';

    public static function form(Schema $schema): Schema
    {
        return VeiculoForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return VeiculosTable::configure($table);
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
            'index' => ListVeiculos::route('/'),
            'create' => CreateVeiculo::route('/create'),
            'edit' => EditVeiculo::route('/{record}/edit'),
        ];
    }
}
