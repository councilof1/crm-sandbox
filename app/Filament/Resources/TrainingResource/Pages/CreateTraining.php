<?php

namespace App\Filament\Resources\TrainingResource\Pages;

use App\Filament\Resources\TrainingResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Storage;
use App\Filament\Resources\VideoResource;

class CreateTraining extends CreateRecord
{
    protected static string $resource = TrainingResource::class;

}
