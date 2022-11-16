<?php

namespace App\Helpers;

use App\Models\User;

class UserHelper
{
    public static function getNameUser(string $id): string
    {
        return User::find($id)->name;
    }
}
