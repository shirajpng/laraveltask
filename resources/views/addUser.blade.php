@extends('layout.layout')

@section('content')
    <div class="container">
        <div style="margin-bottom: 20px">
            <a href="/" style="text-decoration: none;">Go Back</a>
        </div>
        {!! Form::open(['method' => 'post', 'route' => 'store','class' => 'form-horizontal']) !!}
        {!! csrf_field() !!}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('name', 'Name :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'enter name...', 'required']) !!}
                    </div>

                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('gender', 'Gender :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::radio('gender','M') !!} Male &nbsp;
                        {!! Form::radio('gender','F', 1) !!} Female &nbsp;
                        {!! Form::radio('gender','Others') !!} Others
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('phone', 'Phone :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::number('phone', null, ['class' => 'form-control', 'placeholder' => 'enter phone...','id' => 'phone']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('email', 'Email :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'enter email...','id' => 'email']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('address', 'Address :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('address', null, ['class' => 'form-control', 'placeholder' => 'enter address...']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('nationality', 'Nationality :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('nationality', null, ['class' => 'form-control', 'placeholder' => 'enter nationality...', 'required']) !!}
                    </div>
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
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('education', 'Education :',['class' => 'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('education', null, ['class' => 'form-control', 'placeholder' => 'enter education background...']) !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    {!! Form::label('pref_contact', 'Preferred mode of contact :',['class' => 'col-md-4 control-label']) !!}
                    <div class="col-md-8">
                        {!! Form::select('pref_contact',['none' => 'None','email'=>'Email','phone' =>'Phone'], null, ['class' => 'form-control','id' => 'preference']) !!}
                    </div>
                </div>
            </div>
        </div>
        {!! Form::submit('Submit', ['class' => 'btn btn-success']) !!}

        {!! Form::close() !!}
    </div>
@endsection
@section('script')
    <script>
        $(function()
        {
            $('#preference').on('change', function () {
                let thiss = $(this).val();
                if(thiss == "none"){
                    $('#email').attr('required', false);
                    $('#phone').attr('required', false);
                } else{
                    if($('#'+thiss).val() == "") {
                        alert(thiss+" field cant be empty");
                        $('#'+thiss).focus();
                        console.log(thiss);
                        if(thiss == "phone"){
                            $('#email').attr('required', false);
                            $('#'+thiss).attr('required', true);
                        } else{
                            $('#phone').attr("required", false);
                            $('#'+thiss).attr('required', true);
                        }
                    }
                }
            });
            $('#dob').on('change', function () {
                let dob = $(this);
                let givenDate = new Date(dob.val());
                let now = new Date;
                if(givenDate > now){
                    alert("Are you from the future?... because your date of birth seems to be.")
                    dob.focus();
                    dob.val('');
                }
            })


        });
    </script>
@endsection