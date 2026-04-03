<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Enums\TableLocation;
use App\Enums\TableStatus;
use App\Models\Reservation;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;


use Illuminate\Database\Eloquent\Relations\HasMany;

class Table extends Model
{
    use HasFactory;

    protected $fillable=['name','guest_number','status','location'];

    protected $casts=[
        'satatus'=>TableStatus::class,
        'location'=>TableLocation::class
    ];

    public function reservations():HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class);
    }
}
