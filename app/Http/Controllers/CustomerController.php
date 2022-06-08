<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        $areas = Area::get(['id', 'area_name']);
        return view('customers.create', compact('areas'));
    }

    public function store(Request $request)
    {
        try {
            $customer = new Customer; 

                $customer->name = $request->name;
                $customer->code = random_int(100000,999999);
                $customer->age = $request->age;
                $customer->area_id = $request->area_id;

                $customer->save();
                
        } catch (QueryException $e) {

            return redirect()->route('home')->with(['error' => $e->getMessage()]);
        }

        return redirect()->route('home')->with('success', 'Customer has been created successfully.');
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit(Customer $customer)
    {
        //
    }

    public function update(Request $request, Customer $customer)
    {
        //
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('home')->with('success','Customer has been deleted successfully !');
    }
}
