<?php

namespace HasanAhani\FilamentTicket\Resources\DepartmentResource\Pages;

use Filament\Actions;
use Filament\Resources\Pages\EditRecord;
use HasanAhani\FilamentTicket\Resources\DepartmentResource;
use HasanAhani\FilamentTicket\Resources\TicketResource;

class EditDepartment extends EditRecord
{
    protected static string $resource = DepartmentResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
