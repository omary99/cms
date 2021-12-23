@extends('layouts.app')


@section('content')
    <h1>This is the content for post page</h1>

    @if (count($people))

    <ul>
        @foreach ($people as $person)
            <li>{{$person}}</li>
        @endforeach
    </ul>
    @endif
@stop

@section('footer')
    <script>alert('Hello post page visitor')</script>
@stop