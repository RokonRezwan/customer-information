@extends('layouts.app')

@section('title', 'Create New Customer')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-12 w-75">

            <div class="row justify-content-center g-0">
                <div class="col-12 text-end">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>

            <form method="post" action="{{ route('customers.store') }}" enctype="multipart/form-data">
                @csrf
                @method('POST')

                <div class="card">

                    <div class="card-header">
                        <h3>Create Customer</h3>
                    </div>

                    <div class="card-body">

                        <div class="row p-3">
                            <label for="name" class="col-md-2 col-form-label">Name <b class="text-danger">*</b></label>
                            <div class="col-md-10">
                                <input type="text" id="name" class="form-control" value="{{ old('name') }}" name="name" placeholder="name" required autofocus>
                            </div>
                        </div>

                        <div class="row p-3">
                              <label for="age" class="col-md-2 col-form-label">Age</label>
                              <div class="col-md-10">
                                    <input type="number" id="age" class="form-control" value="{{ old('age') }}" name="age" placeholder="age" required autofocus>
                              </div>
                        </div>

                        <div class="row p-3">
                            <label for="area" class="col-md-2 col-form-label">Location <b class="text-danger">*</b></label>
                            <div class="col-md-10">
                                <select class="form-control" name="area_id" required>
                                    <option value="">Location</option>
                                    @foreach ($areas as $area)
                                        <option value="{{ $area['id'] }}">{{ $area['area_name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="card-footer float-end">
                            <button type="submit" class="btn btn-primary"> Add </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- For Add New Input Row -->
    {{-- <div class="row pricesCopy p-3" style="display: none;">
        <label for="category" class="col-md-2 col-form-label"></label>
        <div class="row col-md-10">
            <div class="col-md-2 col-12 g-0" style="padding-right:5px!important">
                <select class="form-select" name="price_type_id[]" id="price_type_id">
                    <option value="" selected>Select Price Type</option>
                    @foreach ($priceTypes as $ptype)
                    <option value="{{ $ptype['id'] }}">{{ $ptype['name'] }}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-12 col-md-2 g-0" style="padding-right:5px!important">
                <input type="number" min="0" class="form-control" name="amount[]" id="amount" placeholder="Price"
                        value="{{ old('amount[]') }}">
            </div>

            <div class="col-12 col-md-3 g-0" style="padding-right:5px!important">
                <input type="date" class="form-control" name="start_date[]" value="{{ date('Y-m-d') }}"
                    id="start_date">
            </div>

            <div class="col-12 col-md-3 g-0" style="padding-right:5px!important">
                <input type="date" class="form-control" name="end_date[]" value="{{ date('Y-m-d') }}"
                    id="end_date">
            </div>

            <div class="col-md-2 col-12 d-flex align-items-end g-0">
                <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove"
                        aria-hidden="true"></span> Remove</a>
            </div>

        </div>
    </div> --}}
@endsection

@push('scripts')
    <script type="text/javascript">
        // Upload Image Preview
        $(document).ready(function (e) {
            //add more fields group
            $(".addMore").click(function(){
                    var fieldHTML='<div class="row prices p-3" style="margin-top:5px!important">'
                    +$(".pricesCopy").html()+'</div>';
                    $('body').find('.prices:last').after(fieldHTML);
                });
            //remove fields group
            $("body").on("click",".remove",function(){
                    $(this).parents(".prices").remove();
                });
        });
    </script>
@endpush