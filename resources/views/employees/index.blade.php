@extends('template')
@section('content')
    <div class="col-md-12">
        <div class="title__page">
            <h1> {{trans('lang.employees')}} </h1>
            <a href="{{route('employee.create')}}" class="btn btn-success"> {{trans('lang.add_new')}} </a>
        </div>
        @if(Session::has('flash_message'))
            <div class="alert alert-success text-center">
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

    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered">
            <thead>
            <tr>
                <td class="text-center"> {{trans('lang.first_name')}} </td>
                <td class="text-center"> {{trans('lang.last_name')}} </td>
                <td class="text-center"> {{trans('lang.email')}} </td>
                <td class="text-center"> {{trans('lang.company')}} </td>
                <td class="text-center"> {{trans('lang.phone')}} </td>
                <td class="text-center"> {{trans('lang.show')}} </td>
                <td class="text-center"> {{trans('lang.edit')}} </td>
                <td class="text-center"> {{trans('lang.delete')}} </td>
            </tr>
            </thead>
            <tbody>
            @forelse( $employees as $employee )
            <tr>
                <td class="text-center"> {{$employee->first_name}} </td>
                <td class="text-center"> {{$employee->last_name}} </td>
                <td class="text-center"> {{$employee->email}} </td>
                <td class="text-center"> {{$employee->company->name}} </td>
                <td class="text-center"> {{$employee->phone}} </td>
                <td class="text-center"> <a href="{{ route('employee.show', $employee->id) }}" class="btn btn-success"> {{trans('lang.show')}} </a>  </td>
                <td class="text-center"> <a href="{{ route('employee.edit', $employee->id) }}" class="btn btn-warning"> {{trans('lang.edit')}} </a>  </td>
                <td class="text-center">
                    {!! Form::open([
                        'method' => 'DELETE',
                        'class' => 'inline-block',
                        'route' => ['employee.destroy', $employee->id]
                    ]) !!}
                    {!! Form::submit(trans('lang.delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="alert-info alert">{{trans('lang.no_employees')}} </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
        <div>
            {!! $employees->links() !!}
        </div>
    </div>

@endsection
@section("styles")
@endsection
@section('script')
@stop
