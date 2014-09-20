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