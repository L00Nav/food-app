<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Menu as Menu;

class Establishment extends Model
{
    use HasFactory;

    public function getMenu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }    
}
