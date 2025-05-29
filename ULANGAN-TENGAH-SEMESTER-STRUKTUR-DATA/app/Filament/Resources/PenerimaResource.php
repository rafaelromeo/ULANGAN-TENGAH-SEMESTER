<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PenerimaResource\Pages;
use App\Filament\Resources\PenerimaResource\RelationManagers;
use App\Models\Penerima;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PenerimaResource extends Resource
{
    protected static ?string $model = Penerima::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('mahasiswa_id')
    ->label('Nama Mahasiswa')
    ->relationship('mahasiswa', 'nama')
    ->required(),
               Forms\Components\Select::make('beasiswa_id')
    ->label('Nama Beasiswa')
    ->relationship('beasiswa', 'nama_beasiswa') // ✅ BENAR
    ->required(),
                Forms\Components\Select::make('status')
    ->options([
        'Lolos' => 'Lolos',
        'Tidak Lolos' => 'Tidak Lolos',
    ])
    ->required(),

                Forms\Components\DatePicker::make('tanggal_penerimaan')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('mahasiswa.nim')
    ->label('Nama Mahasiswa')
    ->sortable()
    ->searchable(),
                Tables\Columns\TextColumn::make('beasiswa.nama_beasiswa')
    ->label('Nama Beasiswa')
    ->sortable()
    ->searchable(),
               Tables\Columns\TextColumn::make('status')
    ->formatStateUsing(fn($state) => $state == 'Lolos' ? 'Lolos' : 'Tidak Lolos'),
                Tables\Columns\TextColumn::make('tanggal_penerimaan')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
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
            'index' => Pages\ListPenerimas::route('/'),
            'create' => Pages\CreatePenerima::route('/create'),
            'edit' => Pages\EditPenerima::route('/{record}/edit'),
        ];
    }
}
