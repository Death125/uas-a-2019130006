<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Order_menu;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function order()
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

        // $validated = $request->only(['status']);
        // $validated2 = $request->only(['quantity']);


        // Order_menu::create($validated2);

        if ($validator->fails()) {
            return redirect('/order')->withErrors($validator)->withInput();
        } else {
            //   Order::create($validated);

            $request->session()->flash('success', "Successfully adding New Order!");
            return redirect()->route('home');
        }
    }
}
