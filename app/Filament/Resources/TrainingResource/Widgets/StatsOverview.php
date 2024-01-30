<?php

namespace App\Filament\Resources\TrainingResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected static ?string $heading = 'Training Chart';
    protected static ?string $maxHeight = '120px';
    protected int | string | array $columnSpan = 2;
    protected function getStats(): array
    {
        return [
            //
        ];
    }
}
