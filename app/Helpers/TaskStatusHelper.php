<?php

namespace App\Helpers;

use App\Models\TaskStatus;

class TaskStatusHelper
{
    public static function getNameStatus(string $id): string
    {
        return TaskStatus::find($id)->name;
    }
}
