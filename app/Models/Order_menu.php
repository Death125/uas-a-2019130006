<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_menu extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'order_menu';

    public function menu()
    {
        return $this->belongsTo('App\Models\Menu');
    }

    public function order()
    {
        return $this->belongsTo('App\Models\Order');
    }
}
