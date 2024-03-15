<?php

namespace HasanAhani\FilamentTicket;

use Filament\Contracts\Plugin;
use Filament\Panel;
use HasanAhani\FilamentTicket\Resources\DepartmentResource;
use HasanAhani\FilamentTicket\Resources\TicketResource;

class FilamentTicketPlugin implements Plugin
{
    public function getId(): string
    {
        return 'filament-ticket';
    }

    public function register(Panel $panel): void
    {
        $panel->navigationGroups([

        ]);

        $panel->resources([
            TicketResource::class,
            DepartmentResource::class
        ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
