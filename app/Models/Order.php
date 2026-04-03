<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use App\Models\Table;
use App\Models\Server;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $fillable=['server_id','total_price','payment_type','payment_status'];

    public function menus()
    {
        return $this->belongsToMany(Menu::class)->withPivot('quantity')->withTimestamps();
    }

    public function tables()
    {
        return $this->belongsToMany(Table::class);
    }

    public function server():BelongsTo
    {
        return $this->belongsTo(Server::class);
    }
    public function menu(): BelongsToMany
    {
        return $this->belongsToMany(Menu_order::class, 'menu_order', 'menu_id', 'order_id');
    }
}

