<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'status_id',
        'created_by_id',
        'assigned_by_id',
        'created_at',
    ];

    public function taskStatus()
    {
        return $this->hasOne(TaskStatus::class);
    }
}
