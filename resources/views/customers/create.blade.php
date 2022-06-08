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

                  <div class="customer">

                        <div class="card">

                              <div class="card-header">
                                    <h3>Create Customer</h3>
                              </div>

                              <div class="card-body">

                                    <div class="row">
                        
                                          <div class="col-12 col-md-4 text-center">
                                                <input type="text" id="name" class="form-control border border-dark rounded" value="{{ old('name') }}" name="name[]" placeholder="name" size="1" required >
                                          </div>
                        
                                          <div class="col-12 col-md-3 text-center">
                                                <input type="number" id="age" class="form-control border border-dark rounded" value="{{ old('age') }}" name="age[]" placeholder="age" size="1" required >
                                          </div>
                        
                                          <div class="col-12 col-md-4 text-center">
                                                <select class="form-control border border-dark rounded" name="area_id[]" required>
                                                      <option value="">Location</option>
                                                      @foreach ($areas as $area)
                                                      <option value="{{ $area['id'] }}">{{ $area['area_name'] }}</option>
                                                      @endforeach
                                                </select>
                                          </div>
                                          
                                          <div class="col-12 col-md-1 d-flex align-items-end g-0">
                                                <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus"aria-hidden="true"></span><i class="fa-solid fa-plus"></i></a>
                                            </div>
                                    </div>
                              </div>
                        </div>
                  </div>

                  <div class="card-footer float-end">
                        <button type="submit" class="btn btn-primary"> Submit </button>
                  </div>
            </form>
        </div>
    </div>

<!-- For Add New Input Row -->

      <div class="row customerCopy justify-content-center p-3" style="display: none;" >
            <div class="row">

                  

                  <div class="col-12 col-md-4 text-center">
                        <input type="text" id="name" class="form-control border border-dark rounded" value="{{ old('name') }}" name="name[]" placeholder="name" size="1" required >
                  </div>

                  <div class="col-12 col-md-3 text-center">
                        <input type="number" id="age" class="form-control border border-dark rounded" value="{{ old('age') }}" name="age[]" placeholder="age" size="1" required >
                  </div>

                  <div class="col-12 col-md-4 text-center">
                        <select class="form-control border border-dark rounded" name="area_id[]" required>
                              <option value="">Location</option>
                              @foreach ($areas as $area)
                              <option value="{{ $area['id'] }}">{{ $area['area_name'] }}</option>
                              @endforeach
                        </select>
                  </div>

                  <div class="col-12 col-md-1 text-center">
                        <a href="javascript:void(0)" class="btn btn-danger remove"><span class="glyphicon glyphicon glyphicon-remove"
                              aria-hidden="true"></span><i class="fa-solid fa-minus"></i></a>
                  </div>
            </div>
      </div>
@endsection

@section('scripts')

<script type="text/javascript">
      $(document).ready(function (e) {
      //add more fields group
      $(".addMore").click(function(){
            var fieldHTML='<div class="row insert p-3" style="margin-top:5px!important">'
            +$(".customerCopy").html()+'</div>';
            $('body').find('.customer:last').after(fieldHTML);
      });
      //remove fields group
      $("body").on("click",".remove",function(){
            $(this).parents(".insert").remove();
      });
      });
</script>

@endsection