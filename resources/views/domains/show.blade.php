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
                            @include('domains.partials.app')
                        </div>
                        <div class="tab-pane" id="environment">
                            @include('domains.partials.environment')
                        </div>
                        <div class="tab-pane" id="workers">
                            @include('domains.partials.workers')
                        </div>
                        <div class="tab-pane" id="subdomain">
                            @include('domains.partials.subdomains')
                        </div>
                        <div class="tab-pane" id="ssl">
                            @include('domains.partials.ssl')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop