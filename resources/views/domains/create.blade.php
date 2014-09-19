@extends('base')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="page-header">
                <h2>Create Domain</h2>
            </div>
            @include('domains.partials.form')
        </div>
    </div>
</div>
@stop