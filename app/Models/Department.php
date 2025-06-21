<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    protected $fillable = ['name'];

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function screens(): HasMany
    {
        return $this->hasMany(Screen::class);
    }
    // Department.php
public function getScreensNamesAttribute(): string
{
    return $this->screens->pluck('name')->join(', ');
}

}
