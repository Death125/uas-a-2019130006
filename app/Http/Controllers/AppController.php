<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;

class AppController extends Controller
{
    public function index()
    {
        $orders = Order::count();
        $menus = Menu::count();
        return view('index', compact('menus', 'orders'));
    }
}
