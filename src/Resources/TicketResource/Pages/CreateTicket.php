<?php

namespace HasanAhani\FilamentTicket\Resources\TicketResource\Pages;

use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Resources\Pages\CreateRecord;
use HasanAhani\FilamentTicket\Models\Ticket;
use HasanAhani\FilamentTicket\Resources\TicketResource;
use Illuminate\Database\Eloquent\Model;

class CreateTicket extends CreateRecord
{
    protected static string $resource = TicketResource::class;

    protected static bool $canCreateAnother = false;




    protected function getCreateFormAction(): Action
    {
        return Action::make('create')
            ->label(__('filament-ticket::create.action'))
            ->submit('create')
            ->keyBindings(['mod+s']);
    }

    protected function handleRecordCreation(array $data): Model
    {
        $data['user_id'] = filament()->auth()->id();
        $message = $data['message'];
        unset($data['message']);
        /**
         * @var $record Ticket
         */
        $record = new ($this->getModel())($data);

        if (
            static::getResource()::isScopedToTenant() &&
            ($tenant = Filament::getTenant())
        ) {
            return $this->associateRecordWithTenant($record, $tenant);
        }

        $record->save();
        $record->messages()->create([
            'user_id' => filament()->auth()->id(),
            'message' => $message
        ]);

        return $record;
    }


}
