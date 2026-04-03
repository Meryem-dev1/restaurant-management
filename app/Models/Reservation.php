<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Table;
use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=[
            'name',
            'email',
            'tel_number',
            'res_date',
            'res_time',
            'guest_number',
            'table_id'
    ];

    protected $dates=[
        'res_date'
    ];

    public function table():BelongsTo
    {
        return $this->belongsTo(Table::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}



