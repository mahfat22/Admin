@extends('template')
@section('content')
    <div class="col-md-12">
        <div class="title__page">
            <h1> {{trans('lang.edit_companies')}} </h1>
        </div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success text-center">
                {{ Session::get('flash_message') }}
            </div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger text-center">
                @foreach($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif
    </div>

    <div class="col-md-8">
        {!! Form::model($company, [
            'method' => 'PATCH',
            'route' => ['company.update', $company->id],
            'files' => true
        ]) !!}
            <div class="form-group row">
                <label for="company_name" class="col-sm-2 col-form-label"> {{trans('lang.name')}} </label>
                <div class="col-sm-10">
                    <input type="text" value="{{$company->name}}" class="form-control" id="company_name" placeholder="{{trans('lang.name')}}" name="name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> {{trans('lang.email')}} </label>
                <div class="col-sm-10">
                    <input type="text" value="{{$company->email}}" class="form-control" id="email" placeholder="{{trans('lang.email')}}" name="email" />
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> {{trans('lang.website')}} </label>
                <div class="col-sm-10">
                    <input type="text" value="{{$company->website}}" class="form-control" id="website" placeholder="{{trans('lang.website')}}" name="website" />
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> {{trans('lang.logo')}} </label>
                <div class="col-sm-10">
                    <input class="form-control" type="file" name="logo" id="logo" >
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> {{trans('lang.old_logo')}} </label>
                <div class="col-sm-10">
                    <img src="{{asset('storage/app/public/'.$company->logo)}}" >
                </div>
            </div>


            <div class="form-group row">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary"> {{trans('lang.send')}} </button>
                </div>
            </div>
        </form>
    </div>

@endsection
@section("styles")
@endsection
@section('script')
@stop
