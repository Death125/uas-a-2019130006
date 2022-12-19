<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function order()
    {
        return "ORDER";
    }

    public function createOrder()
    {
        return "CREAT ORDER";
    }
}
