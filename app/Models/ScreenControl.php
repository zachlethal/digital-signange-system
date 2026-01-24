<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScreenControl extends Model
{
    use HasFactory;

    protected $fillable = [
        'screen_id',
        'media_id',        
        'assigned_at',
    ];

    public function screen()
    {
        return $this->belongsTo(Screen::class);  // Assuming you have a Screen model
    }

    public function media()
    {
        return $this->belongsTo(Media::class);  // Assuming you have a Media model
    }
}
