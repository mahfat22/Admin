@extends('template')
@section('content')
    <div class="col-md-12">
        <div class="title__page">
            <h1> show {{$company->name}} </h1>
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
            <label for="company_name" class="col-sm-2 col-form-label"> {{trans('lang.name')}} </label>
            <div class="col-sm-10">
                {{$company->name}}
            </div>
        </div>
        <div class="form-group row">
            <label for="company_name" class="col-sm-2 col-form-label"> {{trans('lang.email')}} </label>
            <div class="col-sm-10">
                {{($company->email) ? $company->email:trans('lang.no_added_yet')}}
            </div>
        </div>
        <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">{{trans('lang.website')}}</label>
            <div class="col-sm-10">
                {{($company->website) ? $company->website:trans('lang.no_added_yet')}}
            </div>
        </div>

        <div class="form-group row">
            <label  class="col-sm-2 col-form-label">{{trans('lang.logo')}}</label>
            <div class="col-sm-10">
                @if( $company->logo )
                    <img src="{{asset('storage/app/public/'.$company->logo)}}" alt="{{$company->name}}" title="{{$company->name}}">
                @else
                    <p class="alert alert-info text-center"> {{trans('lang.no_added_yet')}} </p>
                @endif
            </div>
        </div>
    </div>

@endsection
@section("styles")
@endsection
@section('script')
@stop
