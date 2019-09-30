@extends('layout.layout')

@section('content')
    <div class="container">
        <div style="margin-bottom: 20px">
            <a href="/" style="text-decoration: none;">Go Back</a>
        </div>
        <ul>
            @foreach($headings as $index => $head)
            <li>{{$head}} : {{$user[$index]}}</li>
            @endforeach
        </ul>
    </div>
@endsection