@extends('template')
@section('content')
    <div class="col-md-12">
        <div class="title__page">
            <h1> {{trans('lang.edit_employees')}} </h1>
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
        {!! Form::model($employee, [
            'method' => 'PATCH',
            'route' => ['employee.update', $employee->id]
        ]) !!}
            <div class="form-group row">
                <label for="first_name" class="col-sm-2 col-form-label"> {{trans('lang.first_name')}} </label>
                <div class="col-sm-10">
                    <input type="text" value="{{$employee->first_name}}" class="form-control" id="first_name" placeholder="{{trans('lang.first_name')}}" name="first_name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="last_name" class="col-sm-2 col-form-label"> {{trans('lang.last_name')}} </label>
                <div class="col-sm-10">
                    <input type="text" value="{{$employee->last_name}}" class="form-control" id="company_name" placeholder="{{trans('lang.last_name')}}" name="last_name" required>
                </div>
            </div>
            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> {{trans('lang.email')}} </label>
                <div class="col-sm-10">
                    <input type="text" value="{{$employee->email}}" class="form-control" id="email" placeholder="{{trans('lang.email')}}" name="email" />
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-sm-2 col-form-label"> {{trans('lang.company')}} </label>
                <div class="col-sm-10">
                    <select name="company_id" class="form-control">
                        @foreach( $companies as $company )
                        <option value="{{$company->id}}" {{($company->id == $employee->company_id)?"selected":""}} >{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label for="phone" class="col-sm-2 col-form-label"> {{trans('lang.phone')}} </label>
                <div class="col-sm-10">
                    <input type="text" value="{{$employee->phone}}" class="form-control" id="phone" placeholder="{{trans('lang.phone')}}" name="phone" />
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
