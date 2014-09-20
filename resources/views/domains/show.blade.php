@extends('base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Site details: {{ $domain->name }}</h3>
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="active"><a href="#app" role="tab" data-toggle="tab">My App</a></li>
                        <li><a href="#environment" role="tab" data-toggle="tab">Environment</a></li>
                        <li><a href="#workers" role="tab" data-toggle="tab">Queue Workers</a></li>
                        <li><a href="#subdomain" role="tab" data-toggle="tab">Sub Domains</a></li>
                        <li><a href="#ssl" role="tab" data-toggle="tab">SSL Certificates</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="app">
                            @if( ! count($domain->app))
                            <div class="page-header">
                                Install Repository
                            </div>
                            <div class="alert alert-warning">
                                <p>When using Git deployment, you <strong>must</strong> add the following SSH key to your source control provider <strong>before</strong> install the repository:</p>
                                <div class="clearfix">
                                <div class="form-control clearfix uk-text-break" style="height: inherit; margin: 10px 0 0">ssh-rsa ADDAB3NzaC1yc2EADDADAQABAAABAQCo1iDFTY/PtSe+TqDIHymCc7uKyM6Iqg6XzSTnz5goTHG1+GL/gHrGT/7EsphNZ3nKZzSd93BAm8z2ihmqxRZRunWAi8cg+ina+QFgEZGI+cXYrzSyax9a+/0g62jZU8KMPTKSh5AhOWi/K3VGkm7XDVGAs54zUtG0VSvnaqPTLAt0Rdcoi5A31ShAO80d/4RqRBa37snSf2arsImBZdcBq8jwKlqsZwV8mdPdRNUBRPOWGlxjCihF8fc3nTacOJVjkUYq8PpQhDycX6dCk5oKGykRva/G0XFoZnuAws54ducIlFVySCjKnx4cCRcmYV+1ToLWGPsp2XouQ2V6K8cj root@domainholder</div>
                                </div>
                            </div>
                            {{ Form::open(['route' => ['admin.app.store', $domain->id]]) }}
                            <div class="form-group">
                                {{ Form::label('url', 'Repository', ['class' => 'control-label']) }}
                                {{ Form::text('url', null, ['class' => 'form-control', 'placeholder' => 'git@provider:user/repository.git']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('branch', null, ['class' => 'control-label']) }}
                                {{ Form::text('branch', 'master', ['class' => 'form-control', 'placeholder' => 'master']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('installation', 'Installation Options', ['class' => 'control-label']) }}
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('run_composer', 1, true) }} Install Composer Dependencies
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('run_migrations', 1, false) }} Run Migrations
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Install Repository', ['class' => 'btn btn-default']) }}
                            </div>
                            {{ Form::close() }}
                            @else
                            <div class="page-header">
                                Deployment
                            </div>
                            <div class="alert alert-info">
                                <p>Quickly deploy allows you to deploy projects when you push to source. When you push to your deploy branch, git management portal will pull your latest code from the source, and runs your deploy script. For example Composer dependencies, and Migrations.</p>
                            </div>
                            <a href="#" class="btn btn-info">Enable deploy</a>
                            <a href="#" class="btn btn-warning">Edit deploy script</a>
                            <a href="#" class="btn btn-default">View latest deploy log</a>
                            <a href="#" class="btn btn-success">Deploy now</a>
                            <div class="page-header">
                                Deploy Branch
                            </div>
                            <div class="alert alert-info">
                                <p>When you push commits to this branch, deploy branch will deploy your fresh code to your site.</p>
                            </div>
                            {{ Form::open() }}
                            <div class="form-group">
                                {{ Form::label('Branch', null, ['class' => 'control-label']) }}
                                {{ Form::text('Branch', 'master', ['class' => 'form-control', 'placeholder' => 'Ex: master']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Update Branch', ['class' => 'btn btn-default']) }}
                            </div>
                            {{ Form::close() }}
                            <div class="page-header">
                                Trigger Deploy URL
                            </div>
                            <div class="alert alert-warning">
                                <p>http://your.domain.com/sites/deploy/http?token={{ rand(0,1000) }}</p>
                            </div>
                            <div class="page-header">
                                Uninstall App
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>{{ Form::checkbox('rollback_migrations', 1, false) }} Rollback Migrations</label>
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Uninstall Repository', ['class' => 'btn btn-default btn-danger']) }}
                            </div>
                            @endif
                        </div>
                        <div class="tab-pane" id="environment">
                            <div class="page-header">
                                Add Environment Variable
                            </div>
                            {{ Form::open() }}
                            <div class="form-group">
                                {{ Form::label('key', null, ['class' => 'control-label']) }}
                                {{ Form::text('key', null, ['class' => 'form-control', 'placeholder' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('value', null, ['class' => 'control-label']) }}
                                {{ Form::text('value', null, ['class' => 'form-control', 'placeholder' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('Environment', 'Environment (Optional)', ['class' => 'control-label']) }}
                                {{ Form::text('Environment', null, ['class' => 'form-control', 'placeholder' =>'Optional']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::submit('Add Environment Variable', ['class' => 'btn btn-default btn-primary']) }}
                            </div>
                            {{ Form::close() }}
                        </div>
                        <div class="tab-pane" id="workers">
                            <div class="page-header">
                                New Worker
                            </div>
                            {{ Form::open() }}
                            <div class="form-group">
                                {{ Form::label('connection', null, ['class' => 'control-label']) }}
                                {{ Form::text('connection', 'Beanstalkd', ['class' => 'form-control', 'placeholder' => '']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('queue', null, ['class' => 'control-label']) }}
                                {{ Form::text('queue', 'default', ['class' => 'form-control', 'placeholder' => 'default']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('maximum_seconds_per_job', null, ['class' => 'control-label']) }}
                                {{ Form::text('maximum_seconds_per_job', 60, ['class' => 'form-control', 'placeholder' => '60']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('rest_seconds_when_empty', null, ['class' => 'control-label']) }}
                                {{ Form::text('rest_seconds_when_empty', 10, ['class' => 'form-control', 'placeholder' => '10']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('maximum_tries', null, ['class' => 'control-label']) }}
                                {{ Form::text('maximum_tries', null, ['class' => 'form-control', 'placeholder' => '3']) }}
                            </div>
                            <div class="form-group">
                                {{ Form::label('environment', 'Environment (Optional)', ['class' => 'control-label']) }}
                                {{ Form::text('environment', null, ['class' => 'form-control', 'placeholder' => 'production']) }}
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        {{ Form::checkbox('asWorker', 1, null) }} Run Worker as Daemon (Laravel 4.2+ only)
                                    </label>
                                </div>
                            </div>
                            {{ Form::close() }}
                        </div>
                        <div class="tab-pane" id="subdomain">
                            <div class="page-header">
                                Add New Sub Domain
                            </div>
                            {{ Form::open(['class' => 'form-horizontal']) }}
                            <div class="form-group">
                                {{ Form::label('name', null, ['class' => 'control-label col-md-4']) }}
                                <div class="col-md-4">
                                {{ Form::text('name', null, ['class' => 'form-control', 'placeholder' => 'example']) }}
                                </div>
                                <div class="col-md-4">
                                    <p class="form-control-static">.{{ $domain->name }}</p>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-4 col-md-offset-4">
                                    {{ Form::submit('Add New Sub Domain', ['class' => 'btn btn-default']) }}
                                </div>
                            </div>
                            {{ Form::close() }}
                            <div class="page-header">
                                Sub Domains List
                            </div>
                        </div>
                        <div class="tab-pane" id="ssl">
                            <div class="page-header">
                                New Certificate
                            </div>
                            <ul class="nav nav-pills" role="tablist">
                                <li class="active"><a href="#request" role="tab" data-toggle="tab">Create Signing Request</a></li>
                                <li><a href="#install" role="tab" data-toggle="tab">Install Existing Certificate</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="request">
                                    <div class="page-header">
                                        Create Signing Request
                                    </div>
                                    {{ Form::open() }}
                                    <div class="form-group">
                                        {{ Form::label('domain', null, ['class' => 'control-label']) }}
                                        {{ Form::text('domain', null, ['class' => 'form-control', 'placeholder' => 'domain.tld']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('country', null, ['class' => 'control-label']) }}
                                        {{ Form::text('country', null, ['class' => 'form-control', 'placeholder' => 'NL']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('State', null, ['class' => 'control-label']) }}
                                        {{ Form::text('State', null, ['class' => 'form-control', 'placeholder' => 'GR']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('city', null, ['class' => 'control-label']) }}
                                        {{ Form::text('city', null, ['class' => 'form-control', 'placeholder' => 'Groningen']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('organization', null, ['class' => 'control-label']) }}
                                        {{ Form::text('organization', null, ['class' => 'form-control', 'placeholder' => 'Company Name']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('department', null, ['class' => 'control-label']) }}
                                        {{ Form::text('department', null, ['class' => 'form-control', 'placeholder' => 'IT']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::submit('Create Signing Request', ['class' => 'btn btn-default']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                                <div class="tab-pane" id="install">
                                    <div class="page-header">
                                        Install Existing Certificate
                                    </div>
                                    {{ Form::open() }}
                                    <div class="form-group">
                                        {{ Form::label('private_key', null, ['class' => 'control-label']) }}
                                        {{ Form::textarea('private_key', null, ['class' => 'form-control', 'placeholder' => '']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::label('certificate', null, ['class' => 'control-label']) }}
                                        {{ Form::textarea('certificate', null, ['class' => 'form-control', 'placeholder' => '']) }}
                                    </div>
                                    <div class="form-group">
                                        {{ Form::submit('Install Certificate', ['class' => 'btn btn-default']) }}
                                    </div>
                                    {{ Form::close() }}
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop