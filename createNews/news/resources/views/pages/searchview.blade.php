@extends('layouts.app')

@section('content')

@if ( isset($theme) )
    <searchview-component  theme="{{$theme}}" ><searchview-component/>
    @else

    @if (isset($author))
        <searchview-component querystring="{{$querystring}}" author="{{$author}}" ><searchview-component/>
    @elseif (isset($typeofsearch))
        <searchview-component querystring="{{$querystring}}" typeofsearch="{{$typeofsearch}}" ><searchview-component/>
    @else
        <searchview-component querystring="{{$querystring}}" ><searchview-component/> 
    @endif

@endif

{{-- @isset($author)
    <h1>author</h1>
    <searchview-component querystring="{{$querystring}}" author="{{$author}}" ><searchview-component/>
@endisset

@isset($theme)
        <h1>theme</h1>
    <searchview-component  theme="{{$theme}}" ><searchview-component/>
@endisset
<h1>default</h1>

    <searchview-component querystring="{{$querystring}}" ><searchview-component/> --}}
@endsection