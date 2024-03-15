<?php
namespace HasanAhani\FilamentTicket\Resources\DepartmentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use HasanAhani\FilamentTicket\Resources\DepartmentResource;
use HasanAhani\FilamentTicket\Resources\TicketResource;

class ListDepartments extends ListRecords
{
    protected static string $resource = DepartmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
