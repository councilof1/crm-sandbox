<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TrainingResource\Pages;
use App\Filament\Resources\TrainingResource\RelationManagers;
use App\Models\Company;
use App\Models\Training;
//use App\Filament\Resources\FileUpload;
use Filament\Forms;
use Filament\Forms\Components\FileUpload as ComponentsFileUpload;
use Filament\Forms\Components\Fieldset as ComponentsFieldset;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Infolists\Components\Fieldset;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\ImageColumn;

class TrainingResource extends Resource
{
    //public $company_id;
    protected static ?string $model = Training::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                ComponentsFieldset::make('General Information')
                ->schema([
                    TextInput::make('training_name')
                        ->maxLength(255),
                    Textarea::make('training_description')
                        ->label('About')
                        ->maxLength(1000)
                        ->columnSpanFull(),
                        Select::make(name: 'company_id')
                        ->label('Company')
                        ->searchable()
                        ->preload()
                        ->options(Company::all()->pluck(value: 'company_name', key: 'company_id')),
                    Toggle::make('training_active')
                        ->columnSpanFull(),
            ]),
                ComponentsFieldset::make('Attachment')
                    ->schema([
                        ComponentsFileUpload::make('training_attachment')
                        ->required()
                        ->preserveFilenames()
                        ->maxSize(20000),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('company_id')
                    //->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('training_name')
                    ->searchable(),
                Tables\Columns\IconColumn::make('training_active')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                    ImageColumn::make('training_attachment')
                    ->circular()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
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
            'index' => Pages\ListTrainings::route('/'),
            'create' => Pages\CreateTraining::route('/create'),
            'view' => Pages\ViewTraining::route('/{record}'),
            'edit' => Pages\EditTraining::route('/{record}/edit'),
        ];
    }

        public static function getEloquentQuery(): Builder

        {

            return parent::getEloquentQuery()

                ->withoutGlobalScopes([

                    SoftDeletingScope::class,

                ]);

        }

}
