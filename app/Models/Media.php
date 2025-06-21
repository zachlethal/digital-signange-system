<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    protected $fillable = [
        // other fields...
        'file_path',
        'type',
        'end_time',
        'start_time',
    ];
    protected $casts = [
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];
    
    public function screens()
    {
        return $this->belongsToMany(Screen::class);
    }
    public function screencontrol()
{
    return $this->belongsToMany(ScreenControl::class);
}

}
