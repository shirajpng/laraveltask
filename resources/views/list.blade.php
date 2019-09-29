@extends('layout.layout')

@section('content')
    <div class="container">
        <table class="table">
            <thead>
            <tr>
                @foreach($keys as $key)
                    <th>{{ucfirst($key)}}</th>
                @endforeach

            </tr>
            </thead>
            <tbody>
            @foreach($rows as $row)
            <tr>
                @foreach($row as $column)
                    <td>{{$column}}</td>
                @endforeach
            </tr>
            @endforeach
            </tbody>
        </table>
        {{$rows->links}}
    </div>
@endsection

@section('script')

@endsection