<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    public function getTabs(): array
    {
        return [
            'active' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->active()),
            'inactive' => Tab::make()
                ->modifyQueryUsing(fn (Builder $query) => $query->inactive()),
        ];
    }
    protected function getHeaderWidgets(): array
{
    return [
        CustomerResource\Widgets\CustomersChart::class,
    ];
}
}
