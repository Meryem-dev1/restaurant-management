<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\HasMany;
class Server extends Model
{
    use HasFactory;
    protected $fillable=["name","adress","tel_number"];
    
    public function orders():HasMany
    {
        return $this->hasMany(Order::class);
    }
}
