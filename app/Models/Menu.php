<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $incrementing =false;

    public function order_menu(){
        return $this->hasMany('\App\Models\order_menu');
    }
}
