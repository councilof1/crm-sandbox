<?php

namespace App\Observers;

use App\Models\Task;
use Filament\Notifications\Notification;

class TaskObserver
{
    public function created(Task $task): void
    {
        Notification::make()
            ->title('You have a new task:' . $task->name)
            ->sendToDatabase($task->user);
    }
}
