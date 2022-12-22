<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_menu;
use Facade\Ignition\DumpRecorder\Dump;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function order(Request $request)
    {
        $menu = Menu::all();

        return view('order', compact('menu'));
    }

    public function findMenuPrice(Request $request)
    {
        $menuPrice = Menu::select('harga')->where('id', $request->id)->first();

        return response()->json($menuPrice);
    }

    public function createOrder(Request $request)
    {
        $rules = [
            'status' => 'required',
            'menu_id' => 'required',
            'quantity' => 'required|numeric|min:1',
        ];

        $error_message = [
            'required' => 'attribute wajib diisi.',
            'size' => ':attribute harus berukuran :size karakter.',
            'max' => ':attribute maksimal berisi :max karakter.',
            'min' => ':attribute minimal berisi :min karakter.',
            'email' => 'harus diisi dengan alamat email yang valid.',
            'in' => ':attribute yang dipilih tidak valid.',
        ];

        $validator = Validator::make($request->all(), $rules, $error_message);

        $validated = $request->only(['status']);
        $getQuantity = $request->only(['quantity']);
        $getId = $request->only(['menu_id']);

        if ($validator->fails()) {
            return redirect('/order')->withErrors($validator)->withInput();
        } else {
            $quantity = json_encode($getQuantity);
            $quantity = json_decode($quantity, true);

            $order = Order::create($validated);
            $menu = Menu::find($getId)->first();

            $order_menu = new Order_menu();

            $order_menu->order()->associate($order);
            $order_menu->menu()->associate($menu);
            $order_menu->quantity = $quantity['quantity'];
            $order_menu->save();

            $request->session()->flash('success', "Successfully adding New Order!");
            return redirect()->route('home');
        }
    }

    public function detailOrder()
    {
        $order_menus = Order_menu::all();
        return view('detail_order', compact('order_menus'));
    }
}
