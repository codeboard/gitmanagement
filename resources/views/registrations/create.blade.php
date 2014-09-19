<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('assets/bootstrap-3.2.0-dist/css/bootstrap.min.css') }}"/>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="page-header">
                <h2>Registration</h2>
            </div>
            @if(count($errors->all()))
            @include('partials.errors')
            @endif
            {{ Form::open(['route' => 'registrations.store']) }}
                <div class="form-group">
                    {{ Form::label('email', null, ['class' => 'control-label']) }}
                    {{ Form::text('email', null, ['class' => 'form-control', 'placeholder' => 'E-mail Address']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', null, ['class' => 'control-label']) }}
                    {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password_confirmation', null, ['class' => 'control-label']) }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Password Confirmation']) }}
                </div>
            <div class="form-group">
                {{ Form::submit('Register', ['class' => 'btn btn-default']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
</body>
</html>