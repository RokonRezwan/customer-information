@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header"> Customer List </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap gx-5">
                            <thead>
                                <tr>
                                    <th class="text-center border border-dark rounded">SL</th>
                                    <th class="text-center border border-dark rounded">Code</th>
                                    <th class="text-center border border-dark rounded">Full Name</th>
                                    <th class="text-center border border-dark rounded">Age</th>
                                    <th class="text-center border border-dark rounded">Location</th>
                                    <th class="text-center border border-dark rounded"><a href="{{ route('customers.create') }}"><i class="fa-solid fa-plus"></i></a></th>
                                </tr>
                            </thead>

                            <tbody>
                                @php
                                    $sl =1;
                                @endphp
                                @foreach ($customers as $key => $customer)
                                    <tr>
                                        <td>{{ $sl++ }}</td>
                                        <td>{{ $customer->code }}</td>
                                        
                                        <td class="text-center">
                                            {{ $customer->name }}
                                        </td>
                                        <td class="text-center">
                                            {{ $customer->age }}
                                        </td>
                                        <td class="text-center">
                                            {{ optional($customer->area)->area_name ?? 'Undefiend' }}
                                        </td>
                                        <td class="text-center">
                                            <a href="#"><i class="fa-solid fa-minus"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection
