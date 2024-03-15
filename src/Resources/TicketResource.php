<?php
namespace HasanAhani\FilamentTicket\Resources;

use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use HasanAhani\FilamentTicket\Models\Department;
use HasanAhani\FilamentTicket\Models\Ticket;
use HasanAhani\FilamentTicket\Resources\TicketResource\Pages;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class TicketResource extends Resource
{
    protected static ?string $model = Ticket::class;


    protected static ?string $recordTitleAttribute = 'subject';

    protected static ?string $navigationIcon = 'heroicon-o-bookmark-square';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('subject'),
                Select::make('department_id')
                    ->label('Department')
                    ->options(Department::all()->pluck('name', 'id'))
                    ->searchable(),
                Textarea::make('message')
                    ->rows(8),

            ])
            ->columns(1);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->translateLabel()
                    ->rowIndex(),
                Tables\Columns\TextColumn::make('subject')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('user.name')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('department.name')
                    ->label('Department')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('created_at')
                    ->translateLabel(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->translateLabel(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make()
            ]);
    }

    public static function getRelations(): array
    {
        return [
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListTickets::route('/'),
            'create' => Pages\CreateTicket::route('/create'),
            'view' => Pages\EditTicket::route('/{record}'),
        ];
    }
}
