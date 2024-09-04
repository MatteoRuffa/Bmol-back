<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }
}
