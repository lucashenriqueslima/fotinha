<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Event;

class EventStatus extends Model
{
    use HasFactory;

    public $incrementing = false;

    protected $fillable = [
        'title',
    ];

    public function events()
    {
        return $this->hasMany(Event::class);
    }
}
