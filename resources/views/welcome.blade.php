@extends('layout.layout')

@section('content')
    <div class="container">
        {!! Form::open(['method' => 'post', 'route' => 'store','class' => 'form-horizontal']) !!}
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'enter name...', 'required']) !!}
                        @if ($errors->any())
                            <ul style="color: red">* {!! $errors->first('name') !!}</ul>
                        @endif
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('gender', 'Gender :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::radio('gender','M') !!} Male &nbsp;
                        {!! Form::radio('gender','F') !!} Female &nbsp;
                        {!! Form::radio('gender','Others') !!} Others
                    </div>
                    @if ($errors->any())
                        <ul style="color: red">* {!! $errors->first('gender') !!}</ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('phone', 'Phone :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'enter phone...', 'required']) !!}
                    </div>
                    @if ($errors->any())
                        <ul style="color: red">* {!! $errors->first('phone') !!}</ul>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('email', 'Email :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'enter email...', 'required']) !!}
                    </div>
                    @if ($errors->any())
                        <ul style="color: red">* {!! $errors->first('email') !!}</ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('address', 'Address :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'enter address...', 'required']) !!}
                    </div>
                    @if ($errors->any())
                        <ul style="color: red">* {!! $errors->first('address') !!}</ul>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nationality', 'Nationality :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('nationality', null, ['class' => 'form-control', 'placeholder' => 'enter nationality...', 'required']) !!}
                    </div>
                    @if ($errors->any())
                        <ul style="color: red">* {!! $errors->first('nationality') !!}</ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('dob', 'Date of Birth :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::date('dob', null, ['class' => 'form-control', 'required']) !!}
                    </div>
                    @if ($errors->any())
                        <ul style="color: red">* {!! $errors->first('dob') !!}</ul>
                    @endif
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('education', 'Education :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('education', null, ['class' => 'form-control', 'placeholder' => 'enter education background...']) !!}
                    </div>
                    @if ($errors->any())
                        <ul style="color: red">* {!! $errors->first('education') !!}</ul>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('pref_contact', 'Preferred mode of contact :',['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::select('pref_contact',['none' => 'None','email'=>'Email','phone' =>'Phone'], null, ['class' => 'form-control']) !!}
                    </div>
                    @if ($errors->any())
                        <ul style="color: red">* {!! $errors->first('contact') !!}</ul>
                    @endif
                </div>
            </div>
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>
@endsection