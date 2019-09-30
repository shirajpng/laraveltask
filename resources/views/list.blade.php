@extends('layout.layout')

@section('content')
    <div class="container">
        <div class="text-right">
        <a href="{{url('/add')}}" class="btn btn-success btn-lg">Add User</a>
        </div>
        {{$rows->links()}}
        <table class="table">
            <thead>
            <tr>
                <th>SN</th>
                @foreach($keys as $key)
                    <th>{{ucfirst($key)}}</th>
                @endforeach
                <th>Action</th>

            </tr>
            </thead>
            <tbody>

            @foreach($rows as $index => $row)
            <tr>
                <td>{{$index +1}}</td>
                @foreach($row as $column)
                    <td>{{$column}}</td>
                @endforeach
                <td><a href="{{url('/user/'.++$index)}}"><button class="btn btn-primary">Show</button></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection

@section('script')

@endsection