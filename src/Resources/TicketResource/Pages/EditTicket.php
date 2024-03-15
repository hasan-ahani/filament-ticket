<?php

namespace HasanAhani\FilamentTicket\Resources\TicketResource\Pages;

use Filament\Actions;
use Filament\Forms\Contracts\HasForms;
use Filament\Pages\Page;
use Filament\Resources\Pages\EditRecord;
use Filament\Tables\Concerns\CanPaginateRecords;
use HasanAhani\FilamentTicket\Resources\TicketResource;
use Illuminate\Contracts\Support\Htmlable;

class EditTicket extends Page implements HasForms
{
    use CanPaginateRecords;
    use Concerns\CanCollapse;
    use Concerns\HasListFilters;
    use Concerns\HasLogger;
    use Concerns\UrlHandling;
    use InteractsWithForms;
    use WithPagination;
    protected static string $resource = TicketResource::class;

    protected static string $view = "filament-ticket::pages.view-ticket";

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }

}
