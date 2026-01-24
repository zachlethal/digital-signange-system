<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Screen extends Model
{
    use HasFactory;
    public function media()
    {
        return $this->belongsToMany(Media::class);
    }
    protected static function booted()
    {
        static::creating(function ($screen) {
            $screen->code = strtoupper(str()->random(6));
        });
    }
    protected $fillable = [
        // other fields...
        'name',
        'department_id',
    ];
    public function screencontrol()
    {
        return $this->hasOne(\App\Models\ScreenControl::class);
    }
    public function screenControls()
    {
        return $this->hasMany(\App\Models\ScreenControl::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

}
