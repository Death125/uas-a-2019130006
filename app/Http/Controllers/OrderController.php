<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;


class OrderController extends Controller
{
    public function order()
    {
        $menus = Menu::all();
        return view('order', compact('menus'));
    }

    public function createOrder(Request $request)
    {
        $validateData = $request->validate([
            'status' => 'required',
        ]);

        Order::create($validateData);
        $request->session()->flash('success', "Successfully adding !");
        return redirect()->route('home');
    }
}
