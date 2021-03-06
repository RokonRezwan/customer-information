<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Customer;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = Customer::get(['id', 'area_id', 'code', 'name', 'age']);
        $areas = Area::get(['id', 'area_name']);
        return view('home', compact('customers', 'areas'));
    }
}
