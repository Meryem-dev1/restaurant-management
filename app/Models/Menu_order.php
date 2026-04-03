<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu;

class Menu_order extends Model
{
    use HasFactory;

    protected $table = "menu_order";

    // Relation avec le modèle Menu
    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }
}

