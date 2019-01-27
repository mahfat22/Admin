@extends('template')
@section('content')
    <div class="col-md-12">
        <div class="title__page">
            <h1> {{trans('lang.add_companies')}} </h1>
            <a href="{{route('company.create')}}" class="btn btn-success"> {{trans('lang.add_new')}} </a>
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
                <td class="text-center"> {{trans('lang.name')}} </td>
                <td class="text-center"> {{trans('lang.email')}} </td>
                <td class="text-center"> {{trans('lang.website')}} </td>
                <td class="text-center"> {{trans('lang.show')}} </td>
                <td class="text-center"> {{trans('lang.edit')}} </td>
                <td class="text-center"> {{trans('lang.delete')}} </td>
            </tr>
            </thead>
            <tbody>
            @forelse( $companies as $company )
            <tr>
                <td class="text-center"> {{$company->name}} </td>
                <td class="text-center"> {{$company->email}} </td>
                <td class="text-center"> {{$company->website}} </td>
                <td class="text-center"> <a href="{{ route('company.show', $company->id) }}" class="btn btn-success"> {{trans('lang.show')}} </a>  </td>
                <td class="text-center"> <a href="{{ route('company.edit', $company->id) }}" class="btn btn-warning"> {{trans('lang.edit')}} </a>  </td>
                <td class="text-center">
                    {!! Form::open([
                        'method' => 'DELETE',
                        'class' => 'inline-block',
                        'route' => ['company.destroy', $company->id]
                    ]) !!}
                    {!! Form::submit(trans('lang.delete'), ['class' => 'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">
                        <div class="alert-info alert">{{trans('lang.no_companies')}} </div>
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
        </div>
        <div>
            {!! $companies->links() !!}
        </div>
    </div>

@endsection
@section("styles")
@endsection
@section('script')
@stop
