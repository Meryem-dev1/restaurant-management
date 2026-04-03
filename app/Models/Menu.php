<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Chef;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Menu extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'image',
        'price',
        'ingredients',
        'description',
        'chef_id',
        'category_id'
];

public function chef():BelongsTo
{
    return $this->belongsTo(Chef::class);
}


public function category():BelongsTo
{
    return $this->belongsTo(Category::class);
}

public function orders()
{
    return $this->belongsToMany(Order::class);
}


public function menu(): BelongsToMany
{
    return $this->belongsToMany(Menu_order::class, 'menu_order', 'menu_id', 'order_id');
}

}
