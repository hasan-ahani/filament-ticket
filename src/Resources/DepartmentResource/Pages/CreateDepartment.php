<?php

namespace HasanAhani\FilamentTicket\Resources\DepartmentResource\Pages;

use Filament\Actions\Action;
use Filament\Resources\Pages\CreateRecord;
use HasanAhani\FilamentTicket\Resources\DepartmentResource;
use HasanAhani\FilamentTicket\Resources\TicketResource;

class CreateDepartment extends CreateRecord
{
    protected static string $resource = DepartmentResource::class;


}
