@extends('components.layout.base')

@section('body')
    <div class="row">
        <div class="col-4">
        </div>
        <div class="col-4 bg-body-secondary rounded-bottom-2">
            <h4>@yield('tittle')</h4>
            @yield('create')
        </div>
        <div class="col-4">
        </div>
    </div>
@endsection
