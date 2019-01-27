@extends('template')
@section('content')
    <div class="col-md-12">
        <div class="title__page">
            <h1> {{trans('lang.show')}} {{$employee->first_name}} {{$employee->last_name}} </h1>
        </div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>

    <div class="col-md-8">
        <div class="form-group row">
            <label for="company_name" class="col-sm-2 col-form-label"> {{trans('lang.first_name')}} :  </label>
            <div class="col-sm-10">
                {{$employee->first_name}}
            </div>
        </div>
        <div class="form-group row">
            <label for="company_name" class="col-sm-2 col-form-label"> {{trans('lang.last_name')}} :  </label>
            <div class="col-sm-10">
                {{$employee->last_name}}
            </div>
        </div>

        <div class="form-group row">
            <label for="company_name" class="col-sm-2 col-form-label"> {{trans('lang.phone')}} :  </label>
            <div class="col-sm-10">
                {{$employee->phone}}
            </div>
        </div>

        <div class="form-group row">
            <label for="company_name" class="col-sm-2 col-form-label"> {{trans('lang.company')}} :  </label>
            <div class="col-sm-10">
                {{$employee->last_name}}
            </div>
        </div>
    </div>

@endsection
@section("styles")
@endsection
@section('script')
@stop
