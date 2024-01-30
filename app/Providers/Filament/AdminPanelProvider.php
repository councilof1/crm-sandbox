<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use App\Filament\Pages\Auth\EditProfile;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Navigation\NavigationItem;
use Filament\Pages\Dashboard;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->passwordReset()
            ->emailVerification()
            ->profile(EditProfile::class)
            ->sidebarCollapsibleOnDesktop()
            ->brandName('Flagship Consulting, LLC')
            ->colors([
                'primary' => Color::Blue,

            ])
            ->plugins([
                \FilipFonal\FilamentLogManager\FilamentLogManager::make(),
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                Widgets\AccountWidget::class,
                Widgets\FilamentInfoWidget::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->databaseNotifications()
            ->databaseNotificationsPolling('30s')

            ->authMiddleware([
                Authenticate::class,

            ])


            ->navigationItems([
                NavigationItem::make('Analytics')
                    ->url('https://reports.scesconsulting.com', shouldOpenInNewTab: true)
                    ->icon('heroicon-o-presentation-chart-line')
                    ->group('Reports')
                    ->sort(3),
                NavigationItem::make('dashboard')
                    ->label(fn (): string => __('filament-panels::pages/dashboard.title'))
                    ->url(fn (): string => Dashboard::getUrl())
                    ->isActiveWhen(fn () => request()->routeIs('filament.admin.pages.dashboard')),
            ]);
    }

}