@extends('components.layout.base')

@section('body')
<div class="container bg-secondary-subtle rounded-bottom-2 p-2">
    <h3>@yield('tittle')</h3>
    <div class="container mb-2">
            @yield('listBody')
    </div>
    <button class="btn btn-primary">
        <a href='@yield('path')' class="link-light link-underline link-underline-opacity-0">@yield('create')</a>
    </button>
</div>
@endsection
