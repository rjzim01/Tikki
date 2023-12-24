<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookTicket extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
    public function sit()
    {
        return $this->belongsTo(Sit::class, 'sit_id');
    }
}
