<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $guarded = [];
    // protected $fillable = [
    //     'from',
    //     'to',
    //     'departure',
    //     'arrival',
    // ];
    public function sits()
    {
        return $this->hasMany(Sit::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($trip) {
            // Create 36 sits for the newly created trip
            $totalSits = 36;

            for ($i = 1; $i <= $totalSits; $i++) {
                $trip->sits()->create([
                    'sit_number' => $i,
                    // Other sit attributes related to the trip
                ]);
            }
        });
    }
}
