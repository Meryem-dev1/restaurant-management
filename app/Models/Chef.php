<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chef extends Model
{
    use HasFactory;

    protected $fillable=['name','email','image','tel_number','speciality'];


    public function menus():HasMany
    {
        return $this->hasMany(Menu::class);
    }
}
