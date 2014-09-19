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
                                <p>When you push commits to this branch, deploy bransh will deploy your fresh code to your site.</p>
                            </div>
                            <div class="form-group">
                                {{ Form::label('Branch', null, ['class' => 'control-label']) }}
                                {{ Form::text('Branch', 'master', ['class' => 'form-control', 'placeholder' => 'Ex: master']) }}
                            </div>
                        </div>
                        <div class="tab-pane" id="environment">

                        </div>
                        <div class="tab-pane" id="workers">

                        </div>
                        <div class="tab-pane" id="subdomain">

                        </div>
                        <div class="tab-pane" id="ssl">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop