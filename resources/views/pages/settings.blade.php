@extends('base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="page-header">
                <h2>Configuration</h2>
            </div>
            <div class="alert alert-info">
                <p>Before you want to auto deploy your website you need to configure GMP. Once this is done you will be able to deploy every GIT project you can get.</p>
            </div>
            <div class="form-group">
                {{ Form::label('server_name', null, ['class' => 'control-label']) }}
                {{ Form::text('server_name', null, ['class' => 'form-control', 'placeholder' => 'Server Name']) }}
            </div>
            <div class="form-group">
                {{ Form::label('domain', 'GMP Domain name or IP address', ['class' => 'control-label']) }}
                {{ Form::text('domain', null, ['class' => 'form-control', 'placeholder' => 'Domain name or IP address']) }}
                <p class="help-block">
                    The root domain or IP address where you want to deploy your websites.
                </p>
            </div>
            <div class="form-group">
                {{ Form::label('user', null, ['class' => 'control-label']) }}
                {{ Form::text('user', null, ['class' => 'form-control', 'placeholder' => 'User must have root privileges']) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Password **', ['class' => 'control-label']) }}
                {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password of the user']) }}
                <p class="help-block">
                    ** This is only required once and will not be saved in any database.
                </p>
            </div>
            <div class="form-group">
                {{ Form::label('ssh_key_location', 'SSH Public Key', ['class' => 'control-label']) }}
                {{ Form::text('ssh_key_location', null, ['class' => 'form-control', 'placeholder' => 'SSH key location, example: /Users/username/.ssh/id_rsa.pub']) }}
            </div>
            <div class="form-group">
                {{ Form::label('document_location', 'Default installation folder', ['class' => 'control-label']) }}
                {{ Form::text('document_location', null, ['class' => 'form-control', 'placeholder' => 'Default installation folder']) }}
            </div>
            <div class="form-group">
                {{ Form::label('nginx_location', 'Nginx Location (Optional)', ['class' => 'control-label']) }}
                {{ Form::text('nginx_location', null, ['class' => 'form-control', 'placeholder' => 'Nginx Location, default in storage']) }}
            </div>
            <div class="form-group">
                {{ Form::label('supervisord_location', 'Supervisord Location (Optional)', ['class' => 'control-label']) }}
                {{ Form::text('supervisord_location', null, ['class' => 'form-control', 'placeholder' => 'Supervisord Location, default in storage']) }}
            </div>
            <div class="form-group">
                {{ Form::submit('Install Configuration', ['class' => 'btn btn-default']) }}
            </div>
        </div>
        <div class="col-md-6">
            <div class="page-header">
                <h2>Settings</h2>
            </div>
            <div class="alert alert-info">
                <p>With the settings here you are able to configure GMP, and to make sure GMP can perform serveral tasks such as set nginx for websites, and run supervisord configuration files.</p>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label> {{ Form::checkbox('nginx', 1, null) }} Allow NGINX configuration through GMP</label>
                </div>
            </div>
            <div class="form-group">
                <div class="checkbox">
                    <label> {{ Form::checkbox('supervisord', 1, null) }} Allow supervisord configuration through GMP</label>
                </div>
            </div>
            <div class="form-group">
                {{ Form::submit('Update settings', ['class' => 'btn btn-default']) }}
            </div>
        </div>
    </div>
</div>
@stop