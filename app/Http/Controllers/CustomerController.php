<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::get(['id', 'area_id', 'code', 'name', 'age']);
        $areas = Area::get(['id', 'area_name']);
        return view('customers.index', compact('customers', 'areas'));
    }

    public function create()
    {
        $areas = Area::get(['id', 'area_name']);
        return view('customers.create', compact('areas'));
    }

    public function store(Request $request)
    {
        try {
            DB::transaction(function () use($request) {

                $names = $request->name;
                $ages = $request->age;
                $area_ids = $request->area_id;

                $area = Area::all();
                $serial = Customer::get('id')->count();

                $customers = [];

                if(($names !== NULL) && ($area_ids !== NULL)){
                    foreach ($names as $index => $name) {
                        $code = $area[$index]->area_code.'00'.$serial;
                        $customers[] = [
                            'code' => $code,
                            'name' => $name,
                            'area_id' => $area_ids[$index],
                            'age' => $ages[$index],
                        ];
                        Customer::insert($customers);
                    }
                }
            });

            } catch (QueryException $e) {

                return redirect()->route('customers.index')->with(['error' => $e->getMessage()]);
            }

        return redirect()->route('customers.index')->with('success', 'Customer has been added successfully.');
    }
    
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return redirect()->route('customers.index')->with('success','Customer has been deleted successfully !');
    }
}
