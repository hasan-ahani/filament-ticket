<?php

namespace HasanAhani\FilamentTicket;

use Filament\Support\Assets\AlpineComponent;
use Filament\Support\Assets\Asset;
use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Facades\FilamentIcon;
use Illuminate\Filesystem\Filesystem;
use Livewire\Features\SupportTesting\Testable;
use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use HasanAhani\FilamentTicket\Commands\FilamentTicketCommand;
use HasanAhani\FilamentTicket\Testing\TestsFilamentTicket;

class FilamentTicketServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-ticket';

    public static string $viewNamespace = 'filament-ticket';

    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package->name(static::$name)
            ->hasCommands($this->getCommands())
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishConfigFile()
                    ->publishMigrations()
                    ->askToRunMigrations()
                    ->askToStarRepoOnGitHub('hasan-ahani/filament-ticket');
            });

        $configFileName = $package->shortName();

        if (file_exists($package->basePath("/../config/{$configFileName}.php"))) {
            $package->hasConfigFile();
        }

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        if (file_exists($package->basePath('/../resources/lang'))) {
            $package->hasTranslations();
        }

        if (file_exists($package->basePath('/../resources/views'))) {
            $package->hasViews(static::$viewNamespace);
        }
    }

    public function packageRegistered(): void
    {
    }

    public function packageBooted(): void
    {
        // Asset Registration
//        FilamentAsset::register(
//            $this->getAssets(),
//            $this->getAssetPackageName()
//        );
//
//        FilamentAsset::registerScriptData(
//            $this->getScriptData(),
//            $this->getAssetPackageName()
//        );

        // Icon Registration
        FilamentIcon::register($this->getIcons());

        // Handle Stubs
        if (app()->runningInConsole()) {
            foreach (app(Filesystem::class)->files(__DIR__ . '/../stubs/') as $file) {
                $this->publishes([
                    $file->getRealPath() => base_path("stubs/filament-ticket/{$file->getFilename()}"),
                ], 'filament-ticket-stubs');
            }
        }

        // Testing
        Testable::mixin(new TestsFilamentTicket());
    }

    protected function getAssetPackageName(): ?string
    {
        return 'hasan-ahani/filament-ticket';
    }

    /**
     * @return array<Asset>
     */
    protected function getAssets(): array
    {
        return [
            // AlpineComponent::make('filament-ticket', __DIR__ . '/../resources/dist/components/filament-ticket.js'),
            Css::make('filament-ticket-styles', __DIR__ . '/../resources/dist/filament-ticket.css'),
            Js::make('filament-ticket-scripts', __DIR__ . '/../resources/dist/filament-ticket.js'),
        ];
    }

    /**
     * @return array<class-string>
     */
    protected function getCommands(): array
    {
        return [
            FilamentTicketCommand::class,
        ];
    }

    /**
     * @return array<string>
     */
    protected function getIcons(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getRoutes(): array
    {
        return [];
    }

    /**
     * @return array<string, mixed>
     */
    protected function getScriptData(): array
    {
        return [];
    }

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_tickets_table',
            'create_ticket_messages_table',
            'create_labels_table',
            'create_ticket_labels_table',
            'create_ticket_feedbacks_table',
            'create_departments_table',
        ];
    }
}
