@extends('layout.layout')

@section('content')
        <div style="margin-bottom: 20px">
        <a href="{{url('/add')}}" class="btn btn-success">Add User</a>
        </div>
        {{$users->links()}}
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>SN</th>
                @foreach($headings as $heading)
                    <th>{{ucfirst($heading)}}</th>
                @endforeach
                <th>Action</th>

            </tr>
            </thead>
            <tbody>

            @foreach($users as $index => $user)
            <tr>
                <td>{{$index +1}}</td>
                @foreach($user as $column)
                    <td>{{$column}}</td>
                @endforeach
                <td><a href="{{url('/user/'.++$index)}}"><button class="btn btn-primary">Show</button></a></td>
            </tr>
            @endforeach
            </tbody>
        </table>

@endsection