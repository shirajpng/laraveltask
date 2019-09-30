@extends('layout.layout')

@section('content')
    <div class="container">
        <div style="margin-bottom: 20px">
            <a href="/" style="text-decoration: none;">Go Back</a>
        </div>
        <ul>
            @foreach($heads as $index => $head)
            <li>{{$head}} : {{$result[$index]}}</li>
            @endforeach
        </ul>
    </div>
@endsection